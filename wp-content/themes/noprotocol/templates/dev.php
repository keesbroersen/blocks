<?php
/**
 * Template Name: Development page
 *
 * @package Wordpress
 */

wp_head();
?>

<?php
    $devpage = true;

    $contentblocks_obj;
    $page_obj;

    $dirname = dirname(dirname( __FILE__));

    $dir = $dirname.'/_contentblocks';
    $files = array_diff(scandir($dir), array('..', '.'));

    //The contentblocks
    foreach ($files as $file){
        if($file === 'contentblocks.php'){
            continue;
        }

        //File name
        $name = str_replace('.php', '', $file);

        $contentblocks_obj[$name] = array(
            'path' => $dirname.'/_contentblocks/'.$file,
            'filename' => $file,
        );

        //Design
        ob_start();
        include($dirname.'/_contentblocks/'.$file);
        $block_html = ob_get_contents();
        ob_end_clean();

        $contentblocks_obj[$name] += array(
            'design' => $block_html,
        );

        //Code
        $code = file_get_contents($dirname.'/_contentblocks/'.$file);
        $contentblocks_obj[$name] += array(
            'code' => htmlspecialchars($code),
        );
        
        //Get the comments
        $source = file_get_contents( $dirname.'/_contentblocks/'.$file );
        $tokens = token_get_all( $source );
        $comment = array(
            T_COMMENT,      // All comments since PHP5
            T_DOC_COMMENT   // PHPDoc comments
        );
        foreach( $tokens as $token ) {
            if( !in_array($token[0], $comment) )
                continue;
            $txt = $token[1];
            $check = substr($txt, 0, 3);
            if($check === '/**'){
                $txt = substr($txt, 3, -3);
                $contentblocks_obj[$name] += array(
                    'comments' => $txt
                );
            }
        }
    }

    //The ACF variables
    // $dir = $dirname.'/_acf';
    // $files = array_diff(scandir($dir), array('..', '.'));
    
    //Get pages
    $request = new WP_REST_Request( 'GET', '/wp/v2/pages' );
    $request->set_query_params( [ 'per_page' => 12 ] );
    $response = rest_do_request( $request );
    $server = rest_get_server();
    $pages = $server->response_to_data( $response, false );

    foreach($pages as $page){
        $contentblocks = $page['acf']['contentblocks'];
        if($contentblocks){
            foreach($contentblocks as $contentblock){
                
                $this_block = $contentblock['acf_fc_layout'];
                if(!isset($contentblocks_obj[$this_block]['page'])){
                    $contentblocks_obj[$this_block]['page'] = null;
                }
                if(!is_array($contentblocks_obj[$this_block]['page'])){
                    $contentblocks_obj[$this_block]['page'] = array();
                }
                
                array_push($contentblocks_obj[$this_block]['page'], $page['title']['rendered']);

            }
        }

        $this_page = $page['title']['rendered'];
        
        if(!isset($page_obj[$this_page]['acf'])){
            $page_obj[$this_page]['acf'] = null;
        }
        if(!is_array($page_obj[$this_page]['acf'])){
            $page_obj[$this_page]['acf'] = array();
        }

        array_push($page_obj[$this_page]['acf'], $page['acf']['contentblocks']);
    }

    $props['pages'] = $page_obj;
    $props['prop_data'] = $contentblocks_obj;
?>   
<div data-component="Dev" <?= vueProps($props); ?>></div>

<?php /*
<script type="application/javascript">
let page_data = null;

$.ajax( {
    url: '<?= site_url() ?>/wp-json/wp/v2/pages?per_page=100',
    success: function ( data, textStatus, request ) {
        $.each( data, function( count, item ) {
            let title = '<h4>'+item.title.rendered+'</h4>';
            let acf = item.acf.contentblocks;
            let blocks = '';
            

            $.each( acf, function( count, item ) {
                blocks += '<p>'+item.acf_fc_layout+'</p>';
            });
            
            let div = '<div class="page">'+title + blocks+'</div>';

            $('#pages').append(div);
        });
    },
    error: function ( data, textStatus, request ) {
        console.log(data.responseText);
    },
    cache: false
});
</script> -->
*/?>
