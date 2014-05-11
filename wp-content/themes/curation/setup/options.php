<?php
function curation_get_option_defaults() {
$defaults = array(
'colorscheme' => '',
);
return $defaults;
}
add_action( 'admin_init', 'curation_options_init' );
function curation_options_init(){
register_setting( 'curation_options', 'curation_options', 'curation_options_validate' );
}
add_action( 'admin_menu', 'curation_options_add_page' );
function curation_options_add_page() {
global $curation_theme_page;
$curation_theme_page = add_theme_page( __( 'Theme Color', 'curation' ), __( 'Theme Color', 'curation' ), 'edit_theme_options', 'theme_options', 'curation_options_do_page' );
add_action( 'admin_print_scripts-' . $curation_theme_page, 'curation_enqueue_admin_scripts' );
}
function curation_options_do_page() {
global $select_options;
$options = wp_parse_args( get_option( 'curation_options', array() ), curation_get_option_defaults() );
if ( ! isset( $_REQUEST['settings-updated'] ) )
$_REQUEST['settings-updated'] = false;
?>
<div class="wrap">
<?php global $curation_theme_page; ?>
<?php $current_theme = wp_get_theme(); ?>
<?php screen_icon(); echo "<h2>" . sprintf( __( 'Theme Color', 'curation' )) . "</h2>"; ?>
<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
<div class="updated fade"><p><strong><?php _e( 'Theme Color Saved', 'curation' ); ?></strong></p></div>
<?php endif; ?>
<form method="post" action="options.php">
<?php settings_fields( 'curation_options' ); ?>
<p>
<?php
?>
<?php _e( 'Set Color:', 'curation' ); ?><br /><small><em>(<?php printf( __( 'do not add #', 'curation' ) ); ?>)</em></small>
<input id="curation_options[colorscheme]" class="small-text color {required:false}" type="number" name="curation_options[colorscheme]" value="<?php echo esc_attr( $options['colorscheme'] ); ?>" />
</p>
<p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save', 'curation' ); ?>" /></p>
</form>
</div>
<?php
?>
<?php
}
function curation_options_validate( $input ) {
$valid_input = wp_parse_args( get_option( 'curation_options', array() ), curation_get_option_defaults() );
if ( ! isset( $input['colorscheme'] ) || '' == $input['colorscheme'] ) {
$valid_input['colorscheme'] = '';
} else {
$input['colorscheme'] = ltrim( trim( $input['colorscheme' ] ), '#' );
$input['colorscheme'] = ( 6 == strlen( $input['colorscheme'] ) || 3 == strlen( $input['colorscheme'] ) ? $input['colorscheme'] : false );
$valid_input['colorscheme'] = ( ctype_xdigit( $input['colorscheme'] ) ? $input['colorscheme'] : $valid_input['colorscheme'] );
}
return $valid_input;
}