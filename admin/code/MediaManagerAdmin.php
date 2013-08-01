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
class MediaManagerAdmin extends LeftAndMain {

	/**
	 * URL Segment
	 *
	 * @var string
	 * @access private
	 **/
	private static $url_segment = 'media';

	/**
	 * Admin Module Menu Title
	 *
	 * @var string
	 * @access private
	 **/
	private static $menu_title = 'Media';

	/**
	 * Managed models
	 *
	 * @var array
	 * @access private
	 **/
	private static $managed_models = array('MediaItem');

	/**
	 * Init
	 * 	Include the javascript we will need
	 *
	 * @return void
	 * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
	 **/
	public function init() {
		parent::init();

		Requirements::combine_files(
			'cloudinary.js',
			array(
				'mediamanager/javascript/cloudinary/js/load-image.min.js',
				'mediamanager/javascript/cloudinary/js/canvas-to-blob.min.js',
				'mediamanager/javascript/cloudinary/js/jquery.fileupload.js',
				'mediamanager/javascript/cloudinary/js/jquery.fileupload-process.js',
				'mediamanager/javascript/cloudinary/js/jquery.fileupload-image.js',
				'mediamanager/javascript/cloudinary/js/jquery.fileupload-validate.js'
			)
		);

		Requirements::combine_files(
			'mediamanager.js',
			array(
				'mediamanager/javascript/mediamanager/mediamanager.core.js'
			)
		);
	}

}