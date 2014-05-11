(function() {
	tinymce.create('tinymce.plugins.buttonPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mcebutton', function() {
				ed.windowManager.open({
					file : url + '/emc2alert_popup.php', // file that contains HTML for our modal window
					width : 220 + parseInt(ed.getLang('button.delta_width', 0)), // size of our window
					height : 340 + parseInt(ed.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
 
			// Register buttons
			ed.addButton('emc2alert_button', {title : 'EMC2 Alert Box', cmd : 'mcebutton', image: url + '/alert.png' });
		},
 
		getInfo : function() {
			return {
				longname : 'EMC2 Alert Box Shortcode',
				author : 'Eric McNiece',
				authorurl : 'http://emc2innovation.com',
				infourl : 'http://emc2innovation.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
 
	// Register plugin
	// first parameter is the button ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('emc2alert_button', tinymce.plugins.buttonPlugin);
 
})();