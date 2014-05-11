<?php
/**
 * Base class for popup scripts
 * Still in beta and may change, please do not use it in production mode.
 *
 * @since 0.4
 */
class Popup_Script {

	public function __construct() {
	}

	/**
	 * If this popup script is enabled for the user to choose
	 */
	public function is_enabled() {
		return true;
	}

	public function supports_auto_fire() {
		return false;
	}

	public function enqueue() {
	}

	public function auto_fire( $autofires, $shy_ones ) {
	}

	public function generate_code( $widget ) {
	}

	public function widget_chrome( $widget, $title, $id, $classname ) {
		return $widget;
	}
}