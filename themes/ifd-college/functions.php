<?php

function ifd_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'ifd_setup');

function register_my_menus() {
    register_nav_menus(
        array(
			'home-header' => __('Home Menu'),
            'header' => __('Header Menu'),
            'footer' => __('Footer Menu'),
            'user-login' => __('Log In Menu'),
            'user-menu' => __('User Menu')

        )
    );
}
add_action('init', 'register_my_menus');

function my_widgets_init() {
	register_sidebar(array(
        'name' => 'Home Page Header',
        'id' => 'header-home',
        'before_widget' => '<div class="header-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="header-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Header Widget 1',
        'id' => 'header-1',
        'before_widget' => '<div class="header-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="header-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Widget 1',
        'id' => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Widget 2',
        'id' => 'footer-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Widget 3',
        'id' => 'footer-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'my_widgets_init');

function my_theme_enqueue_assets() {
    wp_enqueue_style('ifd-college-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));
    wp_enqueue_script('ifd-college-script', get_template_directory_uri() . '/scripts.js', array('jquery'), filemtime(get_template_directory() . '/scripts.js'), true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');

// Adds support for editor color palette.
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'IFD Green', 'ifd-college-style' ),
		'slug'  => 'ifd-green',
		'color'	=> '#50991F',
	),
	array(
		'name'  => __( 'Bright Green', 'ifd-college-style' ),
		'slug'  => 'bright-green',
		'color' => '#6CC135',
	),
	array(
		'name'  => __( 'Dark Green', 'ifd-college-style' ),
		'slug'  => 'dark-green',
		'color' => '#1D3E07',
    ),
	array(
		'name'  => __( 'Dark Grey', 'ifd-college-style' ),
		'slug'  => 'dark-grey',
		'color' => '#54595F',
    ),
	array(
		'name'  => __( 'IFD Black', 'ifd-college-style' ),
		'slug'  => 'ifd-black',
		'color' => '#000000',
    ),
	array(
		'name'  => __( 'IFD White', 'ifd-college-style' ),
		'slug'  => 'ifd-white',
		'color' => '#ffffff',
    ),
) );

function shortcode_user_profile_image_original( $atts ) {
    // Parse shortcode attributes
    $atts = shortcode_atts( array(
        'user_id' => get_current_user_id(), // fallback to current user
        'meta_key' => 'profile_image', // change this if your meta key is different
    ), $atts );

    // Get the attachment ID from user meta
    $attachment_id = get_user_meta( $atts['user_id'], $atts['meta_key'], true );

    if ( ! $attachment_id ) {
        return ''; // Exit if no attachment found
    }

    // Get the original image URL (full size)
    $image_url = wp_get_attachment_image_url( $attachment_id, 'full' );

    if ( ! $image_url ) {
        return '';
    }

    // Return the image tag
    return '<img src="' . esc_url( $image_url ) . '" alt="User Profile Image" />';
}
add_shortcode( 'user_profile_image_original', 'shortcode_user_profile_image_original' );