<?php get_header() ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
$page_img_url = get_the_post_thumbnail_url('16', 'full');
$page_title= get_post_meta('16', 'page_title', true);
$post_img_url = get_the_post_thumbnail_url($post->ID, 'full');
$post_title = get_the_title();
?>

<div id="content" class="narrow-container p-1">
    <?php the_content(); ?>
</div>

<?php endwhile; ?> 

<?php get_footer() ?>