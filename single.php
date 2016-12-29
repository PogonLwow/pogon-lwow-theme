<?php get_header(); ?>

<?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topbar'); ?>

<div class="container single">
<?php // theloop
if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header class="single__header loading">
            <div class="single__bottom">
                <div class="single__meta">
                    <time class="single__time"><?php the_date(); ?></time>
                    <?php get_template_part('parts/share'); ?>

                </div>
            <h1 class="single__title"><?php the_title(); ?></h1>
            </div>

			<div class="single__overimage">
			<?php if (has_post_thumbnail()) {
    ?>
				<img class="single__img blazy"
				 	alt="<?php the_title(); ?>"
					src="<?php bloginfo('template_directory'); ?>/build/img/full.png"
					data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true)[0]; ?>"
					data-src-small="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'card_image', true)[0]; ?>"/>

			<?php
} else {
    ?>
				<img class="blazy"
					src="<?php bloginfo('template_directory'); ?>/build/img/full.png" data-src="<?php bloginfo('template_directory'); ?>/build/img/full.png"
					data-src-small="<?php bloginfo('template_directory'); ?>/build/img/card.png"/><?php
} ?>
			</div>
		</header>
        <section class="section single__content single__content--border-top">
            <?php the_content(); ?>
        </section>

		<?php wp_link_pages(); ?>
	<?php endwhile; ?>
<?php else: ?>

<?php get_404_template(); ?>

<?php endif; ?>

</div>

<?php get_footer(); ?>
