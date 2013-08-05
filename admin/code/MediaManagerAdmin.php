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

		// Get the config variables we'll need
		$config = Config::inst()->get('MediaManager', 'Cloudinary');

		// Inject them into the global scope
		Requirements::customScript(<<<JS
			;(function (window, undefined) {
				window.mediamanager = window.mediamanager || {};
				window.mediamanager.cloudinary = {
					cloud_name: "{$config['cloud_name']}",
					api_key: "{$config['api_key']}"
				}
			}/)(window);
JS
);


		// Get the base javascript path
		$BaseJsPath = MEDIAMANAGER_CORE_PATH . '/javascript';

		// Combine the cloudinary files into one super file
		Requirements::combine_files(
			'cloudinary.js',
			array(
				"{$BaseJsPath}/cloudinary/js/load-image.min.js",
				"{$BaseJsPath}/cloudinary/js/canvas-to-blob.min.js",
				"{$BaseJsPath}/cloudinary/js/jquery.fileupload.js",
				"{$BaseJsPath}/cloudinary/js/jquery.ui.widget.js",
				"{$BaseJsPath}/cloudinary/js/jquery.fileupload-process.js",
				"{$BaseJsPath}/cloudinary/js/jquery.fileupload-image.js",
				"{$BaseJsPath}/cloudinary/js/jquery.fileupload-validate.js",
				"{$BaseJsPath}/cloudinary/js/jquery.cloudinary.js"
			)
		);

		// Same again for our files
		Requirements::combine_files(
			'mediamanager.js',
			array(
				"{$BaseJsPath}/mediamanager/mediamanager.core.js"
			)
		);

		// Set the cloudinary config
		\Cloudinary::config($config);
	}

}