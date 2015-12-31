<?php

/**
 * Cloudinary simple image tests
 * 
 * @author 		Andrew Lowther
 * @package 	Media Manager
 * @version 	Release: 0.1.0
 * @copyright 	2013 Andrew Lowther
 * @link 		https://github.com/AndrewLowther/mediamanager
 * @since 		0.1.0
 */
class CloudinarySimpleImageTest extends SapphireTest
{

    /**
     * Original environment type
     *
     * @var string
     * @access protected
     **/
    protected $orig_env_type;

    /**
     * Config object
     *
     * @var Config
     **/
    protected $config;

    /**
     * Constructor
     *
     * @return void
     * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
     **/
    public function __construct()
    {
        $this->config = Config::inst()->get('MediaManager', 'Cloudinary');
        \Cloudinary::config($this->config);
    }

    /**
     * Set up for the series of tests
     *
     * @return void
     * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
     **/
    public function setUpOnce()
    {
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
    public function tearDownOnce()
    {
        Config::inst()->update('Director', 'environment_type', $this->orig_env_type);

        parent::tearDownOnce();
    }

    /**
     * Test the cloudinary config
     *
     * @return void
     * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
     **/
    public function testCloudinaryConfig()
    {
        $this->assertTrue(\Cloudinary::config_get('cloud_name') === $this->config['cloud_name']);
        $this->assertTrue(\Cloudinary::config_get('api_key') === $this->config['api_key']);
        $this->assertTrue(\Cloudinary::config_get('api_secret') === $this->config['api_secret']);
    }

    /**
     * Test image upload to cloudinary
     *
     * @return void
     * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
     **/
    public function testCloudinaryImageUpload()
    {
        $response = \Cloudinary\Uploader::upload('mediamanager/assets/test/test.png', array(
            'public_id' => 'test.png'
        ));
        $this->assertTrue(array_key_exists('public_id', $response));
    }

    /**
     * Test the image fetch
     *
     * @return void
     * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
     **/
    public function testCloudinaryImageFetch()
    {
        $mediaItem = DataObject::get_by_id('MediaItem', 1);
        $image = cloudinary_url('test.png');

        $this->assertTrue($image === sprintf('http://res.cloudinary.com/%s/image/upload/test.png', $this->config['cloud_name']));
    }

    /**
     * Test image deletion
     *
     * @return void
     * @author Andrew Lowther <andrew.lowther@mademedia.co.uk>
     **/
    public function testCloudinaryImageDeletion()
    {
        $api = new \Cloudinary\Api();
        $result = $api->delete_resources(array('test.png'));
        
        $this->assertTrue(is_a($result, 'Cloudinary\Api\Response'));
    }
}
