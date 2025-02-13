<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head() ?>
</head>
<body>


<header class="header-widgets">
    <div class="header-widget-area">
        <?php if (is_active_sidebar('header-1')) : ?>
            <?php dynamic_sidebar('header-1'); ?>
        <?php endif; ?>
    </div>
</header>