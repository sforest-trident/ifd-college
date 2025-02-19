<?php get_header() ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
$page_title= get_post_meta(get_the_ID(), 'page_title', true);
$page_sub_title= get_post_meta(get_the_ID(), 'page_sub_title', true);
$page_shortcode= get_post_meta(get_the_ID(), 'page_shortcode', true);
?>

<div id="page-top">
    <div id="page-title">
            <?php echo !empty($page_title) ? '<h1>'.$page_title.'</h1>' : ''; ?>
            <?php echo !empty($page_sub_title) ? '<h2>'.esc_html($page_sub_title).'</h2>' : ''; ?>
            <?php echo !empty($page_shortcode) ? do_shortcode($page_shortcode) : ''; ?>
            <?php echo !empty($page_button) ? $page_button : ''; ?>
    </div>
    <div id="page-thumbnail"><img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>" class="page-thumbnail" /></div>
</div>

<div id="content">
    <?php the_content(); ?>
</div>

<?php endwhile; ?> 
<?php get_footer() ?>