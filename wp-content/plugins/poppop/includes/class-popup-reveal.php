<?php
/**
 * jQuery Reveal
 *
 * @link http://www.zurb.com/playground/reveal-modal-plugin
 */
class Reveal_PopPop_Script extends Popup_Script {

	public function supports_auto_fire() {
		return true;
	}

	/**
	 * Queue script and styles required
	 *
	 */
	function enqueue() {
		global $poppop;

		wp_enqueue_script( 'PopPop', $poppop->url . 'scripts/reveal/jquery-reveal.js', array( 'jquery' ), '0.4', true );
		wp_enqueue_style( 'PopPop', $poppop->url . 'scripts/reveal/reveal.css', array(), '0.4' );
	}

	function generate_code( $widget ) {
		return '<pre dir="ltr">'. _wp_specialchars( "<a href='#' data-reveal-id='{$widget->id}'>Open this popup</a>" ) .'</pre>';
	}

	function auto_fires( $popup = '', $closeCookie = false ) {
		if( $popup ) {
			echo '<script>jQuery(function($){';
			echo "$('#{$popup}').reveal({closeCallback: function(){";
			if( $closeCookie )
				echo"
				$.ajax({
					type: 'POST',
					url: '". admin_url( 'admin-ajax.php' ) ."',
					data: {
						action: 'poppop_save_cookie',
						widget: '{$popup}'
					},
					success: function(data){}
				})";
			echo "}});"; // end reveal call
			echo '});</script>';
		}
	}

	function widget_chrome( $widget, $title = '', $id = '', $classname = '' ) {
		ob_start(); ?>
		<div id="<?php echo $id; ?>" class="reveal-modal <?php echo $classname ?>">
			<?php if( $title ) : ?><h1><?php echo $title; ?></h1><?php endif; ?>
			<?php echo $widget; ?>
			<a class="close-reveal-modal">&#215;</a>
		</div>
	<?php return ob_get_clean();
	}
}