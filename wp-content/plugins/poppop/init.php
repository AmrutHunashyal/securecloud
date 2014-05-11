<?php
/*
Plugin Name:    PopPop!
Description:    Easily display your desired widgets inside popups.
Author:         Hassan Derakhshandeh
Version:        0.4
Author URI:     http://tween.ir/


		This program is free software; you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation; either version 2 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program; if not, write to the Free Software
		Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class PopPop {

	var $url,
		$script_instance;

	function __construct() {
		if( is_admin() ) {
			add_action( 'in_widget_form', array( &$this, 'widget_popup_code' ), 10, 3 );
			add_action( 'admin_init', array( &$this, 'init_popup_script' ) );
			add_action( 'widgets_init', array( &$this, 'widgets_init' ), 100 );
		} else {
			add_action( 'template_redirect', array( &$this, 'queue' ) );
			add_action( 'wp_footer', array( &$this, 'display' ), 100 );
			add_action( 'init', array( &$this, 'init_popup_script' ) );
			add_action( 'widgets_init', array( &$this, 'widgets_init' ), 100 );
		}

		$this->url = trailingslashit( plugins_url( '', __FILE__ ) );
		require( dirname( __FILE__ ) . '/includes/class-popup-script.php' );
	}

	/**
	 * Loads PopPop_Script classes
	 *
	 * @since 0.4
	 */
	function init_popup_script() {
		$_script = defined( 'POPPOP_SCRIPT' ) ? POPPOP_SCRIPT : 'Reveal_PopPop_Script';

		// load bundled popup scripts
		foreach( array( 'reveal', 'rokbox' ) as $script ) {
			include trailingslashit( dirname( __FILE__ ) ) . "includes/class-popup-{$script}.php";
		}

		if( class_exists( $_script ) ) {
			$this->script_instance = new $_script();
			if( $this->script_instance->supports_auto_fire() ) {
				if( is_admin() ) {
					add_action( 'in_widget_form', array( &$this, 'widget_popup_autofire_option' ), 10, 3 );
					add_filter( 'widget_update_callback', array( &$this, 'widget_update_callback' ), 10, 3 );
					add_action( 'wp_ajax_poppop_save_cookie', array( &$this, 'save_cookie' ) );
					add_action( 'wp_ajax_nopriv_poppop_save_cookie', array( &$this, 'save_cookie' ) );
				}
			}
		}
	}

	function widgets_init() {
		register_sidebar( array(
			'name'			=> 'Popup',
			'id'			=> 'popup',
			'before_widget'	=> '',
			'after_widget'	=> '',
			'before_title'	=> '<!-- before_title -->',
			'after_title'	=> '<!-- after_title -->'
		) );
	}

	function queue() {
		if( is_active_sidebar( 'popup' ) ) {
			$this->script_instance->enqueue();
		}
	}

	/**
	 * Render the popup widgets in the footer and find if one should be fired on page load
	 *
	 */
	function display() {
		$widgets = wp_get_sidebars_widgets();
		$autofire = '';
		$closeCookie = false; /* these are the popups that should hide after first visit */
		$options = get_option( 'poppop', array() );

		// render the popup area
		$this->render_popup_position();

		// determine if any widget has to be fired on page load
		if( ! empty( $widgets['popup'] ) ) : foreach( $widgets['popup'] as $popup ) :
			if( isset( $options[$popup] ) && 1 == $options[$popup]['autofire'] ) {
				if( ! isset( $options[$popup]['cookie'] ) ) {
					$autofire = $popup;
					break;
				} elseif( isset( $options[$popup]['cookie'] ) && $options[$popup]['expire'] > 1 && isset( $_COOKIE["poppop-$popup"] ) ) {}
				elseif( isset( $options[$popup]['cookie'] ) && $options[$popup]['expire'] > 1 && ! isset( $_COOKIE["poppop-$popup"] ) ) {
					$autofire = $popup;
					$closeCookie = true;
					break;
				}
			}
		endforeach; endif;

		// So? Any widgets? Anyone?
		echo $this->script_instance->auto_fires( $autofire, $closeCookie );
	}

	/**
	 * Shows the code required to launch the popup in front end
	 *
	 * @since 0.1
	 * @return void
	 */
	function widget_popup_autofire_option( $widget, $return, $instance ) {
		$widgets = wp_get_sidebars_widgets();
		// if the widget is in Popup position show the options
		if( isset( $widgets['popup'] ) && in_array( $widget->id, $widgets['popup'] ) ) {
			$defaults = array( 'autofire' => 0, 'cookie' => 0, 'expire' => 10 );
			$options = get_option( 'poppop', array() );
			if( ! isset( $options[$widget->id] ) )
				$options[$widget->id] = array();
			$options = array_merge( $defaults, $options[$widget->id] );

			?><p><label><input type="checkbox" value="1" name="<?php echo $widget->get_field_name( 'autofire' ) ?>" <?php checked( $options['autofire'], 1 ) ?> /> Auto fire on page load?</p>

			<p><label><input type="checkbox" value="1" name="<?php echo $widget->get_field_name( 'cookie' ) ?>" <?php checked( $options['cookie'], 1 ) ?> /> Unless user has seen it in the last <input type="text" name="<?php echo $widget->get_field_name( 'expire' ) ?>" value="<?php echo $options['expire'] ?>" size="3" /> days.</label></p>

			<?php // send widget->id along so we can save it ?>
			<input type="hidden" name="<?php echo $widget->get_field_name( 'widget_id' ) ?>" value="<?php echo $widget->id ?>" />
		<?php }
	}

	function widget_popup_code( $widget, $return, $instance ) {
		echo $this->script_instance->generate_code( $widget );
	}

	/**
	 * Saves the auto-fire option for widget
	 *
	 * @since 0.2
	 * @return array $instance
	 */
	function widget_update_callback( $instance, $new_instance, $old_instance ) {
		if( $_POST['sidebar'] == 'popup' ) {
			$id = $new_instance['widget_id'];
			$options = get_option( 'poppop', array() );
			$options[$id] = array(
				'autofire' => $new_instance['autofire'],
				'cookie' => $new_instance['cookie'],
				'expire' => $new_instance['expire']
			);
			update_option( 'poppop', $options );
		}
		return $instance;
	}

	function save_cookie() {
		if( isset( $_POST['widget'] ) ) {
			$id = $_POST['widget'];
			$options = get_option( 'poppop', array() );
			$days = intval( $options[$id]['expire'] );
			setcookie( "poppop-$id", 1, time()+3600*24*$days, COOKIEPATH, COOKIE_DOMAIN, false);
		}
		die();
	}

	/**
	 * Renders the popup widget position using the widget chrome specified by the popup script
	 *
	 * @return string
	 * @since 0.4
	 */
	public function render_popup_position() {
		global $wp_registered_sidebars, $wp_registered_widgets;

		$index = 'popup';

		$sidebars_widgets = wp_get_sidebars_widgets();
		if ( empty( $sidebars_widgets ) )
			return false;

		if ( empty($wp_registered_sidebars[$index]) || !array_key_exists($index, $sidebars_widgets) || !is_array($sidebars_widgets[$index]) || empty($sidebars_widgets[$index]) )
			return false;

		$sidebar = $wp_registered_sidebars[$index];

		$widgets = array();
		foreach ( (array) $sidebars_widgets[$index] as $id ) {

			if ( !isset($wp_registered_widgets[$id]) ) continue;

			$params = array_merge(
				array( array_merge( $sidebar, array('widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name']) ) ),
				(array) $wp_registered_widgets[$id]['params']
			);

			// Substitute HTML id and class attributes into before_widget
			$classname_ = '';
			foreach ( (array) $wp_registered_widgets[$id]['classname'] as $cn ) {
				if ( is_string($cn) )
					$classname_ .= '_' . $cn;
				elseif ( is_object($cn) )
					$classname_ .= '_' . get_class($cn);
			}
			$classname_ = ltrim($classname_, '_');
			$widget_number = $params[1]['number'];
			$id_base = _get_widget_id_base( $id );
			$options = get_option( "widget_{$id_base}", array() );
			extract( $options[$widget_number] );

			$callback = $wp_registered_widgets[$id]['callback'];

			ob_start();
			if( is_callable( $callback ) ) {
				call_user_func_array( $callback, $params );
			}
			$widget = ob_get_clean();

			/* substitute the widget title */
			$widget = preg_replace( '#<!-- before_title -->(.*)?<!-- after_title -->#', '', $widget );

			$widgets[] = $this->script_instance->widget_chrome( $widget, $title, $id, $classname_ );
		}
		echo implode( '', $widgets );
	}
}
$poppop = new PopPop;