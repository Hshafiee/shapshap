<?php
$mfs->add_field( array(
	'name' => 'تنظیمات پاورقی',
	'desc' => '<span style="float: right;"> قالب :' . wp_get_theme( )->name . '</span><span style="float: left;"> نسخه : ' . wp_get_theme( )->version . '</span>',
	'type' => 'title',
	'id'   => PREFIX() . 'mod_fs_title'
) );
$mfs->add_field( array(
	'name'    => 'اطلاعات مجموعه',
	'id'      => PREFIX() . 'mod_fs_contatc_desc',
	'type'    => 'textarea',
) );
?>