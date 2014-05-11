<?php


  add_action('admin_menu', 'qbx_menu');

function qbx_menu()
{
	add_menu_page('Quick Box Popup Settings', 'XYZ Quick Box', 'manage_options', 'quickbox-settings', 'qbx_settings');
	

	// Add a submenu to the Dashboard:
	$page=add_submenu_page('quickbox-settings', 'Quick Box Popup Settings', 'Quick Box', 'manage_options', 'quickbox-settings' ,'qbx_settings'); // 8 for admin
	add_submenu_page('quickbox-settings', 'Quick Box Popup - Basic Settings', 'Basic Settings', 'manage_options', 'quickbox-basic-settings' ,'qbx_basic_settings'); // 8 for admin
	add_submenu_page('quickbox-settings', 'Quick Box - About', 'About', 'manage_options', 'quickbox-about' ,'qbx_about'); // 8 for admin

	
	
	add_action( "admin_print_scripts-$page", 'qbx_farbtastic_script' );
	add_action( "admin_print_styles-$page", 'qbx_farbtastic_style' );
}


function qbx_basic_settings()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

function qbx_settings()
{
	
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/quickbox-settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}


function qbx_about()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}


function qbx_farbtastic_script() 
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('farbtastic');

}

function qbx_farbtastic_style() 
{
	wp_enqueue_style('farbtastic');
}





function xyz_qbx_admin_style()
{
	
	wp_enqueue_script('jquery');
	wp_register_style('xyz_qbx_style', plugins_url('quick-box-popup/css/style.css'));
	wp_enqueue_style('xyz_qbx_style');

}
	
add_action('admin_enqueue_scripts', 'xyz_qbx_admin_style');

?>