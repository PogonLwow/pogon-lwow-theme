<?php /* Template Name: Główna */ ?>

 <?php get_header(); ?>

 <?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topbar'); ?>

<div class="container">
    <div class="section section--main">
        <?php get_template_part('parts/slideshow'); ?>
        <div class="featured">
            <?php get_template_part('parts/featured'); ?>
        </div>
    </div>
    <?php get_template_part('parts/sidebar'); ?>

</div>

<?php if (get_theme_mod('purpose') == 'club') { ?>\
<?php get_template_part('parts/sponsors'); ?>
<?php } ?>

<?php get_footer(); ?>
