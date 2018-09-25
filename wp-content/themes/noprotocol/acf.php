<?php
$blocks = array(); //This is the array where the contentblocks will be pushed to

$the_blocks = array(
  'content-block',
  'image-block',
);

foreach ($the_blocks as $the_block){
  $the_block = "_acf/" . $the_block . '.php';
  $the_block = include $the_block;
  $blocks = array_merge($blocks, $the_block);
}

//These are the Contentblocks
if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
    'key' => 'group_58fa26ba9141e',
    'title' => 'Contentblocks',
    'fields' => array(
      array(
        'key' => 'group2',
        'label' => 'Contentblocks',
        'name' => 'contentblocks',
        'type' => 'flexible_content',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'layouts' => $blocks,
        'button_label' => 'Voeg blok toe',
        'min' => '',
        'max' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
        array(
          'param' => 'post_template',
          'operator' => '!=',
          'value' => 'templates/template.episodes.php',
        ),
        array(
          'param' => 'post_template',
          'operator' => '!=',
          'value' => 'templates/article.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'discussion',
      2 => 'comments',
      3 => 'revisions',
      4 => 'format',
      5 => 'tags',
      6 => 'send-trackbacks',
    ),
    'active' => 1,
    'description' => '',
    ));
endif;

if (function_exists('acf_add_local_field_group')) :
  acf_add_local_field_group(array(
  'key' => 'group_58fa26ba26374',
  'title' => 'Contentblocks for episode',
  'fields' => array(
    array(
      'key' => 'group2234',
      'label' => 'Episode Contentblocks',
      'name' => 'episode_contentblocks',
      'type' => 'flexible_content',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'layouts' => $blocks,
      'button_label' => 'Voeg blok toe',
      'min' => '',
      'max' => '',
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_template',
        'operator' => '==',
        'value' => 'templates/template.episodes.php',
      ),
      array(
        'param' => 'post_template',
        'operator' => '!=',
        'value' => 'templates/article.php',
      ),
      // array(
      //   'param' => 'post_type',
      //   'operator' => '!=',
      //   'value' => 'page',
      // ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'acf_after_title',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array(
    // 0 => 'the_content',
    1 => 'discussion',
    2 => 'comments',
    3 => 'revisions',
    4 => 'format',
    5 => 'tags',
    6 => 'send-trackbacks',
  ),
  'active' => 1,
  'description' => '',
  ));
endif;