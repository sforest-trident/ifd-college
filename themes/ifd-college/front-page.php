<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
$page_title = get_post_meta(get_the_ID(), 'page_title', true);
$page_sub_title = get_post_meta(get_the_ID(), 'page_sub_title', true);
$page_button = get_post_meta(get_the_ID(), 'page_button', true);
?>

<div id="home-page-hero">
    <div class="home-page-top">
        <div class="hero-feature-image" style="background-image: url('<?php echo $featured_img_url; ?>');"></div>
    </div>

    <div id="page-top">
        <div id="page-title" style="max-width: 750px;">
            <?php echo !empty($page_title) ? '<h1>'.$page_title.'</h1>' : ''; ?>
            <?php echo !empty($page_sub_title) ? '<h2>'.esc_html($page_sub_title).'</h2>' : ''; ?>
            <?php echo !empty($page_shortcode) ? "<?php do_shortcode('$page_shortcode'); ?>" : ''; ?>
            <?php echo !empty($page_button) ? $page_button : ''; ?>
        </div>
    </div>

    <div class="container_mouse">
        <span class="mouse-btn">
            <span class="mouse-scroll"></span>
        </span>
        <span class="scroll-text">Scroll Down</span>
    </div>
</div>

<div id="content">
    <?php the_content(); ?>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>