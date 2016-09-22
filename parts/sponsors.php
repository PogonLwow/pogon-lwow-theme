<?php
// Wyświetla logotypy zawarte w linki naszych sponsorów i partnerów //

// Najpierw wskazujemy z jakimi argumentami chcemy pozyskać wpisy
$sponsors_args = array(
    'post_type' => 'sponsorowane',
    'meta_query' => array(
        array(
            'key' => '_sponsor_pos',
            'value' => 'sponsors',
            // 'compare' => 'LIKE',
        ),
    ),);
$collab_args = array(
    'post_type' => 'sponsorowane',
    'meta_query' => array(
        array(
            'key' => '_sponsor_pos',
            'value' => 'collab',
            // 'compare' => 'LIKE',
        ),
    ),);
$partnerships_args = array(
    'post_type' => 'sponsorowane',
    'meta_query' => array(
        array(
            'key' => '_sponsor_pos',
            'value' => 'partnerships',
            // 'compare' => 'LIKE',
        ),
    ),
);
// Tu pobieramy do zmiennych z bazy te wszystkie wpisy
$partnerships = new WP_Query($partnerships_args);
$sponsors = new WP_Query($sponsors_args);
$collabs = new WP_Query($collab_args);

// Wyświetla obrazek w linku
function show_links($items)
{
    if ($items->have_posts()) {
        while ($items->have_posts()) {
            $items->the_post();
            $url = carbon_get_post_meta(get_the_ID(), 'crb_sponsor_link'); ?>
          <div class="brand">
              <a title="<?php the_title(); ?>" href="<?php echo $url; ?>" class="link link--controls" target="_blank">
                  <img class="brand__logo blazy" alt=""
                  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                  data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'card', true)[0]; ?>" />
              </a>
          </div>
<?php

        }
    } else {
        echo 'Nic a nic';
    }
}

// Następnie wywołujemy tę funkcję w HTMLu
?>
    <section class="section section--white section--red-deco container">
        <h4 class="section__title">Wspierają nas</h4>
        <div class="sponsors">
            <?php show_links($sponsors); ?>
        </div>
    </section>

    <div class="container">
        <section class="section section--white section--red-deco section--main">
            <h4 class="section__title">Kluby partnerskie</h4>
            <div class="sponsors">
                <?php show_links($partnerships); ?>
            </div>
        </section>
            <section class="section section--white section--red-deco section--side">
                <h4 class="section__title">Współpraca</h4>
                <div class="sponsors">
                    <?php show_links($collabs); ?>
                </div>
            </section>
    </div>
