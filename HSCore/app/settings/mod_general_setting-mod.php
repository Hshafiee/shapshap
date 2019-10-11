<?php

function mod_general_setting() {
	$mgs = new_cmb2_box( array(
		'id'           => 'mod_general_setting',
		'title'        => esc_html__( 'تنظیمات اصلی', 'modiranart' ),
		'object_types' => array( 'options-page' ),
		'option_key'      => 'mod_general_setting',
		'icon_url'        => 'dashicons-admin-generic', 
		'menu_title'      => esc_html__( 'تنظیمات قالب', 'modiranart' ),
	) );
    
    include('mod_general_setting_fields.php');

	$mhs = new_cmb2_box( array(
		'id'           => 'mod_header_setting',
		'title'        => 'تنظیمات تماس',
		'object_types' => array( 'options-page' ),
		'option_key'   => 'mod_header_setting',
		'parent_slug'  => 'mod_general_setting',
	) );

	include('mod_header_setting_fields.php');

	$mfs = new_cmb2_box( array(
		'id'           => 'mod_footer_setting',
		'title'        => 'تنظیمات پاورقی',
		'object_types' => array( 'options-page' ),
		'option_key'   => 'mod_footer_setting',
		'parent_slug'  => 'mod_general_setting',
	) );

	include('mod_footer_setting_fields.php');



}
add_action( 'cmb2_admin_init', 'mod_general_setting' );