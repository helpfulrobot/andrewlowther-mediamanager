<?php

/**
 * Media manager admin tests
 * 
 * @author 		Andrew Lowther
 * @package 	Media Manager
 * @version 	Release: 0.1.0
 * @copyright 	2013 Andrew Lowther
 * @link 		https://github.com/AndrewLowther/mediamanager
 * @since 		0.1.0
 */
class MediaManagerAdminTest extends SapphireTest {

	/**
	 * Fixture file, represents the database
	 * 
	 * @var string
	 * @access public
	 */
	public static $fixture_file = 'mediamanager/tests/admin/MediaManagerAdminTest.yml';

	/**
	 * Original environment type
	 *
	 * @var string
	 * @access protected
	 **/
	protected $orig_env_type;

	/**
	 * Set up for the series of tests
	 *
	 * @return void
	 * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
	 **/
	public function setUpOnce() {
		$this->orig_env_type = Config::inst()->get('Director', 'environment_type');
		Config::inst()->update('Director', 'environment_type', 'dev');

		parent::setUpOnce();
	}

	/**
	 * Tear down the test when we're done
	 * 
	 * @return void
	 * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
	 */
	public function tearDownOnce() {
		Config::inst()->update('Director', 'environment_type', $this->orig_env_type);

		parent::tearDownOnce();
	}

	/**
	 * Return a session that has a user logged in as an administrator
	 * 
	 * @return Session
	 */
	public function adminLoggedInSession() {
		return new Session(array(
			'loggedInAs' => $this->idFromFixture('Member', 'admin')
		));
	}

	/**
	 * Test the primary list view
	 * 
	 * @return void
	 * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
	 */
	public function testListView() {
		// Open the admin area logged in as admin
		$response = Director::test('admin/media/', null, $this->adminLoggedInSession());

		// Confirm that this URL gets you the entire page, with the edit form loaded
		$this->assertTrue(strpos($response->getBody(), 'Add Media Item') !== false);
		$this->assertTrue(strpos($response->getBody(), 'ss-gridfield-table') !== false);
	}

	/**
	 * Test the add media view
	 *
	 * @return void
	 * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
	 **/
	public function testAddItemView() {
		$response = Director::test('admin/media/MediaItem/EditForm/field/MediaItem/item/new', null, $this->adminLoggedInSession());

		$this->assertTrue(strpos($response->getBody(), 'name="CloudinaryRef"') !== false);
		$this->assertTrue(strpos($response->getBody(), 'Create') !== false);
	}

}