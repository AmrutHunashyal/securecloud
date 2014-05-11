<?php
// this file contains the contents of the popup window
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>EMC2 Alert Box</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style type="text/css" src="../../../wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" href="emc2-alert-boxes.css" />

<script type="text/javascript">
 
var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var title = jQuery('#button-dialog input#button-title').val() ? jQuery('#button-dialog input#button-title').val() : null;
		var text = jQuery('#button-dialog textarea#button-text').val() ? jQuery('#button-dialog textarea#button-text').val() : null;
		var type = jQuery('#button-dialog select#button-type').val();
		var style = jQuery('#button-dialog select#button-style').val();		 
		var visible = jQuery('#button-dialog select#button-visible').val();		 
		var position = jQuery('#button-dialog select#button-position').val();		 
		var width = jQuery('#button-dialog input#button-width').val() ? jQuery('#button-dialog input#button-width').val() : null;	 
		var closebtn = jQuery('#button-dialog select#button-closebtn').val();		 
		var wpbar = jQuery('#button-dialog select#button-wpbar').val();
		
		var output = '';

		// setup the output of our shortcode
		output = '[emc2alert ';
			//output += 'title=' + title + ' ';
			output += 'type="' + type + '" ';
			output += 'style="' + style + '" ';
			output += 'position="' + position + '" ';
			output += 'visible="' + visible + '" ';
			output += 'closebtn="' + closebtn + '" ';
			
			if(width) {output += 'width="' + width + '" '; }
			if(title) {output += 'title="' + title + '" '; }
			
		
		if(text) { output += ']'+ text + '[/emc2alert]'; } 	// check to see if the TEXT field is blank
		else { output += ']'; } 							// if it is blank, use the selected text, if present
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>
</head>
<body>
	<div id="button-dialog">
		<form action="/" method="get" accept-charset="utf-8">
			<div>
				<label for="button-title">Box Title</label>
				<input type="text" name="button-title" value="" id="button-title" />
			</div>
			<div>
				<label for="button-text">Box Text</label>
				<textarea type="text" name="button-text" value="" id="button-text" ></textarea>
			</div>
			<div>
				<label for="button-type">Type</label>
				<select name="button-type" id="button-type" size="1">
					<option value="info" selected="selected">Informative</option>
					<option value="success">Success</option>
					<option value="warning">Warning</option>
					<option value="error">Error</option>
				</select>
			</div>
			<div>
				<label for="button-style">Style</label>
				<select name="button-style" id="button-style" size="1">
					<option value="normal" selected="selected">Normal</option>
					<option value="fixed">Fixed</option>
				</select>
			</div>
			<div>
				<label for="button-visible">Visible?</label>
				<select name="button-visible" id="button-visible" size="1">
					<option value="visible" selected="selected">True</option>
					<option value="hidden">False</option>
				</select>
			</div>
			<div>
				<label for="button-position">Position</label>
				<select name="button-position" id="button-position" size="1">
					<option value="top" selected="selected">Top</option>
					<option value="bottom"=>Bottom</option>
				</select>
			</div>
			<div>
				<label for="button-width">Width</label>
				<input type="text" name="button-width" value="" id="button-width" />
			</div>
			<div>
				<label for="button-closebtn">Close Button</label>
				<select name="button-closebtn" id="button-closebtn" size="1">
					<option value="1">Yes</option>
					<option value="0" selected="selected">No</option>
				</select>
			</div>
			<div>
				<label for="button-wpbar">WPAdmin Bar Compensation</label>
				<select name="button-wpbar" id="button-wpbar" size="1">
					<option value="auto" selected="selected">Auto</option>
                    <option value="1">Yes</option>
					<option value="0">No</option>
				</select>
			</div>

			<div>	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>
		</form>
	</div>
</body>
</html>