<?php
function xyz_qbx_network_destroy($networkwide) {
	global $wpdb;

	if (function_exists('is_multisite') && is_multisite()) {
		// check if it is a network activation - if so, run the activation function for each blog id
		if ($networkwide) {
			$old_blog = $wpdb->blogid;
			// Get all blog ids
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blogids as $blog_id) {
				switch_to_blog($blog_id);
				qbx_destroy();
			}
			switch_to_blog($old_blog);
			return;
		}
	}
	qbx_destroy();
}

function qbx_destroy()
{
	global $wpdb;
	delete_option("xyz_qbx_tinymce");
	if(get_option('xyz_credit_link')=="qbx")
	{
		update_option("xyz_credit_link", '0');
	}
	delete_option("xyz_qbx_html");
	delete_option("xyz_qbx_top");
	delete_option("xyz_qbx_width");
	delete_option("xyz_qbx_height");
	delete_option("xyz_qbx_left");
	
	
	delete_option("xyz_qbx_enable");
	delete_option("xyz_qbx_showing_option");
	delete_option("xyz_qbx_adds_enable");
	delete_option("xyz_qbx_cache_enable");
	
	delete_option("xyz_qbx_delay");
	delete_option("xyz_qbx_page_count");
	delete_option("xyz_qbx_mode"); //page_count_only,both are other options
	delete_option("xyz_qbx_repeat_interval");
	delete_option("xyz_qbx_repeat_interval_timing");//hrs or  minute
	delete_option("xyz_qbx_z_index");
	delete_option("xyz_qbx_color");
	delete_option("xyz_qbx_corner_radius");
	delete_option("xyz_qbx_width_dim");
	delete_option("xyz_qbx_height_dim");
	delete_option("xyz_qbx_left_dim");
	delete_option("xyz_qbx_top_dim");
	delete_option("xyz_qbx_border_color");
	delete_option("xyz_qbx_bg_color");
	delete_option("xyz_qbx_opacity");
	delete_option("xyz_qbx_border_width");
	delete_option("xyz_qbx_page_option");
	delete_option("xyz_qbx_close_button_option");
	delete_option("xyz_qbx_iframe");
	
	delete_option("xyz_qbx_positioning");
	delete_option("xyz_qbx_position_predefined");
	delete_option("xyz_qbx_display_position");

}

register_uninstall_hook(XYZ_QBX_PLUGIN_FILE,'xyz_qbx_network_destroy');


?>