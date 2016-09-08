<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="row dmbs-content">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div <?php post_class(); ?>>

            <h2 class="post-header"><?php the_title() ;?></h2>
            
            <div class="text"><?php the_content(); ?></div>


        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
        </div>



</div>
<!-- end content container -->

<?php get_template_part('template-part', 'sponsors'); ?>
<div class="row">
<?php get_template_part('template-part', 'clubs'); ?>
<?php get_template_part('template-part', 'partnership'); ?>
</div>
<?php get_footer(); ?>
