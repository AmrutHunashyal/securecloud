<?php
function emc2alert_options_page(){
	//delete_option('emc2_phone_home');	
	if( $_POST['phone_home']){
		if( !get_option('emc2_phone_home')){
			emc2_phone_home();
			add_option('emc2_phone_home', TRUE);
		}			
	}
	$eph = get_option('emc2_phone_home');
?>
<style type="text/css">
.emc2 .half{
	width:48%;
	float:left;	
	margin-right:10px;
}
.emc2 .half.last{
	margin-right:0px;	
}
.emc2 .right{ text-align:right; }
</style>
<div class="wrap emc2">
	<h2>EMC2 Alert Box Settings</h2>
    
    <div class="innerwrap">
    	<div class="half first">
        	<p>-- Settings coming soon --</p>
        </div>
        <div class="half last right">
        	<p>Thanks for using this plugin! Your support is appreciated :)</p>
            <?php if(!$eph): ?>
            	<p>If you'd like me to say hi or stop by your website,<br /> click this button and I'll be sure to visit.<br />
					<span style="color:#999;">This will send us your URL, WP Version, and Blog Name.</span></p>
            <?php endif; ?>
            <form name="phone_home" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=emc2alert_options">
            	<?php if(!$eph): ?><input class="button submit" type="submit" name="phone_home" value="Say Hello!" /><?php endif; ?>
                <a href="http://wordpress.org/extend/plugins/emc2-alert-boxes/" target="_blank" class="button submit">Rate This Plugin</a>
            </form>
        </div>
    </div>

</div>

<?php
}

function emc2_phone_home(){
	
	//set POST variables
	$url = base64_decode('aHR0cDovL2VtYzJpbm5vdmF0aW9uLmNvbS93cC1jb250ZW50L3BsdWdpbnMvZW1jMi1wbHVnaW4tdHJhY2tlci9lbWMyLXBsdWdpbi10cmFja2VyLXRlbXBsYXRlLnBocA==');
	$fields = array(
		'blogname' => get_option('blogname'),
		'time' => date('Y-m-d H:i:s'),
		'name' => 'EMC2 Alert Boxes',
		'slug' => 'emc2_alert_boxes',
		'url' => $_SERVER['SERVER_NAME'],
		'plugin_ver' => '1.0',
		'wp_ver' => get_bloginfo('version'),
	);
	
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	//echo $fields_string;
	//open connection
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//execute post
	$result = curl_exec($ch);
	
	//close connection
	curl_close($ch);
	
}