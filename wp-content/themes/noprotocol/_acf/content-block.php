<?php
$block = array(
  'contentblock' => array(
    'key' => 'contentblock',
    'name' => 'content-block',
    'label' => 'Content block',
    'display' => 'block',
    'sub_fields' => array(
      array(
        'key' => 'contentblock_field001',
        'label' => 'Title',
        'name' => 'title',
        'type' => 'text',
        'instructions' => 'Not mandatory',
      ),
      array(
        'key' => 'contentblock_field002',
        'label' => 'Text',
        'name' => 'text',
        'type' => 'textarea',
        'instructions' => 'Not mandatory',
      ),
      array(
        'key' => 'contentblock_field003',
        'label' => 'Link',
        'name' => 'link',
        'type' => 'url',
        'instructions' => 'Not mandatory',
      ),
      array(
        'key' => 'contentblock_field024',
        'label' => 'Image',
        'name' => 'image',
        'type' => 'image',
        'instructions' => 'Will be fitted to a 5:3 ratio',
        'return_format' => 'id',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array(
        'key' => 'contentblock_field485',
        'label' => 'Button',
        'name' => 'link',
        'type' => 'link',
        'return_format' => 'array',
        'instructions' => 'Not mandatory',
      ),
      array(
        'key' => 'contentblock_field005',
        'label' => 'Image position',
        'name' => 'radio',
        'type' => 'radio',
        'choices' => array(
          'left'	=> 'Left',
          'right'	=> 'Right'
        ),
        'layout' => 'horizontal',
      ),
    ),
  ),
);
return $block;
?>