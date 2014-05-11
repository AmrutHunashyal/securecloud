<?php
/*
Plugin Name:Quick Box Popup
Plugin URI: http://xyzscripts.com/wordpress-plugins/quick-box-popup/
Description: This plugin allows you to create a quick popup box with custom content in your site. You can customize the popup display by configuring various settings such as  position settings (height,width,top,left), display logic settings (time delay after page load, number of pages to browse,  repeat interval) and style settings(z-index, color, border etc). The plugin supports automatic and manual (shortcode)  display.
Version: 1.1.1
Author: xyzscripts.com
Author URI: http://xyzscripts.com/
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( !function_exists( 'add_action' ) ) 
{
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}

ob_start();
//error_reporting(0);
define('XYZ_QBX_PLUGIN_FILE',__FILE__);

require( dirname( __FILE__ ) . '/xyz-functions.php' );

require( dirname( __FILE__ ) . '/admin/install.php' );

require( dirname( __FILE__ ) . '/ajax-handler.php' );

require( dirname( __FILE__ ) . '/admin/menu.php' );

require( dirname( __FILE__ ) . '/create-quickbox.php' );

require( dirname( __FILE__ ) . '/shortcode-handler.php' );

require( dirname( __FILE__ ) . '/admin/destruction.php' );

if(get_option('xyz_credit_link')=="qbx"){

	add_action('wp_footer', 'xyz_qbx_credit');

}
function xyz_qbx_credit() {
	$content = '<div style="clear:both;width:100%;text-align:center; font-size:11px; "><a target="_blank" href="http://xyzscripts.com/wordpress-plugins/quick-box-popup/details">Quick Box Popup</a> Powered By : <a target="_blank" title="PHP Scripts & Wordpress Plugins" href="http://www.xyzscripts.com" >XYZScripts.com</a></div>';
	echo $content;
}




function xyz_qbx_query_vars($vars) {
	$vars[] = 'xyz_qbx';
	return $vars;
}
add_filter('query_vars', 'xyz_qbx_query_vars');


function xyz_qbx_parse_request($wp) {
	if (array_key_exists('xyz_qbx', $wp->query_vars)
			&& $wp->query_vars['xyz_qbx'] == 'iframe') {
		require( dirname( __FILE__ ) . '/iframe.php' );
		die;
	}
	
}
add_action('parse_request', 'xyz_qbx_parse_request');

?>