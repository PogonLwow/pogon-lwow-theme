<?php /* Template Name: Kontakt */ ?>
<?php get_header(); ?>

<?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topbar'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="container single">
		<section class="map" id="pgn-google-map"
		data-lat="<?php echo get_theme_mod('latitude') ?>"
		data-lon="<?php echo get_theme_mod('longtitude') ?>">
		<div class="map__container" id="pgn-map"></div>
		<button class="map__zoomIn btn btn--golden" id="pgn-zoom-in"><i class="icon-plus "></i></button>
		<button class="map__zoomOut btn btn--golden" id="pgn-zoom-out"><i class="icon-minus"></i></button>
		</section>
		<section class="single__content single__content--border-top section">
		<?php the_content(); ?>
		</section>

            <?php wp_link_pages(); ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
	</div>

<?php get_template_part('parts/sponsors'); ?>

<?php get_footer(); ?>
