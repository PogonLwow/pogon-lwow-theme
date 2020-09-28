<?php
// Info o motywie //
    $theme = wp_get_theme();
    $version = $theme->get('Version');
    $theme_name = $theme->get('Name');

// Rejestrujemu menu //
register_nav_menus(
    array(
        'main_menu' => 'Main Menu',
        'footer_menu' => 'Footer Menu',
    )
);

////////////////////////////////////////////////////////////////////
// Register the Sidebar(s)
////////////////////////////////////////////////////////////////////

register_sidebar(
    array(
        'name' => 'Right Sidebar',
        'id' => 'right-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

// Dodatkowe funkcje porozrzucane po plikach //
// Ustawienia motywu
include 'lib/general/meta-tags.php';
include 'lib/general/lazy.php';
include 'lib/general/utils.php';
include 'lib/general/removes.php';
include 'lib/general/topwalker.php';
include 'lib/general/footerwalker.php';
include 'lib/general/humans.php';

include 'lib/customizer/customizer.php';


include 'lib/posts/ajax.php';
include 'lib/posts/card.php';
include 'lib/posts/utils.php';

include 'lib/sponsors/utils.php';
include 'lib/sponsors/post-type.php';

include 'lib/patrons/utils.php';
include 'lib/patrons/post-type.php';

include 'lib/options/options.php';



// include 'lib/general/humans.php';


// style //
    function pogon_theme_stylesheets()
    {
        global $version, $pgn_settings;
        $style_path = get_template_directory_uri().'/build/style';
        wp_register_style('MerriweatherSans', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,400italic,300,700,800&subset=latin,latin-ext');
        wp_register_style('main', $style_path.'/main.css', array(), $version, 'all');
        wp_enqueue_style('main');
        wp_enqueue_style('MerriweatherSans');
    }
    add_action('wp_enqueue_scripts', 'pogon_theme_stylesheets');

// skrypty //
function js()
{
    global $version, $pgn_settings;
    $google_map_key = 'AIzaSyDFGqJn95IObdCf2GSkHMsO2SrCgLeyCq4';
    $js_path = get_template_directory_uri().'/build/js';
    wp_register_script('main', $js_path.'/main.min.js', array('jquery'), $version, true);
    wp_register_script('blazy', $js_path.'/blazy.min.js', array('jquery'), $version, true);
    wp_register_script('map', 'https://maps.googleapis.com/maps/api/js?key='.$google_map_key.'&language=pl', false);
    wp_register_script('map_settings',$js_path.'/map.min.js', array('jquery'), $version, true);
        wp_enqueue_script('blazy');
        wp_enqueue_script('main');

    if (is_404()) {
        wp_enqueue_script('404');
    }
    if (is_page('kontakt')) {
        wp_enqueue_script('map');
        wp_enqueue_script('map_settings');
    }


}
add_action('wp_footer', 'js');

function js_admin()
{
    $current_user = wp_get_current_user();
    if ($current_user->user_login == 'ukr'){
        wp_enqueue_script( 'admin-dirty', get_template_directory_uri() . '/build/js/admin.min.js');
    }
}
add_action( 'admin_enqueue_scripts', 'js_admin' );
// Dodajemy wsparcie linków RSS //
add_theme_support('automatic-feed-links');

//////////////////////////////////////////////////////////////////
// Declaration support of Sportspress
//////////////////////////////////////////////////////////////////
 add_theme_support('sportspress');

 ////////////////////////////////////////////////////////////////////
 // Add support for a featured image and the size
 ////////////////////////////////////////////////////////////////////

add_theme_support( 'post-thumbnails' );
