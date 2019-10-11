<html dir="rtl">
<head>
<title><?php echo get_bloginfo() ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="<?php echo mod_get_option("mod_general_setting","mod_gs_nav_color") ?>" />
<link rel="icon" type="image/png" href="<?php echo mod_get_option("mod_general_setting","mod_gs_favicon") ?>" />
<?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
