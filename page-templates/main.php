<?php/** * Template Name: Główna * */ ?>
<?php global $dm_settings; ?>


 <?php get_header(); ?>

 <?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topnav'); ?>




<div class="container">
    <?php if ( function_exists( 'wpsp_Slideshow' ) ) { wpsp_Slideshow('1,0,1,0'); } ?>
    <?php echo do_shortcode('[wpscp]'); ?>
    <?php get_template_part('parts/sidebar'); ?>

</div>
<?php get_template_part('parts/sponsors'); ?>

<?php get_footer(); ?>
