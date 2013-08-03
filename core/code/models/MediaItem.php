<?php

/**
 * Media item model
 * 
 * @author 		Andrew Lowther
 * @package 	Media Manager
 * @version 	Release: 0.1.0
 * @copyright 	2013 Andrew Lowther
 * @link 		https://github.com/AndrewLowther/mediamanager
 * @since 		0.1.0
 */
class MediaItem extends DataObject {

	/**
	 * Database fields
	 * 
	 * @var $db
	 * @access private
	 */
	private static $db = array(
		'CloudinaryRef' => 'Varchar(255)'
	);

	/**
	 * Update the CMS fields
	 * 
	 * @return FieldList
	 * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->replaceField('CloudinaryRef', new FileField('CloudinaryRef', 'Media to Upload'));

		return $fields;
	}

}