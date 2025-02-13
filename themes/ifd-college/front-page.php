<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
$page_title = get_post_meta(get_the_ID(), 'page_title', true);
$page_sub_title = get_post_meta(get_the_ID(), 'page_sub_title', true);
?>

<div id="home-page-top">
    <div style="background:url('<?php echo $featured_img_url; ?>') no-repeat scroll center right / contain; height: 140vh; margin-top: -80px; z-index: 9999; position: relative; margin-right: 11vw;"></div>
</div>

<div id="page-top" style="margin-top: -150vh; width: 50vw;";>
    <div id="page-title" style="z-index: 9999;">
        <h1><?php echo !empty($page_title) ? $page_title : ''; ?></h1>
        <h2><?php echo !empty($page_sub_title) ? esc_html($page_sub_title) : ''; ?></h2>
    </div>
</div>

<div id="content">
    <?php the_content(); ?>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>