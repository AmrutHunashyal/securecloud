jQuery(document).ready(function($) {
	
	var xyz_qbx_shortcode=0;
	
	if(jQuery("#xyz_qbx_shortcode").length>0)
	{	
		xyz_qbx_shortcode=1;
		
	}   
		
	
	var data = {
		action: 'xyz_qbx_action',
		xyz_qbx_shortcd:xyz_qbx_shortcode,
		xyz_qbx_pg:xyz_qbx_ajax_object.ispage,
		xyz_qbx_ps:xyz_qbx_ajax_object.ispost,
		xyz_qbx_hm:xyz_qbx_ajax_object.ishome
	};
	
	// Pass the url value separately from ajaxurl for front end AJAX implementations
	jQuery.post(xyz_qbx_ajax_object.ajax_url, data, function(response) {
		
		if(xyz_qbx_shortcode==1)
		{
			if(response!=0)
			     jQuery("#xyz_qbx_shortcode").append(response);
		}	
		else
		{
			if(response!=0)
		         jQuery("#xyz_qbx_container").append(response);
		}
	});
});
