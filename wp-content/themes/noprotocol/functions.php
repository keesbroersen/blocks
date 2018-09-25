<?php
// phpcs:disable PSR1.Files.SideEffects
use Sledgehammer\Core\Curl;

// Add theme supports
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
}

// Configure ACF local JSON
add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = __DIR__ . '/acf-json';
    return $paths;
});
add_filter('acf/settings/save_json', function ($path) {
    return __DIR__ . '/acf-json';
});


// Upgrade jQuery (Get rid of JQMIGRATE log messages)
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', [], '3.3.1');
});

// Inject scripts & css from webpack.
add_action(
    'wp_enqueue_scripts',
    function () {
        if (file_exists(ABSPATH."/dist/index.html") === false) {
            trigger_error('Missing dist/index.html run `yarn build`', E_USER_NOTICE);
            return;
        }
        // @todo cache result?
        $html = file_get_contents(ABSPATH."/dist/index.html");
        $doc = new DOMDocument();
        $doc->loadHTML($html);
        
        $xml = simplexml_import_dom($doc);
        foreach ($xml->xpath("/html/head/link") as $link) {
            if ((string)$link['rel'] === 'stylesheet') {
                wp_enqueue_style(basename($link['href']), $link['href']);
            }
        }
        foreach ($xml->xpath("/html/body/script") as $script) {
            $type= (string)$script['type'];
            if ($type === '' || $type === 'text/javascript') {
                wp_enqueue_script(basename($script['src']), $script['src']);
            }
        }
        if (WP_DEBUG && substr($_SERVER['SERVER_NAME'], -9) === 'localhost') {
            wp_enqueue_script('livereload', 'http://localhost:35729/livereload.js');
        }
    }
);
if (getenv('UPLOADS_PROXY_URL') && array_key_exists('REQUEST_URI', $_SERVER)) {
    if (substr($_SERVER['REQUEST_URI'], 0, 20) === '/wp-content/uploads/') {
        $proxyServername = parse_url(getenv('UPLOADS_PROXY_URL'), PHP_URL_HOST);
        if (array_key_exists('SERVER_NAME', $_SERVER) && $proxyServername !== $_SERVER['SERVER_NAME']) {
            header("NoProtocol-Proxy: Using remote file");
            Curl::proxy(getenv('UPLOADS_PROXY_URL').substr($_SERVER['REQUEST_URI'], 20));
            exit();
        }
    }
}


// Register Theme menu's
register_nav_menus(array(
    'main_menu' => 'Main menu',
    'footer_menu' => 'Footer Menu'
));

// Register shortcodes
get_template_part('shortcodes/shortcode.sitemap');

// Register CPT's and Taxonomies
require_once(TEMPLATEPATH . '/_functions/registers.php');
require_once(TEMPLATEPATH . '/_functions/tax_sort.php');
require_once(TEMPLATEPATH . '/_functions/get_menu_items.php');


// Unhook main content as excerpt content when empty
add_action(
    'init',
    function () {
        remove_filter('get_the_excerpt', 'wp_trim_excerpt');
    }
);

// Custom login logo
add_action('login_head', function () {
    echo '<style type="text/css">
h1 a {
    background-image: url(' . get_bloginfo('template_directory') . '/_assets/img/login_logo.png) !important; 
    background-size: 154px !important;
    width: 100% !important;
    height: 135px !important;
}
</style>';
});


// Custom text for thumbnails on pages and posts
add_filter('admin_post_thumbnail_html', function ($html) {
    $screen_object = get_current_screen();

    if ($screen_object->id === 'page') {
        return $html .= '<p>Gewenste afmetingen: <strong>1440x440</strong></p>';
    } else {
        return $html .= '<p>Gewenste afmetingen: <strong>860x470</strong></p>';
    }
});

// ----------------------------------------------------- //
//                     ACF Functions                     //
// ----------------------------------------------------- //

$env = get_field('environment', 'options');
if ($env && $env === 'production') {
    require_once(TEMPLATEPATH . '/_functions/acf_registers.php');
}

// Add ACF option field
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

if (function_exists('acf_set_options_page_menu')) {
    acf_set_options_page_menu('Thema opties');
}

include 'acf.php'; //Adds ACF php-fields

// ----------------------------------------------------- //
//                Template helper functies               //
// ----------------------------------------------------- //

/**
 * Usage:
 * <div data-component="Example" <?=vueProp('prop', 123)?></div>
 */
function vueProp($name, $value)
{
    $name = preg_replace_callback("/[A-Z]{1}/", function ($match) {
        return '-'.strtolower($match[0]);
    }, $name);
    if (is_string($value)) {
        return $name.'="'.htmlentities($value).'"';
    } else {
        return ':'.$name.'="'.htmlentities(json_encode($value)).'"';
    }
}

/**
 * Usage:
 * <div data-component="Example" <?=vueProps(['prop1' => 123, 'prop2'=> '45'])?></div>
 */
function vueProps($props)
{
    $attrs = [];
    foreach ($props as $prop => $value) {
        $attrs[] = vueProp($prop, $value);
    }
    return implode(" ", $attrs);
}
