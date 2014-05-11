<?php
	// Load the options
$xyz_tinymce=get_option('xyz_qbx_tinymce');
if($xyz_tinymce==1)
{
	require( dirname( __FILE__ ) . '/tinymce_filters.php' );
}
	if (isset($_POST['xyz_qbx_html']))
	{
		$xyz_qbx_iframe=$_POST['xyz_qbx_iframe'];
		
		$xyz_qbx_html=stripslashes($_POST['xyz_qbx_html']);
		$xyz_qbx_title=$_POST['xyz_qbx_title'];
		if($xyz_qbx_title=="")
		{
			
			$xyz_qbx_title="Title";
		}
		$xyz_qbx_title_color=$_POST['xyz_qbx_title_color'];
		 $xyz_qbx_display_position=$_POST['xyz_qbx_display_position'];
	
		$xyz_qbx_width=abs(intval($_POST['xyz_qbx_width']));
		$xyz_qbx_height=abs(intval($_POST['xyz_qbx_height']));
		
		
		$xyz_qbx_showing_option="0,0,0";
		
		
		$xyz_qbx_z_index=intval($_POST['xyz_qbx_z_index']);
		
	     $xyz_qbx_corner_radius=$_POST['xyz_qbx_corner_radius'];
		
		 $xyz_qbx_bg_color=$_POST['xyz_qbx_bg_color'];		
	
		$xyz_qbx_width_dim=$_POST['xyz_qbx_width_dim'];
		$xyz_qbx_height_dim=$_POST['xyz_qbx_height_dim'];
		$xyz_qbx_border_color=$_POST['xyz_qbx_border_color'];
		$xyz_qbx_border_width=abs(intval($_POST['xyz_qbx_border_width']));
		
		$xyz_qbx_page_option=$_POST['xyz_qbx_page_option'];
		
		 $xyz_qbx_al=$_POST['xyz_qbx_display_position_arrange'];

		
	
			if($xyz_qbx_display_position==1)
			{
				if($xyz_qbx_al==0)
				{
					$xyz_qbx_position_predefined=1;
				}
				if($xyz_qbx_al==1)
				{
					$xyz_qbx_position_predefined=2;
				}
				if($xyz_qbx_al==2)
				{
					$xyz_qbx_position_predefined=3;
				}
			}
			if($xyz_qbx_display_position==2)
			{
				
					if($xyz_qbx_al==0)
				{
					$xyz_qbx_position_predefined=7;
					
				}
				if($xyz_qbx_al==1)
				{
					$xyz_qbx_position_predefined=6;
				}
				if($xyz_qbx_al==2)
				{
					$xyz_qbx_position_predefined=5;
				}
				
			}
		
			if($xyz_qbx_display_position==0)
			{
				if($xyz_qbx_al==3)
				{
					$xyz_qbx_position_predefined=1;
				}
				if($xyz_qbx_al==1)
				{
					$xyz_qbx_position_predefined=8;
				}
				if($xyz_qbx_al==4)
				{
					$xyz_qbx_position_predefined=7;
				}
			}
			if($xyz_qbx_display_position==3)
			{
				if($xyz_qbx_al==3)
				{
					$xyz_qbx_position_predefined=3;
				}
				if($xyz_qbx_al==1)
				{
					$xyz_qbx_position_predefined=4;
				}
				if($xyz_qbx_al==4)
				{
					$xyz_qbx_position_predefined=5;
				}
			}
			
			
		//echo $xyz_qbx_page_option=get_option('xyz_qbx_page_option');
			if($xyz_qbx_page_option==2)
			{
				$qbx_pgf=0;
				$qbx_pof=0;
				$qbx_hp=0;
				if(isset($_POST['xyz_qbx_pages']))
					$qbx_pgf=1;
				if(isset($_POST['xyz_qbx_posts']))
					$qbx_pof=1;
				if(isset($_POST['xyz_qbx_hp']))
					$qbx_hp=1;
			
				$xyz_qbx_showing_option=$qbx_pgf.",".$qbx_pof.",".$qbx_hp;
				
				update_option('xyz_qbx_showing_option',$xyz_qbx_showing_option);
				
		   }
			
			
$old_page_count=get_option('xyz_qbx_page_count');
$old_repeat_interval=get_option('xyz_qbx_repeat_interval');
if(isset($_POST['xyz_qbx_cookie_resett']))
{
?>	
	<script language="javascript">

 var cookie_date = new Date ( );  // current date & time
 cookie_date.setTime ( cookie_date.getTime() - 1 );

  document.cookie = "_xyz_qbx_pc=; expires=" + cookie_date.toGMTString()+ ";path=/";
  document.cookie = "_xyz_qbx_until=; expires=" + cookie_date.toGMTString()+ ";path=/";


</script>
	
	
<?php 	
}
	
		update_option('xyz_qbx_html',$xyz_qbx_html);
		
		update_option('xyz_qbx_width',$xyz_qbx_width);
	
		update_option('xyz_qbx_height',$xyz_qbx_height);
	
		
		update_option('xyz_qbx_z_index',$xyz_qbx_z_index);
		
		
	
		update_option('xyz_qbx_corner_radius',$xyz_qbx_corner_radius);
		
		update_option('xyz_qbx_height_dim',$xyz_qbx_height_dim);	
		

		update_option('xyz_qbx_width_dim',$xyz_qbx_width_dim);
		update_option('xyz_qbx_border_color',$xyz_qbx_border_color);
		update_option('xyz_qbx_border_width',$xyz_qbx_border_width);
		update_option('xyz_qbx_bg_color',$xyz_qbx_bg_color);
		update_option('xyz_qbx_page_option',$xyz_qbx_page_option);
		
		update_option('xyz_qbx_iframe',$xyz_qbx_iframe);
	
		update_option('xyz_qbx_display_position',$xyz_qbx_display_position);
		
	
		
		update_option('xyz_qbx_title',$xyz_qbx_title);
		update_option('xyz_qbx_title_color',$xyz_qbx_title_color);
		
	    update_option('xyz_qbx_position_predefined',$xyz_qbx_position_predefined);
			
		?><br>
		
<div  class="system_notice_area_style1" id="system_notice_area">Settings updated successfully.<span id="system_notice_area_dismiss">Dismiss</span></div>
<?php
}

?>

<style type="text/css">
label{
cursor:default;
}
</style>

<script type="text/javascript">
 
  jQuery(document).ready(function() {
    
    jQuery('#qbxbordercolorpicker').hide();
    jQuery('#qbxbordercolorpicker').farbtastic("#xyz_qbx_border_color");
    jQuery("#xyz_qbx_border_color").click(function(){jQuery('#qbxbordercolorpicker').slideToggle();});
    
    jQuery('#qbxbgcolorpicker').hide();
    jQuery('#qbxbgcolorpicker').farbtastic("#xyz_qbx_bg_color");
    jQuery("#xyz_qbx_bg_color").click(function(){jQuery('#qbxbgcolorpicker').slideToggle();});
    jQuery('#qbxcolorpicker').hide();
    jQuery('#qbxcolorpicker').farbtastic("#xyz_qbx_title_color");
    jQuery("#xyz_qbx_title_color").click(function(){jQuery('#qbxcolorpicker').slideToggle();});
    
  });
  function bgchange()
  {
	  var v;
v=document.getElementById('xyz_qbx_page_option').value;
if(v==1)
{
	document.getElementById('automatic').style.display='block';
	document.getElementById('shopt').style.display='none';
	document.getElementById('shortcode').style.display='none';		
}
if(v==2)
{
	document.getElementById('shopt').style.display='block';
	document.getElementById('shortcode').style.display='none';
	document.getElementById('automatic').style.display='none';	
}
if(v==3)

{
	document.getElementById('shortcode').style.display='block';
	document.getElementById('shopt').style.display='none';
	document.getElementById('automatic').style.display='none';
}
  }


  function qbxcheck()
  {
	  var qbd=document.getElementById('xyz_qbx_display_position').value;

	  var exact=document.getElementById('xyz_qbx_display_position_arrange').value;
		

	  if(qbd==1 || qbd==2)
	  {
	  	document.getElementById('qbxt').style.display='';	
	  	document.getElementById('qbxb').style.display='';
	  	document.getElementById('qbxl').style.display='none';	 
	  	document.getElementById('qbxr').style.display='none';
	  	document.getElementById('qbxl').disabled='disabled';	 
	  	document.getElementById('qbxr').disabled='disabled';
		document.getElementById('qbxt').disabled=false;	 
	  	document.getElementById('qbxb').disabled=false;
	 	jQuery("select[id=xyz_qbx_display_position_arrange] option[value=3]").attr("selected", false);
	 	jQuery("select[id=xyz_qbx_display_position_arrange] option[value=4]").attr("selected", false);
	 	if(exact==1)
	 	{
	 		jQuery("select[id=xyz_qbx_display_position_arrange] option[value=1]").attr("selected",true);
	 	}
	 	if(exact==2)
	 	{
	 		jQuery("select[id=xyz_qbx_display_position_arrange] option[value=2]").attr("selected",true);
	 	}

	 	if(exact==0)
	 	{
	 		jQuery("select[id=xyz_qbx_display_position_arrange] option[value=0]").attr("selected",true);
	 	}
	 
	  }
	  else
	  {

	  	document.getElementById('qbxt').style.display='none';	
	  	document.getElementById('qbxb').style.display='none';
	  	document.getElementById('qbxt').disabled='disabled';
	  	document.getElementById('qbxb').disabled='disabled';
	  	document.getElementById('qbxl').style.display='';	
	  	document.getElementById('qbxr').style.display='';
	  	document.getElementById('qbxl').disabled=false;	 
	  	document.getElementById('qbxr').disabled=false;
	  	jQuery("select[id=xyz_qbx_display_position_arrange] option[value=0]").attr("selected", false);
	 	jQuery("select[id=xyz_qbx_display_position_arrange] option[value=2]").attr("selected", false);
		if(exact==0)
	 	{
	 		jQuery("select[id=xyz_qbx_display_position_arrange] option[value=0]").attr("selected",true);
	 	}
	 	if(exact==3)
	 	{
	 		jQuery("select[id=xyz_qbx_display_position_arrange] option[value=3]").attr("selected",true);
	 	}

	 	if(exact==4)
	 	{
	 		jQuery("select[id=xyz_qbx_display_position_arrange] option[value=4]").attr("selected",true);
	 	}
	 	
	  }

  }
  
  
</script>
<div >
<?php 
$xyz_qbx_height_dim=get_option('xyz_qbx_height_dim');
$xyz_qbx_width_dim=get_option('xyz_qbx_width_dim');

$xyz_qbx_cookie_resett=get_option('xyz_qbx_cookie_resett');
$xyz_qbx_iframe=get_option('xyz_qbx_iframe');

$xyz_qbx_display_position=get_option('xyz_qbx_display_position');
$xyz_qbx_position_predefined=get_option('xyz_qbx_position_predefined');


$xyz_qbx_enable=get_option('$xyz_qbx_enable');

	


?>
<h2>Quickbox Settings</h2>
<form method="post" >

<?php 
$xyz_qbx_showing_option=get_option('xyz_qbx_showing_option');
$xyz_qbx_sh_arr=explode(",", $xyz_qbx_showing_option);
?>


<table  class="widefat" style="width:98%">
<tr valign="top" >
<td  scope="row" style="width: 50%" ><h3>  Title</h3></td>
<td></td>
</tr>

<tr valign="top" id="xyz_qbx">

<td scope="row" colspan="1"><label for="xyz_qbx_title"> Title text</label>	</td><td>

<input name="xyz_qbx_title" type="text" id="xyz_qbx_title"  value="<?php print(get_option('xyz_qbx_title')); ?>" size="40" />

</td>

</tr>

<tr valign="top" id="xyz_qbx_color">
<td scope="row"><label for="xyz_qbx_title_color"> Title color </label></td>
<td><input name="xyz_qbx_title_color" type="text" id="xyz_qbx_title_color"  value="<?php print(get_option('xyz_qbx_title_color')); ?>" size="40" /> <div id="qbxcolorpicker"></div> </td>
</tr>

<tr valign="top" id="lbx_dbx_font"> 
<td scope="row"><label for="lbx_dbx_title_font">Title font size </label></td><td style="color: red; ">Available in premium version only </td>
</tr>
<tr valign="top" >
<td  scope="row" style="width: 50%" ><h3>  Content</h3></td>
<td></td>
</tr>
<tr valign="top">

<td scope="row" colspan="1"><label for="lbx_referar_message_show_option">Show referrer URL based messages? </label></td><td style="color: red; ">Available in premium version only </td>
</tr>

<tr valign="top" >
<td colspan="2" >

<?php the_editor(get_option('xyz_qbx_html'),'xyz_qbx_html');?></td>
</tr>

<tr valign="top" id="xyz_qbx_pos"><td scope="row" colspan="2"><h3> Position Settings</h3></td></tr>


<tr valign="top" id="xyz_qbx_display_pos">

<td scope="row" colspan="1"><label for="xyz_qbx_display_position"> Display position </label></td><td>


<select name="xyz_qbx_display_position" id="xyz_qbx_display_position"  onchange="qbxcheck();">

<option value ="0" <?php if($xyz_qbx_display_position=='0') echo 'selected'; ?> >  Top </option>
<option value ="3" <?php if($xyz_qbx_display_position=='3') echo 'selected'; ?> > Bottom</option>
<option value ="1" <?php if($xyz_qbx_display_position=='1') echo 'selected'; ?> > Left </option>
<option value ="2" <?php if($xyz_qbx_display_position=='2') echo 'selected'; ?> >Right</option>

</select>
</td>

</tr>

<tr valign="top" id="xyz_qbx_display_arrange">

<td scope="row" colspan="1"><label for="xyz_qbx_display_position_arrange"> Display alignment </label></td><td>


<select name="xyz_qbx_display_position_arrange" id="xyz_qbx_display_position_arrange"  >

<option value ="0"  id="qbxt"  <?php if(($xyz_qbx_display_position=='1' &&$xyz_qbx_position_predefined=='1')||($xyz_qbx_display_position=='2' &&$xyz_qbx_position_predefined=='7')) echo 'selected';?>>  Top </option>

<option value ="1"  id="qbxc"   <?php if(($xyz_qbx_display_position=='1' &&$xyz_qbx_position_predefined=='2')||($xyz_qbx_display_position=='2' &&$xyz_qbx_position_predefined=='6')||($xyz_qbx_display_position=='3' &&$xyz_qbx_position_predefined=='4') ||($xyz_qbx_display_position=='0' &&$xyz_qbx_position_predefined=='8') ) echo 'selected';?>> Center </option>
<option value ="2" id="qbxb"  <?php if(($xyz_qbx_display_position=='1' &&$xyz_qbx_position_predefined=='3')||($xyz_qbx_display_position=='2' &&$xyz_qbx_position_predefined=='5')) echo 'selected';?>>Bottom</option>
<option value ="3"  id="qbxl"  <?php if(($xyz_qbx_display_position=='3' &&$xyz_qbx_position_predefined=='3')||($xyz_qbx_display_position=='0' &&$xyz_qbx_position_predefined=='1')) echo 'selected';?>>  Left </option>

<option value ="4"  id="qbxr" <?php if(($xyz_qbx_display_position=='0' &&$xyz_qbx_position_predefined=='7')||($xyz_qbx_display_position=='3' &&$xyz_qbx_position_predefined=='5')) echo 'selected';?>> Right </option>


</select>
</td>

</tr>

<tr valign="top" id="xyz_qbx_pos_width">
<td scope="row"><label for="xyz_qbx_width"> Width</label></td>
<td><input name="xyz_qbx_width" type="text" id="xyz_qbx_width"  value="<?php print(get_option('xyz_qbx_width')); ?>" size="40" /><select  name="xyz_qbx_width_dim"   id="xyz_qbx_width_dim" >
<option value ="px" <?php if($xyz_qbx_width_dim=='px') echo 'selected'; ?>>px</option>
<option value ="%" <?php if($xyz_qbx_width_dim=='%') echo 'selected'; ?>>%</option>

</select>
</td>
</tr>
<tr valign="top" id="xyz_qbx_pos_height">
<td scope="row"><label for="xyz_qbx_height"> Height</label></td>
<td><input name="xyz_qbx_height" type="text" id="xyz_qbx_height"  value="<?php print(get_option('xyz_qbx_height')); ?>" size="40" /><select  name="xyz_qbx_height_dim"   id="xyz_qbx_height_dim" >
<option value ="px" <?php if($xyz_qbx_height_dim=='px') echo 'selected'; ?>>px</option>
<option value ="%" <?php if($xyz_qbx_height_dim=='%') echo 'selected'; ?>>%</option>

</select></td>
</tr>
<?php
$xyz_qbx_mode=get_option('xyz_qbx_mode');
$xyz_qbx_page_option=get_option('xyz_qbx_page_option');
$xyz_qbx_repeat_interval_timing=get_option('xyz_qbx_repeat_interval_timing');
?>
<tr valign="top" ><td scope="row" colspan="2" ><h3> Effect Settings</h3></td><td style="color: red; "> </td></tr>

<tr valign="top" id="lbx_dbx_slide">
<td scope="row"><label for="lbx_slideable"> Slidable option </label></td><td style="color: red; ">Available in premium version only </td></tr>
<tr valign="top"><td scope="row" colspan="2"><h3> Display Logic Settings</h3></td></tr>


				
<tr valign="top">

<td scope="row" colspan="1"><label for="xyz_qbx_bgimage_option">Display as iframe </label></td><td>


<select name="xyz_qbx_iframe" id="xyz_qbx_iframe"  >

<option value ="1" <?php if($xyz_qbx_iframe=='1') echo 'selected'; ?> >Yes </option>

<option value ="0" <?php if($xyz_qbx_iframe=='0') echo 'selected'; ?> >No </option>
</select>
</td>

</tr>
<tr valign="top" >
<td scope="row" colspan="1"><label for="lbx_display_trigger"> Display trigger</label></td><td style="color: red; ">Available in premium version only </td></tr>

<tr valign="top">

<td scope="row" colspan="1"><label for="lbx_display_device">Target display devices </label></td><td style="color: red; ">Available in premium version only </td></tr>
<tr valign="top"><td scope="row" colspan="1"><h3> Popup Closing settings</h3></td><td style="color: red; "></td></tr>




<tr valign="top" id="lbx_close" >

<td scope="row" colspan="1"><label for="lbx_bgimage_option"> Close mode </label></td><td style="color: red; ">Available in premium version only </td></tr>
<tr valign="top" >

<td scope="row" colspan="1"><label for="lbx_bgimage_option"> Auto close after timeout </label></td><td style="color: red; ">Available in premium version only </td></tr>

<tr valign="top"><td scope="row" colspan="2"><h3> Javascript Callback Settings</h3></td></tr>
<tr valign="top">
<td scope="row"><label for="lbx_show_callback">Callback on popup display</label></td>
<td style="color: red; ">Available in premium version only </td>
</tr>
<tr valign="top">
<td scope="row"><label for="lbx_hide_callback">Callback on popup hide</label></td>
<td style="color: red; ">Available in premium version only </td>
</tr>
<tr valign="top"><td scope="row" colspan="2"><h3> Style Settings</h3></td></tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbx_z_index"> Z index</label></td>
<td><input name="xyz_qbx_z_index" type="text" id="xyz_qbx_z_index"  value="<?php print(get_option('xyz_qbx_z_index')); ?>" size="40" /> </td>
</tr>


<tr valign="top" >
<td scope="row"><label for="xyz_qbx_bg_color"> Background color</label></td>
<td><input name="xyz_qbx_bg_color" type="text" id="xyz_qbx_bg_color"  value="<?php print(get_option('xyz_qbx_bg_color')); ?>" size="40" /> <div id="qbxbgcolorpicker"></div> </td>
</tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbx_border_color"> Border color</label></td>
<td><input name="xyz_qbx_border_color" type="text" id="xyz_qbx_border_color"  value="<?php print(get_option('xyz_qbx_border_color')); ?>" size="40" /> <div id="qbxbordercolorpicker"></div> </td>
</tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbx_border_width">  Border  width </label></td>
<td><input name="xyz_qbx_border_width" type="text" id="xyz_qbx_border_width"  value="<?php print(get_option('xyz_qbx_border_width')); ?>" size="40" /> px </td>
</tr>
<tr valign="top" id="xyz_qbx_rad">
<td scope="row"><label for="xyz_qbx_corner_radius">  Border  radius </label></td>
<td><input name="xyz_qbx_corner_radius" type="text" id="xyz_qbx_corner_radius"  value="<?php print(get_option('xyz_qbx_corner_radius')); ?>" size="40" /> px </td>
</tr>

<tr valign="top"><td scope="row" colspan="2"><h3> Placement Settings</h3></td></tr>


<tr valign="top" id="pgopt" ><td scope="row"><label for="xyz_qbx_page_option"> Placement mechanism </label></td>
<td>
<select name="xyz_qbx_page_option" id="xyz_qbx_page_option" onchange="bgchange()">
<option value ="1" <?php if($xyz_qbx_page_option=='1') echo 'selected'; ?> >Automatic </option>
<option value ="2" <?php if($xyz_qbx_page_option=='2') echo 'selected'; ?> >Specific Pages</option>
<option value ="3" <?php if($xyz_qbx_page_option=='3') echo 'selected'; ?> >Manual </option>
</select></td></tr>


<tr valign="top" ><td scope="row" ></td><td>
<span  id="automatic" >Popup will load in all pages</span>
<span  id="shopt" >
<input name="xyz_qbx_pages" value="<?php echo $xyz_qbx_sh_arr[0];?>"<?php if($xyz_qbx_sh_arr[0]==1){?> checked="checked"<?php } ?> type="checkbox"> On Pages 
<input name="xyz_qbx_posts" value="<?php echo $xyz_qbx_sh_arr[1];?>"<?php if($xyz_qbx_sh_arr[1]==1){?> checked="checked"<?php }?>  type="checkbox"> On Posts
<input name="xyz_qbx_hp" value="<?php echo $xyz_qbx_sh_arr[2];?>"<?php if($xyz_qbx_sh_arr[2]==1){?> checked="checked"<?php }?>  type="checkbox"> On Home page 
</span>
<span  id="shortcode" >Use this short code in your pages - [xyz_qbx_default_code]</span>
</td>
</tr>



<!--  <tr valign="top" id="automatic"  style="display: none"><td scope="row" ></td><td >(Popup will load in all pages)</td>
</tr>
<tr valign="top" id="shortcode"  style="display: none"><td scope="row"></td><td>Use this short code in your pages - [xyz_qbx_default_code]</td>
</tr>-->


<tr valign="top">
<td scope="row"><label for="xyz_lcookie_resett"><h3>Reset cookies ? </h3>
 </label></td>
<td><input name="xyz_qbx_cookie_resett" type="checkbox" id="xyz_qbx_cookie_resett"   <?php  echo 'checked'; ?> /> 
(This is just for your testing purpose. If you want to see a popup  immediately after you make changes in any settings, you have to reset the cookies.)
 </td>
</tr>
<tr>
<td scope="row"> </td>
<td><br>
<input type="submit" value=" Update Settings " /></td>
</tr>

</table>


</form>

</div>

<script type="text/javascript">
bgchange();

qbxcheck();
</script>
<?php

?>
