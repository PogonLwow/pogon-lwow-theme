<?php/** * Template Name: Kontakt * */ ?>
<?php get_header(); ?>

<?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topbar'); ?>

<div id="primary" class="row">
		<div id="content" role="main">

			<?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h2 class="page-header"><?php the_title() ;?></h2>
            <?php echo do_shortcode('[vsgmap address="Lwów, ul. Kuchera 20/2" width="100%"]'); ?>

            <div class="text"><?php the_content(); ?></div>
            <?php wp_link_pages(); ?>
            <?php //comments_template(); ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<!--end of sfs-->
<?php get_template_part('template-part', 'sponsors'); ?>
<div class="row">
<?php get_template_part('template-part', 'clubs'); ?>
<?php get_template_part('template-part', 'partnership'); ?>
</div>
<?php get_footer(); ?>
