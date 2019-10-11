<?php
if (!defined('ABSPATH')) { exit("Permission Denied"); }

$path = dirname(__DIR__);
$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
foreach($objects as $name => $object){
    if (endsWith($name, "-mod.php")){
        include $name;
    }

}

?>