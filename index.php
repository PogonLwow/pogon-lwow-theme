 <?php get_header(); ?>

 <?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topbar'); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'pagination' => true,
    'posts_per_page' => '6',
    'paged' => $paged,
);
$posts = new WP_Query($args);
?>
<div class="container">
    <?php card($posts); ?>
    <button id="load_more_posts" class="btn btn--loadMore  btn--synergia">Zobacz starsze</div></button>
</div>

<?php
wp_reset_postdata();
?>

<?php get_footer(); ?>
