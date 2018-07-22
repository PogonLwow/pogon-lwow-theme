<?php /* Template Name: Pomoc */ ?>
<?php get_header(); ?>

<?php get_template_part('parts/head'); ?>

<?php get_template_part('parts/topbar'); ?>
<div id="primary" class="row">
		<div id="content" role="main">

			<?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="slideshow-container-audio">
    <audio id="player" src="<?php echo get_template_directory_uri(); ?>/audio/hymn.mp3"></audio>
    <a href="javascript:void(0)" class="player-btn" data-toggle="tooltip" title="Preview" onclick="aud_play_pause()"><i id="stateicon" class="icon-play"></i></a>
<div class="fadein">

    <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/img/pomoc/1.jpg">
        <figcaption>Mecz piłki nożnej Pogoń Lwów - Wisła Kraków w Warszawie o mistrzostwo Polski juniorów</figcaption>
    </figure>
    <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/img/pomoc/2.jpg">
        <figcaption>Reaktywacja Pogoni Lwów 10.10.2009</figcaption>
    </figure>
    <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/img/pomoc/3.jpg">
        <figcaption>Bramkarz Pogoni Spirydion Albański (z lewej) w starciu z napastnikiem Wisły.</figcaption>
    </figure>
    <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/img/pomoc/4.jpg">
        <figcaption>Mecz piłki nożnej Pogoń Lwów - Cracovia Kraków w Krakowie.</figcaption>
    </figure>
    <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/img/pomoc/5.jpg">
        <figcaption>Drużyny Pogoni Lwów i BEAC (Budapesti Athletikai Club) po meczu 12 maja 1913.</figcaption>
    </figure>
</div>
</div>

            <div class="text"><?php the_content(); ?></div>
            <?php wp_link_pages(); ?>
            <?php //comments_template(); ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<script>
      jQuery(function () {
            jQuery('.fadein figure').hide(); // hide all slides
                  jQuery('.fadein figure:first-child').show(); // show first slide
                  setInterval(function () {
                        jQuery('.fadein figure:first-child').fadeOut(500)
                              .next('figure').fadeIn(1000)
                              .end().appendTo('.fadein');
                  },
            7000); // slide duration
      });

    function aud_play_pause() {
        var myAudio = document.getElementById("player");
        if (myAudio.paused) {
            jQuery('#stateicon').removeClass('icon-play');
            jQuery('#stateicon').addClass('icon-pause');
            myAudio.play();
        } else {
            jQuery('#stateicon').removeClass('icon-pause');
            jQuery('#stateicon').addClass('icon-play');
            myAudio.pause();
        }
    }
</script>

<?php get_template_part('template-part', 'sponsors'); ?>
<div class="row">
<?php get_template_part('template-part', 'clubs'); ?>
<?php get_template_part('template-part', 'partnership'); ?>
</div>
<?php get_footer(); ?>
