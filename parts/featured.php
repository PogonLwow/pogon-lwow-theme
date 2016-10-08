<?php
// Wyświetla logotypy zawarte w linki naszych sponsorów i partnerów //

// Najpierw wskazujemy z jakimi argumentami chcemy pozyskać wpisy
$featured_args = array(
    'post_type' => 'post',
    'posts_per_page'=> 3,
    'meta_query' => array(
        array(
            'key' => '_crb_show_under_slideshow',
            'value' => 'yes',
            // 'compare' => 'LIKE',
        ),
    ),);

// Tu pobieramy do zmiennych z bazy te wszystkie wpisy
$featured = new WP_Query($featured_args);

    if ($featured->have_posts()) {
        while ($featured->have_posts()) {
            $featured->the_post();?>
          <div class="featured__item">
              <a title="<?php the_title(); ?>" href="<?php echo $url; ?>" class="link link--nav" target="_blank">
                  <div class="featured__time"><?php echo get_the_time('j F Y'); ?></div>
                  <img class="featured__image blazy" alt=""
                  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                  data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true)[0]; ?>" />
                  <h5 class="featured__title"><?php the_title();?></h5>
              </a>
          </div>
<?php

        }
    } else {
        echo 'Nic a nic';
    }
