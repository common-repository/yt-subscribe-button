<?php 
// Add Scripts
function YTSubscribeButton_add_scripts($plugin_url){
	// Add Main CSS
	wp_enqueue_style( 'YTSubscribeButton-main-style', $plugin_url . '/assets/css/style.css');

	// Add Main JS
	wp_enqueue_script( 'YTSubscribeButton-main-script', $plugin_url . '/assets/js/main.js');

	// Add Google Script
	wp_register_script('google', 'https://apis.google.com/js/platform.js');
	wp_enqueue_script( 'google');
}

// Hook it with WP Core
add_action('wp_enqueue_scripts', 'YTSubscribeButton_add_scripts', 1, 1);
do_action('wp_enqueue_scripts', YTSB_PLUGIN_URL);


?>