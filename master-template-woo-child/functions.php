<?php

function enqueue_styles_child_theme() {

	$parent_style = 'master-template-woo-style';
	$child_style  = 'master-template-woo-child-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( $child_style, get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version'));
	wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', '1.0' );
	wp_enqueue_style( 'slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', '1.0' );
	wp_enqueue_style( 'custom-style-css', get_stylesheet_directory_uri() . '/assets/css/custom-style.css', '1.0' );
	wp_enqueue_script( 'custom-child-js', get_stylesheet_directory_uri() . '/assets/js/custom-child.js', array('jquery', 'slick-js'), '1.0', true);
	wp_enqueue_script( 'slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.0', true);
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles_child_theme' );

add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_product_category() || is_category()) {
        $title = single_cat_title( '', false );
    }

    return $title;

});

require "inc/helpers.php";
require "inc/shortcodes/sc-post-wp.php";
require "inc/shortcodes/sc-cats-slider.php";
