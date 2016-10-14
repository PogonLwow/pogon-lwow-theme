<?php
include 'callbacks.php';
include 'display.php';

add_action('admin_menu', 'pgn_options_add_to_menu');
function pgn_options_add_to_menu()
{
    /* Base Menu */
    add_theme_page(
    'Opcje Pogoni',
    'Opcje Pogoni',
    'manage_options',
    'pogonoptions',
    'pgn_options_display');
}
// Adminbar //
function adminbar_link_to_pgn_options($wp_admin_bar) {
  $args = array(
    'id' => 'pgn_options_display',
    'title' => 'Opcje Pogoni',
    'href' => home_url().'/wp-admin/themes.php?page=pogonoptions',
    'meta' => array('class' => 'pogonoptions'),
    'parent' => 'site-name',
    );
  $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'adminbar_link_to_pgn_options', 999);
add_action('admin_init', 'pgn_options');
function pgn_options()
{

// ===============OGÓLNE===================== //
add_settings_section(
    'pgn_general_page',
    'Ogólne',
    false,
    'pgn_general_page_option'
);

    add_settings_field(
    'fb_link',
    'Link do fanpage\'a',
    'pgn_fb_link_callback',
    'pgn_general_page_option',
    'pgn_general_page'
);
    add_settings_field(
    'twitter_link',
    'Link do Twittera',
    'pgn_twitter_link_callback',
    'pgn_general_page_option',
    'pgn_general_page'
);
    add_settings_field(
    'vk_link',
    'Link do VK',
    'pgn_vk_link_callback',
    'pgn_general_page_option',
    'pgn_general_page'
);

// ===============O NAS================= //
add_settings_section(
    'pgn_kontakt_page',
    'Kontakt',
    false,
    'pgn_kontakt_page_option'
);

    add_settings_field(
    'latitude',
    'Szerokość geograficzna (lat)',
    'pgn_latitude_callback',
    'pgn_kontakt_page_option',
    'pgn_kontakt_page'
);
    add_settings_field(
    'longtitude',
    'Długość geograficzna (lon)',
    'pgn_longtitude_callback',
    'pgn_kontakt_page_option',
    'pgn_kontakt_page'
);
register_setting('pgn_general_page_option', 'pgn_general_page_option', 'pgn_validate_options');
register_setting('pgn_kontakt_page_option', 'pgn_kontakt_page_option', 'pgn_validate_options');
}

$general_options = get_option('pgn_general_page_option');
$kontakt_options = get_option('pgn_kontakt_page_option');

function pgn_validate_options( $input ) {
  $input['fb_link'] = wp_filter_nohtml_kses( $input['fb_link'] );
  $input['twitter_link'] = wp_filter_nohtml_kses( $input['twitter_link'] );
  $input['vk_link'] = wp_filter_nohtml_kses( $input['vk_link'] );


  $input['robodrift_edition'] = wp_filter_nohtml_kses( $input['robodrift_edition'] );
  $input['latitude'] = wp_filter_nohtml_kses( $input['latitude'] );
  $input['longtitude'] = wp_filter_nohtml_kses( $input['longtitude'] );

  return $input;
}
