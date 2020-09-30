<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_image_size('sponsor_logo', 75, false);

add_action('carbon_fields_register_fields', 'crb_sponsor_link');
function crb_sponsor_link()
{
    Container::make('post_meta', 'Link')
        ->show_on_post_type('sponsorowane')
        ->set_context('side')
        ->set_priority('high')
        ->add_fields(array(
            Field::make('text', 'crb_sponsor_link', 'URL'),
            Field::make('select', 'sponsor_pos', 'Wybierz pozycję')
            ->add_options(array(
                'partnerships' => 'Kluby partnerskie',
                'sponsors' => 'Wspierają nas',
                'collab' => 'Współpraca',
    )),
        ));
}


// Wyświetla logotypy zawarte w linki naszych sponsorów i partnerów //

// Najpierw wskazujemy z jakimi argumentami chcemy pozyskać wpisy
function get_sponsors_array () {
$sponsors_args = array(
    'post_type' => 'sponsorowane',
    'meta_query' => array(
        array(
            'key' => '_sponsor_pos',
            'value' => 'sponsors',
            // 'compare' => 'LIKE',
        ),
    )
);}

function get_collabs_array () {
return array(
    'post_type' => 'sponsorowane',
    'meta_query' => array(
        array(
            'key' => '_sponsor_pos',
            'value' => 'collab',
            // 'compare' => 'LIKE',
        ),
    )
);}

function get_partnerships_array () {
    return array(
        'post_type' => 'sponsorowane',
        'meta_query' => array(
            array(
                'key' => '_sponsor_pos',
                'value' => 'partnerships',
                // 'compare' => 'LIKE',
            ),
        ),
    );
}


function get_patrons_array () {
    return array('post_type' => 'mecenasi');
}
// Tu pobieramy do zmiennych z bazy te wszystkie wpisy
function get_sponsors($sponsors_type) {
    if ($sponsors_type == 'partnerships') {
        return new WP_Query(get_partnerships_array());
    } elseif ($sponsors_type == 'sponsors') {
        return new WP_Query(get_sponsors_array());
    } elseif ($sponsors_type == 'collabs') {
        return new WP_Query(get_collabs_array());
    } elseif ($sponsors_type == 'patrons') {
        return new WP_Query(get_patrons_array());
    }
}

// Wyświetla obrazek w linku
function show_links($sponsors_type) {
    $items = get_sponsors($sponsors_type);
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

function show_patrons($items) {
    ?><table> <?php
    if ($items->have_posts()) {
        while ($items->have_posts()) {
            $items->the_post();
            $donation = carbon_get_post_meta(get_the_ID(), 'crb_patron_donation'); ?>


              <tr>
                <td><?php the_title(); ?></td>
                <td><?php echo $donation; ?></td>
              </tr>


<?php

        }
    } else {
        echo 'Brak mecenasów';
    }
    ?> </table><?php
}
