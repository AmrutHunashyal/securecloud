=== EMC2 Alert Boxes ===
Contributors: emcniece
Donate link: http://emc2innovation.com
Tags: alert, popup, warning, html5, emc2, boxes
Requires at least: 3.0.0
Tested up to: 3.4.2
Stable tag: 1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

EMC2 Alert Boxes make a great way to notify your visitors of anything!

== Description ==

EMC2 Alert Boxes uses jQuery and HTML5 animations to provide a great-looking, simple and functional alerting system. Alert boxes can be placed using the `[emc2alert]` shortcode or by calling the `$().emc2alert()` jQuery function!

Check the demo at http://alert.emc2innovation.com !

Easy to use! Insert a shortcode on any page using a quick-create TinyMCE icon, or create alerts on the fly using jQuery:

Shortcode: `[emc2alert]This is some text![/emc2alert]`  
 -or-  
jQuery:  `$('body').emc2alert({ text:"This is some text!" });`


**Advanced Usage**

*Shortcode*

[emc2alert type="success" style="normal" width="300px" position="top" wpbar="auto" visible="visible" closebtn="1" title="Introducing..." animate="true"]A great way to alert your visitors![/emc2alert]

Defaults:

*	**type**: "info" - "success", "warning", "error" also available
*	**style**: NULL - "normal" displays as block at shortcode location, or "fixed" for top or bottom of page
*	**width**: NULL - accepts position with units, ie "300px", "100%" or "5em"
*	**position**: "top" - If style="fixed", position can be set to top or "bottom" of page
*	**wpbar**: "auto" - Auto-detects WP Admin Bar. Can be set to TRUE or FALSE as well to set compensation.
*	**visible**: TRUE - Set to FALSE to hide
*	**closebtn**: FALSE - Set to TRUE to add a close button to the box
*	**title**: "Alert Title" - Box title
*	**animate**: FALSE - Set to TRUE to enable slideUp() and slideDown() jQuery animations on open and close!


*jQuery*

`$('body').emc2alert({			 // Prepends Alert Box to 'body' element
	title: "Your Title",		  // or $('myTitleDiv').html()
	text: "Your Message",		  // or $('myMsgDiv').html()
	type: "info",				  // 'info', 'warning', 'error', 'success' - determines bg colors
	style: "normal",			  // 'normal', 'fixed' - in page or fixed to top or bottom
	visible: true,				// true, false - hides if necessary
	position: "top",			  // 'top', 'bottom' - positions box on page
	width: null,				// '100%', '960px' - specify units
	closebtn: false,			// true, false - displays close button in corner
	wpbar: false,				// true, false, 'auto' - adds top margin to avoid admin bar, with auto-detect
	animate: false				// true, false - adds open/close animation
});`



BIG thanks to [Red Team Design's work](http://www.red-team-design.com/cool-notification-messages-with-css3-jquery)!

To Do list:

*	Add _animate_ argument to TinyMCE shortcode generator
*	Add custom class field to shortcode
*   Add a settings page
*   Make plugin child-theme compatible
*	Add !important styles to CSS

Known bugs:

*   None yet! Please post at http://alert.emc2innovation.com if you find one.


== Installation ==

Installation is straighforward:

1. Upload the `/emc2-alert-boxes/` folder to your `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add shortcode to page or call function with jQuery

== Configuration ==

EMC2 Alert Boxes will work straight out of the box. Everything is configured from the shortcode or jQuery call! Post in the forums if you want to see a feature added.

If you are editing with the TinyMCE WYSIWYG interface, you will notice an orange triangle icon appear. This is a quick-build shortcode generator in case you forget exactly 

== Frequently Asked Questions ==

= Why do you take forever to respond? =
I work to eat. If you want a faster response, consider donating or hiring me for a job!

= Are you available for help? =
I might be able to help you - it totally depends on my schedule and workload. Send me an email! hello@emc2innovation.com. You could also post here on the forums.

If you want to jump the gun, make me a temporary user (with that email up there) and I will be more inclined to give you a hand. In return for my help, all I ask for is a rating! :)


== Screenshots ==

1. Theme-side box view.
2. TinyMCE shortcode creation interface. 

== Changelog ==

= 1.0 =
* Helloooooo World.

= 1.1 =
* Added register_activation hook

= 1.2 =
* Goofed on an SVN update

= 1.3 =
* Fixed a remote call to make plugin standards-compliant

== Upgrade Notice ==

= 1.0 =
Initial Release