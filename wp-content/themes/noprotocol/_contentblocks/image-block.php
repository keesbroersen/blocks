<?php
/**
Full size image block
**/
?>
<?php
    $image_id = get_sub_field('image');

    //Set variables for dev page
    if($devpage = true){
      $image_id = 55;
    }

    $image_size = 'full';
    $image = wp_get_attachment_image_src($image_id, $image_size)[0];
?>
<section class="component component--nopadding image-block" name="image-block" style="background-image:url('<?= $image ?>');">
  <!-- <div class="container">
    
  </div> -->
</section>