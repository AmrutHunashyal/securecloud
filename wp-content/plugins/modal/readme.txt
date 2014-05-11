=== Modal ===
Contributors: ziodave
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=43GGXTUREFNZE
Tags: modal, dialog, modal dialog, modal page, modal post, popup
Requires at least: 3.3.0
Tested up to: 3.5.2
Stable tag: 1.0.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enable modal pages and posts on your blog. Create modal forms for better calls to action!

== Description ==

Modal is a WordPress plugin that enables you to create modal dialogs from posts or pages.

Features include:

* Create a modal dialog from any page or post.
* Define the size of the dialog.

== Installation ==

1. Install Modal either via the WordPress.org plugin directory, or by uploading the files to your server
2. Activate Modal,
3. Insert the *[modal ...]* short-code wherever you want the modal page/post to appear.

This is an example use (using the Contact Form plugin CSS classes to style the form):

<pre>
[modal class="mt-button"
       slug="sign-up"
       content_selector="div.content div.container"
       title_selector="div.page-title h2"
       width="1000"
       height="370"
       load_scripts="no"]

Sign-up now!

[/modal]
</pre>

== Screenshots ==

1. A form in a standard page - uses the [LaunchRock Plugin](http://wordpress.org/plugins/launchrock)
2. The same form loaded in a modal dialog using the **Modal** plugin.

== Changelog ==

= 1.0.7 =
* Fix: fix description error in plug-in page.

= 1.0.6 =
* Fix: fix typo in plug-in page.

= 1.0.5 =
* Other: add screenshots to the plug-in page.

= 1.0.4 =
* Feature: add a close button to the modal dialog.

= 1.0.3 =
* Fix: remove html escaping from link label.

= 1.0.2 =
* Feature: add support for class attribute.

= 1.0.1 =
* Fix: remove font style definition which may conflict with the theme styles.

= 1.0.0 =
* Initial release
