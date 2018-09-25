<?php
/**
Gebruik de radio button voor het switchen van de image naar links of rechts. Voor mobile negeren.
**/
?>
<?php
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $link = get_sub_field('link');
    $position = get_sub_field('radio') ? get_sub_field('radio') : 'left';
    $image_id = get_sub_field('image');

    //Set variables for dev page
    if($devpage = true){
      $title = 'Titel';
      $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus felis, accumsan semper purus sit amet, placerat molestie dui. In hac habitasse platea dictumst. Suspendisse potenti. Vivamus sed ante vitae augue ullamcorper maximus. Donec a nibh gravida, fringilla dolor ac, congue justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce eget eros id elit hendrerit eleifend. Donec bibendum orci a molestie aliquam. Integer mauris magna, molestie ut libero sit amet, pretium fermentum turpis. Aliquam justo erat, viverra nec ligula sed, tempus maximus nisl.';
      $image_id = 55;
    }

    $image_size = 'medium_large';
    $image = wp_get_attachment_image_src($image_id, $image_size)[0];
?>
<section class="component component--nopadding content-block content-block--<?= $position ?>" name="content-block">
  <div class="container">
    <?php if($image){ ?>
      <div class="content-block__image" style="background-image:url('<?= $image ?>');"></div>
    <?php } ?>
    <?php if($title || $text || $link){ ?>
      <div class="content-block__content">
        <?php if($title){ ?>
          <h2 class="item-title"><?= $title ?></h2>
        <?php } ?>
        <?php if($text){ ?>
          <p class="paragraph"><?= $text ?></p>
        <?php } ?>
        <?php if($link){ ?>
          <a href="<?= $link['url'] ?>" target="<?= $link['target'] ?>" class="btn btn--primary"><?= $link['title'] ?></a>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section>