<?php

function ifd_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'ifd_setup');

function register_my_menus() {
    register_nav_menus(
        array(
            'header' => __('Header Menu'),
            'footer' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_my_menus');

function my_widgets_init() {
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
    // Enqueue Stylesheet
    wp_enqueue_style('ifd-college-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));

    // Enqueue JavaScript
    wp_enqueue_script('ifd-college-script', get_template_directory_uri() . '/scripts.js', array('jquery'), filemtime(get_template_directory() . '/scripts.js'), true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');
