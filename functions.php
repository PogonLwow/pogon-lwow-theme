
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
include 'lib/general/walker.php';
include 'lib/general/humans.php';

include 'lib/general/humans.php';


// style //
    function pogon_theme_stylesheets()
    {
        global $version, $snrg_settings;
        $style_path = get_template_directory_uri().'/build/style';
        wp_register_style('MerriweatherSans', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,400italic,300,700&subset=latin,latin-ext');
        wp_register_style('main', $style_path.'/main.css', array(), $version, 'all');
        wp_enqueue_style('main');
        wp_enqueue_style('MerriweatherSans');
    }
    add_action('wp_enqueue_scripts', 'pogon_theme_stylesheets');

// skrypty //
function js()
{
    global $version, $snrg_settings;
    $js_path = get_template_directory_uri().'/build/js';
    $google_map_key = 'AIzaSyD6ovUl5OZwwEa_MzTArrazVuvVtCMH-B8';
    wp_register_script('main', $js_path.'/main.min.js', array('jquery'), $version, true);
    wp_register_script('blazy', $js_path.'/blazy.min.js', array('jquery'), $version, true);
    wp_register_script('map', 'https://maps.googleapis.com/maps/api/js?key='.$google_map_key, false);
    wp_register_script('map_settings', $js_path.'/map.min.js', array('jquery'), $version, true);
    if (!is_404()) {
        wp_enqueue_script('blazy');
        wp_enqueue_script('main');
    }
    if (is_404()) {
        wp_enqueue_script('404');
    }
    if (is_page('about')) {
        wp_enqueue_script('map');
        wp_enqueue_script('map_settings');
    }
}
add_action('wp_footer', 'js');
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
