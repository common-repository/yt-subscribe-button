<?php 

/*
	Plugin Name: YT Subscribe Button
	Description: Dsiplays Youtube Subscribe Button and Subscriber Count 
	Author: Nadir Abbas
	Version: 1.0.0
	Author URI: http://www.facebook.com/amobilli2k
*/

// Direct Access Forbidden
if (!defined('ABSPATH')) {
	echo "Not Found";
	exit();
}

// Plugin Defaults
$plugin = array(
	'name' => 'YTSubscribeButton',
	'dir' => 'YTSubscribeButton'
);

// Define Useful Constans
if (!defined('YTSB_PLUGIN_DIR')) {
	define('YTSB_PLUGIN_DIR',  plugin_dir_path( __FILE__ ));
}
if (!defined('YTSB_PLUGIN_URL')) {
	define('YTSB_PLUGIN_URL',  plugins_url('', __FILE__));
}

// 	Load Main Assets
require_once(YTSB_PLUGIN_DIR . '/includes/YTSubscribeButton-scripts.php');

// Load Class
require_once(YTSB_PLUGIN_DIR . '/includes/YTSubscribeButton-class.php');

// Register Widget
function register_YTSubscribeButton(){
	register_widget('Youtube_Subs_Widget');
}

// Hook Widget
add_action('widgets_init', 'register_YTSubscribeButton');
?>