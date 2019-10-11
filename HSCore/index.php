<?php
if (!defined('ABSPATH')) { exit("Permission Denied"); }


// Defines
define("MODIRAN_BASE_DIR",dirname(__FILE__));
define("MODIRAN_CORE_DIR",dirname(__FILE__)."/core/");
define("MODIRAN_PAGES",dirname(__FILE__)."/app/pages/");
define("MODIRAN_BASE_URL",get_template_directory_uri() ."/ModiranCore");
define("MODIRAN_CORE_URL",get_template_directory_uri() ."/ModiranCore/core/");



// Includes
require_once "core/index.php";
require_once "app/index.php";

?>