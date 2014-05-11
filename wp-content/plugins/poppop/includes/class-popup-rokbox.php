<?php
/**
 * RokBox
 *
 * @link http://www.rockettheme.com/wordpress-downloads/plugins/free/2625-rokbox
 * @since 0.4
 */
class RokBox_PopPop_Script extends Popup_Script {

	public function supports_auto_fire() {
		return true;
	}

	function generate_code( $widget ) {
		return '<pre dir="ltr">'. _wp_specialchars( "<a href='#' rel='rokbox[450 350][module={$widget->id}]'>Open this popup</a>" ) .'</pre>';
	}

	function auto_fires( $popup = '', $closeCookie = false ) {
		if( $popup ) {
			echo '<script>window.addEvent("domready", function(){';
			echo "$('trigger-{$popup}').fireEvent('click');";
			if( $closeCookie )
				echo "
				var poppopRequest = new Request({
					url: '". admin_url( 'admin-ajax.php' ) ."',
					method: 'post',
					data: {
						action: 'poppop_save_cookie',
						widget: '{$popup}'
					},
					onSuccess: function(response) {}
				}).send();
				";
			echo '});</script>';
		}
	}

	function widget_chrome( $widget, $title = '', $id = '', $classname = '' ) {
		ob_start(); ?>
		<div id="<?php echo $id; ?>" class="<?php echo $classname ?>" style="display: none;">
			<?php if( $title ) : ?><h1><?php echo $title; ?></h1><?php endif; ?>
			<?php echo $widget; ?>
		</div>
		<a href="#" rel="rokbox[450 350][module=<?php echo $id; ?>]" id="trigger-<?php echo $id; ?>" style="display: none;"></a>
	<?php return ob_get_clean();
	}
}