<?php
$mgs->add_field( array(
	'name' => 'تنظیمات عمومی',
	'desc' => '<span style="float: right;"> قالب :' . wp_get_theme( )->name . '</span><span style="float: left;"> نسخه : ' . wp_get_theme( )->version . '</span>',
	'type' => 'title',
	'id'   => PREFIX() . 'mod_gs_title'
) );
$mgs->add_field( array(
	'name'    => 'تصویر لوگو',
	'id'      => PREFIX() . 'mod_gs_logo',
	'type'    => 'file',
	'options' => array('url' => false,),
	'text'    => array('add_upload_file_text' => 'بارگذاری لوگو سایت'),
	'query_args' => array(
		'type' => array(
			'image/gif',
			'image/jpeg',
            'image/png',
            'image/svg+xml',
		),
	),
	'preview_size' =>  array(250 , 250),
) );

$mgs->add_field( array(
	'name'    => 'تصویر فاوآیکون',
	'id'      => PREFIX() . 'mod_gs_favicon',
	'type'    => 'file',
	'options' => array('url' => false,),
	'text'    => array('add_upload_file_text' => 'بارگذاری فاوآیکون سایت'),
	'query_args' => array(
		'type' => array(
			'image/gif',
			'image/jpeg',
            'image/png',
            'image/svg+xml',
		),
	),
	'preview_size' =>  array(50 , 50),
) );
	$mgs->add_field( array(
		'name'    => 'رنگ هدر در نمایش موبایل ',
		'desc'    =>'این کد رنگ مرورگر موبایل را به رنگ دلخواه شما تنظیم میکند',
		'id'      => PREFIX() . 'mod_gs_nav_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

	$mgs->add_field( array(
		'name' => 'شبکه های اجتماعی',
		'type' => 'title',
		'id'   => PREFIX() . 'mod_gs_social_title'
	) );

	
	$mgsg_social = $mgs->add_field( array(
		'id'          => PREFIX() . 'mod_gsg_social',
		'type'        => 'group',
		'options'     => array(
			'group_title'       =>'شبکه {#}', 
			'add_button'        => 'افزودن شبکه جدید',
			'remove_button'     => 'حذف',
			'sortable'          => true,
			'closed'         => true, 
		),
	) );
	
	$mgs->add_group_field( $mgsg_social, array(
		'name' => 'عنوان شبکه',
		'id'   => PREFIX() . 'mod_mgsg_title',
		'type' => 'text',
	) );
	$mgs->add_group_field( $mgsg_social, array(
		'name' => 'آدرس شبکه',
		'id'   => PREFIX() . 'mod_mgsg_url',
		'type' => 'text',
	) );

	$mgs->add_group_field( $mgsg_social, array(
		'name' => 'تصویر شبکه',
		'id'   => PREFIX() . 'mod_mgsg_img',
		'type' => 'file',
		'options' => array('url' => false,),
		'query_args' => array(
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
				'image/svg+xml',
			),
		),
		'preview_size' => array(50 ,50),
	) );


?>