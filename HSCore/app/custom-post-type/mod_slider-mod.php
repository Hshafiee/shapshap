<?php
// Register Custom Post Type اسلایدر
add_action( 'init', function(){
	$labels = array(
		'name' => _x( 'اسلایدر', 'Post Type General Name', 'modiranart' ),
		'singular_name' => _x( 'mod_slider', 'Post Type Singular Name', 'modiranart' ),
		'menu_name' => _x( 'اسلایدر', 'Admin Menu text', 'modiranart' ),
		'name_admin_bar' => _x( 'اسلایدر', 'Add New on Toolbar', 'modiranart' ),
		'archives' => __( 'آرشیو اسلایدر ', 'modiranart' ),
		'attributes' => __( 'ویژگی های اسلایدر ', 'modiranart' ),
		'parent_item_colon' => __( 'والد اسلایدر:', 'modiranart' ),
		'all_items' => __( 'همه اسلایدر', 'modiranart' ),
		'add_new_item' => __( 'افزودن اسلایدر', 'modiranart' ),
		'add_new' => __( 'افزودن', 'modiranart' ),
		'new_item' => __( 'افزودن اسلایدر', 'modiranart' ),
		'edit_item' => __( 'ویرایش اسلایدر', 'modiranart' ),
		'update_item' => __( 'بروزرسانی اسلایدر', 'modiranart' ),
		'view_item' => __( 'نمایش اسلایدر', 'modiranart' ),
		'view_items' => __( 'نمایش اسلایدر', 'modiranart' ),
		'search_items' => __( 'جستجو در اسلایدر', 'modiranart' ),
		'not_found' => __( 'موردی یافت نشد', 'modiranart' ),
		'not_found_in_trash' => __( 'موردی یافت نشد', 'modiranart' ),
		'featured_image' => __( 'تصویر شاخص', 'modiranart' ),
		'set_featured_image' => __( 'استفاده به عنوان تصویر شاخص', 'modiranart' ),
		'remove_featured_image' => __( 'حذف  تصویر شاخص', 'modiranart' ),
		'use_featured_image' => __( 'استفاده به عنوان تصویر شاخص', 'modiranart' ),
		'insert_into_item' => __( 'افزودن به اسلایدر', 'modiranart' ),
		'uploaded_to_this_item' => __( 'بارگزاری در اسلایدر', 'modiranart' ),
		'items_list' => __( 'لیست اسلایدر ', 'modiranart' ),
		'items_list_navigation' => __( 'پیمایش اسلایدر ', 'modiranart' ),
		'filter_items_list' => __( 'فیلتر اسلایدر', 'modiranart' ),
	);
	$args = array(
		'label' => __( 'اسلایدر', 'modiranart' ),
		'description' => __( '', 'modiranart' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-slides',
		'supports' => array('title', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 1,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'mod_slider', $args );
}, 0 );

add_action( 'cmb2_admin_init', function () {
	$mSlider = new_cmb2_box( array(
		'id'           => 'mod_slider_setting',
		'title'        => esc_html__( 'اسلایدر', 'modiranart' ),
		'object_types' => array( 'mod_slider' ),
		'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, 

	) );

		$mSlider->add_field( array(
			'name'    => 'وضعیت اسلاید',
			'id'      => 'slider_status',
			'type'    => 'radio_inline',
			'options' => array(
				'active' 	=> __( 'فعال', 'modiranart' ),
				'deactive'   => __( 'غیرفعال', 'modiranart' ),
			),
			'default' => 'active',
		) );
		$mSlider->add_field( array(
			'name'    => 'رنگ عنوان',
			'id'      => 'slider_color',
			'type'    => 'colorpicker',
			'default' => '#ffffff',
		) );

        $mSlider->add_field( array(
            'name' => 'لینک اسلاید',
            'id'   => 'slider_link',
            'type' => 'text',
		) );
		

} );


add_action('manage_mod_slider_posts_columns', function ($columns) {
	$columns['slide'] = "تصویر";
	$columns['status'] = "وضعیت";
    return $columns;
});

add_action('manage_posts_custom_column', function ($column_name, $id){
	if($column_name === 'slide'){
		echo '<a href="'.get_edit_post_link( $id, $context = 'display' ).'" >';
		echo the_post_thumbnail( array(250,300) );
		echo '</a>';
	}
	
	if($column_name === 'status'){


		if(isset($_GET['set_deactive_slide'])){
			update_post_meta( $id, "slider_status", 'deactive' );
		}

		if(isset($_GET['set_active_slide'])){
			update_post_meta( $id, "slider_status", 'active' );
		}




		switch (get_post_meta($id,"slider_status",TRUE)) {
			case 'active':
				echo '<a class="button" href="'. admin_url( 'edit.php?post_type=mod_slider&set_deactive_slide' ) .'">غیرفعال سازی</a>';
				break;
			case 'deactive':
				echo '<a class="button button-primary" href="'. admin_url( 'edit.php?post_type=mod_slider&set_active_slide') .'">فعالسازی</a>';
				break;
		}
		
	}
}, 5, 2);

add_action('post_row_actions',function ($actions, $post){
    if ($post->post_type =="mod_slider"){
		unset($actions['inline hide-if-no-js']);
		unset($actions['view']);
    }
    return $actions;
}, 10, 2);


add_action('admin_head', function () {
    $output_css = '<style type="text/css">
        .column-date { width:15% !important }
        .column-title { width:25% !important }
        .column-slide { width:30% !important }
        .column-status { width:8% !important }
    </style>';
    echo $output_css;
});
?>