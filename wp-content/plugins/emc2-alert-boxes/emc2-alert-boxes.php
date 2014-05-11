<?php
/*
Plugin Name: EMC2 Alert Boxes
Plugin URI: http://emc2innovation.com
Description: Fancy alert boxes for WordPress
Version: 1.3
Author: Eric McNiece
Author URI: http://emc2innovation.com
License: GPL2
*/


require_once(ABSPATH . '/wp-admin/includes/plugin.php');
require_once(ABSPATH . WPINC . '/pluggable.php');
require_once('emc2alert-options.php');
/* ********************************************************
 *	
 *	EMC2 Alert Enqueues
 *	
 *	CSS = emc2alerts.css 
 *	JS = emc2alerts.js
 *	
 ******************************************************** */
add_action('wp_head', 'emc2alerts_enqueue');
function emc2alerts_enqueue() {
    
    wp_register_script( 'emc2alerts_js', plugins_url('emc2-alert-boxes.js', __FILE__), array('jquery') );
    wp_enqueue_script( 'emc2alerts_js' );

    wp_register_style( 'emc2alerts_css', plugins_url('emc2-alert-boxes.css', __FILE__) );
    wp_enqueue_style( 'emc2alerts_css' );
}    


/* ********************************************************
 *	
 *	EMC2 Alert Shortcode
 *	
 *	Type = info, warn, error, ok 
 *	Style = NULL, fixed
 *	Position = top, bottom 
 *	Visible = True, False
 *	
 ******************************************************** */

add_shortcode('emc2alert', 'emc2alert_func');
function emc2alert_func($atts, $content) {
     extract(shortcode_atts(array(
	 	'title' => NULL,
		'type' => 'info',
	    'style' => NULL,
		'visible' => TRUE,
		'position' => 'top',
		'width' => NULL,
		'closebtn' => FALSE,
		'wpbar' => 'auto',
		'animate' => false,
     ), $atts));
	 
	
	// If specified, insert 
	if( $width) $sWidth = 'style="width:'.$width.';"';
	if( $title) $sTitle = '<h3>'.$title.'</h3>';
	if( $content) $sContent = '<p>'.$content.'</p>';
	if( $animate) $sAnimate = 'animate';
	
	if( $wpbar == 'auto'){ if ( is_admin_bar_showing() ) $sWpbar = 'wp-bar'; }
	else if($wpbar === TRUE) { $sWpbar = 'wp-bar'; }
	else $sWpbar = '';
	
	// If close button is enabled, add to tag
	if( $closebtn) $sClose = '<div class="emc2alert-close"></div>';
	
	return '<div '.$sWidth.' class="emc2-alert-box '.$type.' '.$style.' '.$visible.' '.$position.' '.$sWpbar.' '.$sAnimate.'">
		<div class="emc2-alert-wrap">
			'.$sClose.'
			'.$sTitle.'
			'.$sContent.'
		</div>
	</div>';

} // emc2alert_func

/* ********************************************************
 *	
 *	EMC2 Alert TinyMCE Button
 *	
 *	Adds an easy-insert button to the text editor
 *	
 ******************************************************** */

// registers the buttons for use
function register_emc2alert_buttons($buttons) {
	// inserts a separator between existing buttons and our new one
	// "friendly_button" is the ID of our button
	array_push($buttons, "|", "emc2alert_button");
	return $buttons;
}
 
// filters the tinyMCE buttons and adds our custom buttons
function emc2alert_shortcode_buttons() {
	// Don't bother doing this stuff if the current user lacks permissions
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		// filter the tinyMCE buttons and add our own
		add_filter("mce_external_plugins", "add_emc2alert_tinymce_plugin");
		add_filter('mce_buttons', 'register_emc2alert_buttons');
	}
}
// init process for button control
add_action('init', 'emc2alert_shortcode_buttons');
 
// add the button to the tinyMCE bar
function add_emc2alert_tinymce_plugin($plugin_array) {
	global $fscb_base_dir;
	$plugin_array['emc2alert_button'] = plugins_url('emc2alert-shortcode-buttons.js', __FILE__);
	return $plugin_array;
}

/* ********************************************************
 *	
 *	EMC2 Alert Admin Page
 *	
 *	Settings page 
 *	
 ******************************************************** */
add_options_page("EMC2 Alert Settings", "EMC2 Alert Settings", 'manage_options', 'emc2alert_options', 'emc2alert_options_page');
