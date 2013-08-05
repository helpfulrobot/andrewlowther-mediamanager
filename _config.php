<?php

$ds = DIRECTORY_SEPARATOR;
if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
	$path = __DIR__;
} else {
	$path = dirname(__FILE__);
}
$mediamanager_core_path = explode($ds, $path);
define('MEDIAMANAGER_CORE_PATH', end($mediamanager_core_path));