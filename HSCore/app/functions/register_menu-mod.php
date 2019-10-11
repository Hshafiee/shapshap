<?php

add_action( 'init', function(){
    register_nav_menus( array(
        'Home' => __( 'منو اصلی' ),
        'Top' => __( 'منو بالایی' ),
        'Mobile' => __( 'منو موبایل' ),
        'Hotlink' => __( 'دسترسی سریع' ),
        )
    );
});

?>