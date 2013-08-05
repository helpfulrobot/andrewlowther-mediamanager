<?php

if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
	define('MEDIAMANAGER_CORE_PATH', end(explode(DIRECTORY_SEPARATOR, __DIR__)));
} else {
	define('MEDIAMANAGER_CORE_PATH', end(explode(DIRECTORY_SEPARATOR, dirname(__FILE__))));
}