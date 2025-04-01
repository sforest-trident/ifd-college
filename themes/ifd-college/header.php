<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head() ?>
</head>
<body class="<?php echo (get_post_type($post).' '.$post->post_name); ?>">
<header class="header-widgets">
    <div class="<?php echo (is_front_page() ? 'home-header-widget-area' : 'header-widget-area'); ?>">
        <?php if (is_front_page()) : ?>
            <?php if (is_active_sidebar('header-home')) : ?>
                <?php dynamic_sidebar('header-home'); ?>
            <?php endif; ?>
        <?php else: ?>
            <?php if (is_active_sidebar('header-1')) : ?>
                <?php dynamic_sidebar('header-1'); ?>
            <?php endif; ?>
        <?php endif; ?>
    

        <?php 
        // Show User logged in / logged out menu as appt:
        if(!is_user_logged_in()){
            wp_nav_menu(array(
                'theme_location' => 'user-login'
            ));
        }else{
            wp_nav_menu(array(
                'theme_location' => 'user-menu'
            ));
            ?>
        <?php
        }
        
        ?>
    </div>
    <button class="menu-toggle"><i class="nav-icon icon__hamburger"></i></button>
</header>
