<?php get_header() ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
$page_title= get_post_meta(get_the_ID(), 'page_title', true);
$page_sub_title= get_post_meta(get_the_ID(), 'page_sub_title', true);
?>

<div id="page-top">
    <div id="page-title">
        <h1><?php 
        if (!empty($page_title)) {
            echo $page_title;
        }
        ?></h1>
        <h2><?php
        if (!empty($page_sub_title)) {
            echo esc_html($page_sub_title);
        }
        ?></h2>

        <div id="search">
        <?php echo do_shortcode('[stm_courses_searchbox]'); ?>
        </div>
    
    </div>

    <div id="page-thumbnail" style="background:url('<?php echo $featured_img_url; ?>') no-repeat scroll right center / contain"></div>
</div>

<div id="content">
    <?php the_content(); ?>
</div>

<?php endwhile; ?> 
<?php get_footer() ?>