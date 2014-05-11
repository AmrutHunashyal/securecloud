<?php $options = get_option('curation_options'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header>
<div id="branding">
<div id="site-title">
<?php
if (!is_singular()) {echo '<h1>';}
echo '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr(get_bloginfo('name')).'" rel="home">';
if ( get_header_image() ) {
echo '<img src="'.get_header_image().'" alt="'.esc_attr(get_bloginfo('name')).'" />';
} else {
bloginfo( 'name' );
}
echo '</a>';
if (!is_singular()) {echo '</h1>';}
?>
</div>
<p id="site-description"><?php bloginfo( 'description' ) ?></p>
</div>
<nav>
<?php get_search_form(); ?>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
<script type="text/javascript">jQuery("ul").parent("li").addClass("parent");</script>
</nav>
</header>
<div id="container">