<?php
$mhs->add_field( array(
	'name' => 'تنظیمات سربرگ',
	'desc' => '<span style="float: right;"> قالب :' . wp_get_theme( )->name . '</span><span style="float: left;"> نسخه : ' . wp_get_theme( )->version . '</span>',
	'type' => 'title',
	'id'   => PREFIX() . 'mod_hs_title'
) );

$mhs->add_field( array(
	'name' => 'اطلاعات تماس',
	'type' => 'title',
	'id'   => PREFIX() . 'mod_hs_contatc_title'
) );


$mhs->add_field( array(
	'name'    => 'تلفن تماس',
	'id'      => PREFIX() . 'mod_hs_contatc_phone',
	'type'    => 'text',
) );

$mhs->add_field( array(
	'name'    => 'پست الکترونیک',
	'id'      => PREFIX() . 'mod_hs_contatc_email',
	'type'    => 'text',
) );

$mhs->add_field( array(
	'name'    => 'فکس',
	'id'      => PREFIX() . 'mod_hs_contatc_fax',
	'type'    => 'text',
) );

$mhs->add_field( array(
	'name'    => 'آدرس',
	'id'      => PREFIX() . 'mod_hs_contatc_address',
	'type'    => 'text',
) );

?>