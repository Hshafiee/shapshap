<?php
/**
 * 
 * add tag support to pages
 * @array : Post type name
 */
add_action('init', function(){
    register_taxonomy_for_object_type('post_tag', 'page');
});


/**
 * 
 * Add Post Thumnail Support
 * 
 */
add_theme_support( 'post-thumbnails' ); 

?>