<?php get_header() ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
$page_img_url = get_the_post_thumbnail_url('16', 'full');
$page_title= get_post_meta('16', 'page_title', true);
$post_img_url = get_the_post_thumbnail_url($post->ID, 'full');
$post_title = get_the_title();
?>

<div id="page-top">
    <div id="page-title">
    <h1><?php 
    if (!empty($post_title)) {
        echo $post_title;
    }
    ?></h1>
    <h2><?php 
    if (!empty($page_title)) {
        echo $page_title;
    }
    ?></h2>
    </div>
    <div id="page-thumbnail" style="background:url('<?php echo $page_img_url; ?>') no-repeat scroll right center / contain">
    </div>
</div>

<div id="content" class="narrow-container p-1">
    <?php the_content(); ?>
</div>

<?php endwhile; ?> 

<?php get_footer() ?>