<?php

/**
 * Media manager admin class
 * 
 * @author 		Andrew Lowther
 * @package 	Media Manager
 * @version 	Release: 0.1.0
 * @copyright 	2013 Andrew Lowther
 * @link 		https://github.com/AndrewLowther/mediamanager
 * @since 		0.1.0
 */
class MediaManagerAdmin extends ModelAdmin {

	/**
	 * URL Segment
	 *
	 * @var string
	 **/
	private static $url_segment = 'media';

	/**
	 * Admin Module Menu Title
	 *
	 * @var string
	 **/
	private static $menu_title = 'Media';

	/**
	 * Managed models
	 *
	 * @var array
	 **/
	private static $managed_models = array('MediaItem');

}