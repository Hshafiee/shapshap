<?php
// Register Custom Post Type خدمات
add_action( 'init', function(){

	$labels = array(
		'name' => _x( 'خدمات', 'Post Type General Name', 'modiranart' ),
		'singular_name' => _x( 'services', 'Post Type Singular Name', 'modiranart' ),
		'menu_name' => _x( 'خدمات', 'Admin Menu text', 'modiranart' ),
		'name_admin_bar' => _x( 'خدمات', 'Add New on Toolbar', 'modiranart' ),
		'archives' => __( 'آرشیو خدمات ', 'modiranart' ),
		'attributes' => __( 'ویژگی های خدمات ', 'modiranart' ),
		'parent_item_colon' => __( 'والد خدمات:', 'modiranart' ),
		'all_items' => __( 'همه خدمات', 'modiranart' ),
		'add_new_item' => __( 'افزودن خدمات', 'modiranart' ),
		'add_new' => __( 'افزودن', 'modiranart' ),
		'new_item' => __( 'افزودن خدمات', 'modiranart' ),
		'edit_item' => __( 'ویرایش خدمات', 'modiranart' ),
		'update_item' => __( 'بروزرسانی خدمات', 'modiranart' ),
		'view_item' => __( 'نمایش خدمات', 'modiranart' ),
		'view_items' => __( 'نمایش خدمات', 'modiranart' ),
		'search_items' => __( 'جستجو در خدمات', 'modiranart' ),
		'not_found' => __( 'موردی یافت نشد', 'modiranart' ),
		'not_found_in_trash' => __( 'موردی یافت نشد', 'modiranart' ),
		'featured_image' => __( 'تصویر شاخص', 'modiranart' ),
		'set_featured_image' => __( 'استفاده به عنوان تصویر شاخص', 'modiranart' ),
		'remove_featured_image' => __( 'حذف  تصویر شاخص', 'modiranart' ),
		'use_featured_image' => __( 'استفاده به عنوان تصویر شاخص', 'modiranart' ),
		'insert_into_item' => __( 'افزودن به خدمات', 'modiranart' ),
		'uploaded_to_this_item' => __( 'بارگزاری در خدمات', 'modiranart' ),
		'items_list' => __( 'لیست خدمات ', 'modiranart' ),
		'items_list_navigation' => __( 'پیمایش خدمات ', 'modiranart' ),
		'filter_items_list' => __( 'فیلتر خدمات', 'modiranart' ),
	);
	$args = array(
		'label' => __( 'خدمات', 'modiranart' ),
		'description' => __( '', 'modiranart' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-rest-api',
		'supports' => array('title', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 1,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'services', $args );
}, 0 );

add_action( 'cmb2_admin_init', function () {
	$mService = new_cmb2_box( array(
		'id'           => 'mod_service_setting',
		'title'        => esc_html__( 'خذمات', 'modiranart' ),
		'object_types' => array( 'services' ),
		'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, 

	) );

		$mService->add_field( array(
			'name'    => 'وضعیت اسلاید',
			'id'      => 'service_status',
			'type'    => 'radio_inline',
			'options' => array(
				'active' 	=> __( 'فعال', 'modiranart' ),
				'deactive'   => __( 'غیرفعال', 'modiranart' ),
			),
			'default' => 'active',
		) );
		
		$mService->add_field( array(
			'name' => 'توضیحات',
			'id' => 'service_info',
			'type' => 'textarea'
		) );
} );

?>