<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="row dmbs-content">


    <div class="col-md-10 dmbs-main">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h2 class="page-header"><?php the_title() ;?></h2>
            <div class="text"><?php the_content(); ?></div>
            <?php wp_link_pages(); ?>
            <?php //comments_template(); ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

    </div>

    <?php //get the right sidebar ?>
    <?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_template_part('template-part', 'sponsors'); ?>
<div class="row">
<?php get_template_part('template-part', 'clubs'); ?>
<?php get_template_part('template-part', 'partnership'); ?>
</div>
<?php get_footer(); ?>
