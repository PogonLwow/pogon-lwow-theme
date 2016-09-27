<?php/** * Template Name: Główna * */ ?>
<?php global $dm_settings; ?>


 <?php get_header(); ?>

 <?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topbar'); ?>




<div class="container">
    <?php get_template_part('parts/slideshow'); ?>
    <?php get_template_part('parts/sidebar'); ?>

</div>
<?php get_template_part('parts/sponsors'); ?>

<?php get_footer(); ?>
