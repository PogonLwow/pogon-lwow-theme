<?php

// Infinite Scroll //
function load_posts(){

     $post_offset = $_POST['post_offset'];

     $args = array(
         'numberposts' => -1,
         'post_type' => 'post',
         'offset' => $post_offset
     );

     $posts = new WP_Query($args);
     card($posts);
     die();
}

add_action('wp_ajax_load_posts', 'load_posts');           // for logged in user
add_action('wp_ajax_nopriv_load_posts', 'load_posts');
// Infinite Scroll //
function load_searched_posts(){

     $post_offset = $_POST['post_offset'];
     $s = $_POST['s'];

     $args = array(
         'numberposts' => -1,
         'post_type' => 'post',
         'offset' => $post_offset,
         's' =>$s
     );

     $posts = new WP_Query($args);
     card($posts);
     die();
}

add_action('wp_ajax_load_searched_posts', 'load_searched_posts');           // for logged in user
add_action('wp_ajax_nopriv_searched_posts', 'load_searched_posts');
?>
