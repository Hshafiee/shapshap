<?php 
    // Add Styles
    add_action( 'wp_enqueue_scripts', function(){
        wp_enqueue_style( 'uikit-css', '//cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css' );
        wp_enqueue_style( 'Vazir-font', '//cdn.rawgit.com/rastikerdar/vazir-font/v21.1.0/dist/font-face.css' );
        wp_enqueue_style( 'shapshap', get_stylesheet_directory_uri() .'/style.css' );
        wp_enqueue_script('uikit-js', '//cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js', null, null, true);
        wp_enqueue_script('uikit-icon-js', '//cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js', null, null, true);
        wp_enqueue_script('slider', get_stylesheet_directory_uri() .'/assets/js/slider.js', array('jquery'), null, true);
    } );