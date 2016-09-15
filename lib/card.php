<?php
function card ($query) {
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post(); ?>
        <div class="card">
          <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
            <div class="card__overimage loading">
              <?php if ( has_post_thumbnail() ) { ?>
                <img class="card__image blazy"
                     alt="<?php the_title(); ?>"
                     src="<?php bloginfo('template_directory'); ?>/build/img/def-thumb.jpg"
                     data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'card_image', true)[0];?>"/>
              <?php } else { ?><img class="blazy" src="<?php bloginfo('template_directory'); ?>/build/img/card.png" /><?php } ?>
              <h2 class="card__title"><?php the_title(); ?></h2>
            </div>
          </a>
          <div class="card__excerpt">
            <?php echo get_the_excerpt(); ?>
          </div>
          <div class="card__action">
            <a class="btn btn--readmore" href="<?php the_permalink(); ?>">Czytaj dalej</a>
          </div>
        </div>
 <?php
    }
} else {
    echo 'Brak wpisów.';
}
}
