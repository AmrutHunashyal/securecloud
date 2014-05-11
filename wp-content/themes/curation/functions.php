<?php
add_action('after_setup_theme', 'curation_setup');
function curation_setup(){
load_theme_textdomain('curation', get_template_directory() . '/languages');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'curation' ) )
);
}
require_once (get_template_directory() . '/setup/options.php');
add_action('wp_enqueue_scripts','curation_load_scripts');
function curation_load_scripts()
{
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-masonry');
wp_register_script('curation-videos', get_template_directory_uri().'/scripts/videos.js');
wp_enqueue_script('curation-videos');
}
function curation_enqueue_admin_scripts()
{
global $curation_theme_page;
if ( $curation_theme_page != get_current_screen()->id ) { return; }
wp_enqueue_script('curation-admin-color', get_template_directory_uri().'/scripts/color-picker/color.js');
}
add_action('wp_enqueue_scripts','curation_load_styles');
function curation_load_styles()
{
$options = get_option('curation_options');
}
add_action('wp_head', 'curation_print_custom_styles');
function curation_print_custom_styles()
{
if(!is_admin()){
$options = get_option('curation_options');
if ( false != $options['colorscheme']) { 
$custom_css = '<style type="text/css">';
$custom_css .= 'a, h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, code, nav .current-menu-item a, nav .current_page_item a, #wrapper nav #s{';
if ( '' != $options['colorscheme'] ) { $custom_css .= 'color:#'.sanitize_text_field($options['colorscheme']).''; }
$custom_css .= '}';
$custom_css .= 'body, nav, #content input[type="submit"], #content input[type="reset"], #container #searchsubmit, .button, #wrapper nav #s, nav li ul a{';
if ( '' != $options['colorscheme'] ) { $custom_css .= 'background-color:#'.sanitize_text_field($options['colorscheme']).''; }
$custom_css .= '}';
$custom_css .= 'blockquote, input, textarea, #content input[type="submit"], #content input[type="reset"], #container #searchsubmit, .button, nav ul li a, nav ul li:hover ul li a, nav ul ul li:hover ul li a, nav ul ul ul li:hover ul li a{';
if ( '' != $options['colorscheme'] ) { $custom_css .= 'border-color:#'.sanitize_text_field($options['colorscheme']).''; }
$custom_css .= '}';
$custom_css .= '</style>';
echo $custom_css; }
}
}
add_action('wp_head', 'curation_print_custom_scripts', 99);
function curation_print_custom_scripts()
{
if(!is_admin()){
$options = get_option('curation_options');
?>
<script type="text/javascript">
jQuery(document).ready(function($){
$("#wrapper").vids();
});
jQuery(document).ready(function($){
$('#content-blog').masonry({columnWidth:323});
});
</script>
<?php
}
}
add_action('comment_form_before', 'curation_enqueue_comment_reply_script');
function curation_enqueue_comment_reply_script()
{
if(get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'curation_title');
function curation_title($title) {
if ($title == '') {
return 'Untitled';
} else {
return $title;
}
}
add_filter('wp_title', 'curation_filter_wp_title');
function curation_filter_wp_title($title)
{
return $title . esc_attr(get_bloginfo('name'));
}
add_filter('comment_form_defaults', 'curation_comment_form_defaults');
function curation_comment_form_defaults( $args )
{
$req = get_option( 'require_name_email' );
$required_text = sprintf( ' ' . __('Required fields are marked %s', 'curation'), '<span class="required">*</span>' );
$args['comment_notes_before'] = '<p class="comment-notes">' . __('Your email is kept private.', 'curation') . ( $req ? $required_text : '' ) . '</p>';
$args['title_reply'] = __('Post a Comment', 'curation');
$args['title_reply_to'] = __('Post a Reply to %s', 'curation');
return $args;
}
add_action( 'init', 'curation_add_shortcodes' );
function curation_add_shortcodes() {
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
add_filter('img_caption_shortcode', 'curation_img_caption_shortcode_filter',10,3);
add_filter('widget_text', 'do_shortcode');
}
function curation_img_caption_shortcode_filter($val, $attr, $content = null)
{
extract(shortcode_atts(array(
'id'	=> '',
'align'	=> '',
'width'	=> '',
'caption' => ''
), $attr));
if ( 1 > (int) $width || empty($caption) )
return $val;
$capid = '';
if ( $id ) {
$id = esc_attr($id);
$capid = 'id="figcaption_'. $id . '" ';
$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
}
return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
. (10 + (int) $width) . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid 
. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
add_action( 'widgets_init', 'curation_widgets_init' );
function curation_widgets_init() {
register_sidebar( array (
'name' => __('Sidebar Widget Area', 'curation'),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
$preset_widgets = array (
'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
);
function curation_get_page_number() {
if (get_query_var('paged')) {
print ' | ' . __( 'Page ' , 'curation') . get_query_var('paged');
}
}
function curation_catz($glue) {
$current_cat = single_cat_title( '', false );
$separator = "\n";
$cats = explode( $separator, get_the_category_list($separator) );
foreach ( $cats as $i => $str ) {
if ( strstr( $str, ">$current_cat<" ) ) {
unset($cats[$i]);
break;
}
}
if ( empty($cats) )
return false;
return trim(join( $glue, $cats ));
}
function curation_tag_it($glue) {
$current_tag = single_tag_title( '', '',  false );
$separator = "\n";
$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
foreach ( $tags as $i => $str ) {
if ( strstr( $str, ">$current_tag<" ) ) {
unset($tags[$i]);
break;
}
}
if ( empty($tags) )
return false;
return trim(join( $glue, $tags ));
}
function curation_commenter_link() {
$commenter = get_comment_author_link();
if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
$commenter = preg_replace( '/(<a[^>]* class=[\'"]?)/', '\\1url ' , $commenter );
} else {
$commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
}
$avatar_email = get_comment_author_email();
$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}
function curation_custom_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author vcard"><?php curation_commenter_link() ?></div>
<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s', 'curation' ), get_comment_date(), get_comment_time() ); ?><span class="meta-sep"> | </span> <a href="#comment-<?php echo get_comment_ID(); ?>" title="<?php _e('Permalink to this comment', 'curation' ); ?>"><?php _e('Permalink', 'curation' ); ?></a>
<?php edit_comment_link(__('Edit', 'curation'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your comment is awaiting moderation.', 'curation'); echo '</span>\n'; } ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php
if($args['type'] == 'all' || get_comment_type() == 'comment') :
comment_reply_link(array_merge($args, array(
'reply_text' => __('Reply','curation'),
'login_text' => __('Login to reply.', 'curation'),
'depth' => $depth,
'before' => '<div class="comment-reply-link">',
'after' => '</div>'
)));
endif;
?>
<?php }
function curation_custom_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'curation'),
get_comment_author_link(),
get_comment_date(),
get_comment_time() );
edit_comment_link(__('Edit', 'curation'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your trackback is awaiting moderation.', 'curation'); echo '</span>\n'; } ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php }