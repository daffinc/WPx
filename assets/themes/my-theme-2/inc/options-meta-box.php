<?php

function den_register_meta_boxes($meta_boxes){
  global $prefix;

  $meta_boxes[] = array(
    'title'  => 'Meta Box Title',
    'fields' => array(
      array(
        'name' => 'Your images',
        'id'   => $prefix .'img',
        'type' => 'image_advanced',
        ),
      )
    );

  return $meta_boxes;


}

add_filter( 'rwmb_meta_boxes', 'den_register_meta_boxes' );


?>