<?php
$block = array(
  'imageblock' => array(
    'key' => 'imageblock',
    'name' => 'image-block',
    'label' => 'Image block',
    'display' => 'block',
    'sub_fields' => array(
      array(
        'key' => 'imageblock_field024',
        'label' => 'Image',
        'name' => 'image',
        'type' => 'image',
        'instructions' => 'Will be fitted to a 5:3 ratio',
        'return_format' => 'id',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
    ),
  ),
);
return $block;
?>