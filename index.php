 <?php get_header(); ?>

 <?php get_template_part('parts/head'); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="row dmbs-content">

<?php if (!is_single()): ?>
    <div class="col-md-10 dmbs-main">
<?php
endif;
                get_template_part('content');
?>

   </div>

   <?php //get the right sidebar
    if (!is_single()):
        get_sidebar('right');
    endif; ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>
