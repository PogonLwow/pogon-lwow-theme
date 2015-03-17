<?php/** * Template Name: Główna * */ ?>
<?php global $dm_settings; ?>


 <?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>
<div class="wsp row"><a href="<?php echo $dm_settings['join'] ?>">Jak wesprzeć Pogoń Lwów ?</a></div>

<div class="row">
<!--slideshow, featured and sidebar -->
    <div class="col-md-10 dmbs-main">
<?php if ( function_exists( 'wpsp_Slideshow' ) ) { wpsp_Slideshow('1,0,1,0'); } ?>
<?php echo do_shortcode('[wpscp]'); ?>	
    </div>

   <?php //get the right sidebar ?>
   <?php get_sidebar( 'right' ); ?>
</div>
<!--end of sfs-->
<?php get_template_part('template-part', 'sponsors'); ?>
<div class="row">
<?php get_template_part('template-part', 'clubs'); ?>
<?php get_template_part('template-part', 'partnership'); ?>
</div>
<?php get_footer(); ?>
