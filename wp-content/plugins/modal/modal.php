<?php
/*
Plugin Name: Modal
Plugin URI: http://www.insideout.io
Description: A modal plug-in to embed the sign-up form in your blog.
Version: 1.0.7
Author: David Riccitelli
Author URI: http://www.insideout.io
License: GPL2
*/

function modal_shortcode( $atts, $content = '' ) {
    modal_enqueue_scripts();

    $label       = $content;
    $class       = ( isset( $atts['class'] )
        ? esc_attr( $atts['class'] )
        : '' );
    $content_sel = ( isset( $atts['content_selector'] )
        ? esc_attr( $atts['content_selector'] )
        : 'div.entry-content' );
    $title_sel   = ( isset( $atts['title_selector'] )
        ? esc_attr( $atts['title_selector'] )
        : 'h1.entry-title' );
    $width       = ( isset( $atts['width'] )  && is_numeric( $atts['width'] )
        ? $atts['width']
        : 1000 );
    $height      = ( isset( $atts['height'] ) && is_numeric( $atts['height'] )
        ? $atts['height']
        : 370 );
    $load_scripts = ( isset( $atts['load_scripts'] )
        ? ( $atts['load_scripts'] !== 'no' ? 'true' : 'false' ) 
        : 'true' );

    $slug        = $atts['slug'];
    $post        = modal_get_post_by_slug( $slug );
    if (null === $post) {
        $post    = modal_get_page_by_slug( $slug );
    } 

    $url         = esc_html( get_permalink( $post ) );
    $link        = "\"scmodal('$url', '$content_sel', '$title_sel', $width, $height, $load_scripts)\"";

    return "<a class='$class' onclick=$link href='javascript:void(0);'>$label</a>";

}

function modal_get_post_by_slug( $slug ) {
    $query = new WP_Query( "name=$slug" );

    return ( 
        $query->found_posts > 0
        ? $query->posts[0]
        : null
    );
}

function modal_get_page_by_slug( $slug ) {
    $query = new WP_Query( "pagename=$slug" );

    return (
        $query->found_posts > 0
        ? $query->posts[0]
        : null
    );
}

function modal_enqueue_scripts() {

    wp_enqueue_script( 'modal-js',
        plugins_url( '/js/modal.js' , __FILE__ ),
        array( 'jquery', 'jquery-ui-core', 'jquery-ui-dialog' )
    );

    wp_enqueue_style( 'modal',
        plugins_url( '/css/jquery-ui-1.9.2.custom.css' , __FILE__ )
    );
}

// add_action( 'wp_enqueue_scripts', 'modal_enqueue_scripts' );
add_shortcode( 'modal' ,          'modal_shortcode' );
?>
