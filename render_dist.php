<?php
/**
 *  Render the contents of dist folder via php.
 */
if (isset($_SERVER['REQUEST_URI']) === false) {
    return;
}
$render = function () {
    preg_match('/^[^?]+/', $_SERVER['REQUEST_URI'], $match);
    $url = $match[0];
    $file = __DIR__.'/dist'.$url;
    if ($url != '/' && file_exists($file) && is_file($file)) {
        require_once(__DIR__."/vendor/sledgehammer/core/src/functions.php");
        Sledgehammer\render_file($file);
    }
};
$render();
unset($render);
