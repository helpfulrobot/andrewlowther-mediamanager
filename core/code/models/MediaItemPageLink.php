<?php

/**
 * Media item page link model
 * 
 * @author 		Andrew Lowther
 * @package 	Media Manager
 * @version 	Release: 0.1.0
 * @copyright 	2013 Andrew Lowther
 * @link 		https://github.com/AndrewLowther/mediamanager
 * @since 		0.1.0
 */
class MediaItemPageLink extends MediaItemLink {

	/**
	 * Page item to link to
	 * 
	 * @var $has_one
	 * @access private
	 */
	private static $has_one = array(
		"Page" => "Page"
	);

}