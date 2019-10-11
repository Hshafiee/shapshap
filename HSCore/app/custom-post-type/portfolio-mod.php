<?php
// Register Custom Post Type نمونه کار
add_action( 'init', function(){

	$labels = array(
		'name' => _x( 'نمونه کار', 'Post Type General Name', 'modiranart' ),
		'singular_name' => _x( 'portfolio', 'Post Type Singular Name', 'modiranart' ),
		'menu_name' => _x( 'نمونه کار', 'Admin Menu text', 'modiranart' ),
		'name_admin_bar' => _x( 'نمونه کار', 'Add New on Toolbar', 'modiranart' ),
		'archives' => __( 'آرشیو نمونه کار ', 'modiranart' ),
		'attributes' => __( 'ویژگی های نمونه کار ', 'modiranart' ),
		'parent_item_colon' => __( 'والد نمونه کار:', 'modiranart' ),
		'all_items' => __( 'همه نمونه کار', 'modiranart' ),
		'add_new_item' => __( 'افزودن نمونه کار', 'modiranart' ),
		'add_new' => __( 'افزودن', 'modiranart' ),
		'new_item' => __( 'افزودن نمونه کار', 'modiranart' ),
		'edit_item' => __( 'ویرایش نمونه کار', 'modiranart' ),
		'update_item' => __( 'بروزرسانی نمونه کار', 'modiranart' ),
		'view_item' => __( 'نمایش نمونه کار', 'modiranart' ),
		'view_items' => __( 'نمایش نمونه کار', 'modiranart' ),
		'search_items' => __( 'جستجو در نمونه کار', 'modiranart' ),
		'not_found' => __( 'موردی یافت نشد', 'modiranart' ),
		'not_found_in_trash' => __( 'موردی یافت نشد', 'modiranart' ),
		'featured_image' => __( 'تصویر شاخص', 'modiranart' ),
		'set_featured_image' => __( 'استفاده به عنوان تصویر شاخص', 'modiranart' ),
		'remove_featured_image' => __( 'حذف  تصویر شاخص', 'modiranart' ),
		'use_featured_image' => __( 'استفاده به عنوان تصویر شاخص', 'modiranart' ),
		'insert_into_item' => __( 'افزودن به نمونه کار', 'modiranart' ),
		'uploaded_to_this_item' => __( 'بارگزاری در نمونه کار', 'modiranart' ),
		'items_list' => __( 'لیست نمونه کار ', 'modiranart' ),
		'items_list_navigation' => __( 'پیمایش نمونه کار ', 'modiranart' ),
		'filter_items_list' => __( 'فیلتر نمونه کار', 'modiranart' ),
	);
	$args = array(
		'label' => __( 'نمونه کار', 'modiranart' ),
		'description' => __( '', 'modiranart' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-images-alt',
		'supports' => array('title', 'editor',  'thumbnail'),
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
	register_post_type( 'portfolio', $args );
}, 0 );


add_action( 'cmb2_admin_init', function () {
	$mPortfolio = new_cmb2_box( array(
		'id'           => 'mod_portfolio_setting',
		'title'        => esc_html__( 'نمونه کار', 'modiranart' ),
		'object_types' => array( 'portfolio' ),
		'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, 

	) );

		$mPortfolio->add_field( array(
			'name'    => 'وضعیت نمونه کار',
			'id'      => 'portfolio_status',
			'type'    => 'radio_inline',
			'options' => array(
				'active' 	=> __( 'فعال', 'modiranart' ),
				'deactive'   => __( 'غیرفعال', 'modiranart' ),
			),
			'default' => 'active',
		) );
	
} );
?>