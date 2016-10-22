<?php get_header(); ?>

<?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topbar'); ?>

<!-- start content container -->
    <div class="container">
        <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="section section--main">
            <h1 class="single__title"><?php the_title(); ?></h1>
            <div class="single__content">
                            <?php the_content(); ?>

            </div>
            <?php wp_link_pages(); ?>
        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
        </div>
        <?php get_template_part('parts/sidebar'); ?>

    </div>
<!-- end content container -->
<?php get_template_part('parts/sponsors'); ?>

<?php get_footer(); ?>
