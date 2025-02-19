<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
$page_title = get_post_meta(get_the_ID(), 'page_title', true);
$page_sub_title = get_post_meta(get_the_ID(), 'page_sub_title', true);
$page_button = get_post_meta(get_the_ID(), 'page_button', true);
?>

<div class="page-hero">
    <div id="home-page-top">
        <div class="hero-feature-image" style="background-image: url('<?php echo $featured_img_url; ?>');"></div>
    </div>

    <div id="page-top">
        <div id="page-title">
            <?php echo !empty($page_title) ? '<h1>'.$page_title.'</h1>' : ''; ?>
            <?php echo !empty($page_sub_title) ? '<h2>'.esc_html($page_sub_title).'</h2>' : ''; ?>
            <?php echo !empty($page_shortcode) ? "<?php do_shortcode('$page_shortcode'); ?>" : ''; ?>
            <?php echo !empty($page_button) ? $page_button : ''; ?>
        </div>
    </div>
</div>

<div id="content">
    <?php the_content(); ?>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>