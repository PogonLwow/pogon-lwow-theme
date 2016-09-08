<?php

////////////////////////////////////////////////////////////////////
// Theme Information
////////////////////////////////////////////////////////////////////

    $themename = "PogonLwow (based on DevDmBootstrap3)";
    $developer_uri = "vk.com/stsdc";
    $shortname = "pogon";
    $version = '1.29';
    load_theme_textdomain( 'pogonlwow', get_template_directory() . '/languages' );

////////////////////////////////////////////////////////////////////
// include Theme-options.php for Admin Theme settings
////////////////////////////////////////////////////////////////////

   include 'theme-options.php';


////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
    function pogonlwow_theme_stylesheets()
    {
        wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' );
        wp_register_style('bootstrap.css', get_template_directory_uri() . '/css/bootstrap.css', array(), '1', 'all' );
        wp_enqueue_style( 'bootstrap.css');
    }
    add_action('wp_enqueue_scripts', 'pogonlwow_theme_stylesheets');

//dequeue css from plugins
add_action('wp_print_styles', 'mytheme_dequeue_css_from_plugins', 100);
function mytheme_dequeue_css_from_plugins() {
wp_dequeue_style( "sportspress-general" );
}
//////////////////////////////////////////////////////////////////
// Declaration support of Sportspress
//////////////////////////////////////////////////////////////////
 add_theme_support( 'sportspress' );

//Editor Style
add_editor_style('css/editor-style.css');

////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
    function pogonlwow_theme_js()
    {
        global $version;
        wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/bootstrap.js',array( 'jquery' ),$version,true );
    }
    add_action('wp_enqueue_scripts', 'pogonlwow_theme_js');

////////////////////////////////////////////////////////////////////
// Add Title Parameters
////////////////////////////////////////////////////////////////////

    function pogonlwow_wp_title( $title, $sep ) { // Taken from Twenty Twelve 1.0
        global $paged, $page;

        if ( is_feed() )
            return $title;

        // Add the site name.
        $title .= get_bloginfo( 'name' );

        // Add the site description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            $title = "$title $sep $site_description";

        // Add a page number if necessary.
        if ( $paged >= 2 || $page >= 2 )
            $title = "$title $sep " . sprintf( __( 'Page %s', 'pogonlwow' ), max( $paged, $page ) );

        return $title;
    }
    add_filter( 'wp_title', 'pogonlwow_wp_title', 10, 2 );

////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

    require_once('lib/wp_bootstrap_navwalker.php');
    require_once('lib/bootstrap-custom-menu-widget.php');

////////////////////////////////////////////////////////////////////
// Register Menus
////////////////////////////////////////////////////////////////////

        register_nav_menus(
            array(
                'main_menu' => 'Main Menu',
                'footer_menu' => 'Footer Menu'
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

        register_sidebar(
            array(
            'name' => 'Left Sidebar',
            'id' => 'left-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

////////////////////////////////////////////////////////////////////
// Register hook and action to set Main content area col-md- width based on sidebar declarations
////////////////////////////////////////////////////////////////////

add_action( 'pogonlwow_main_content_width_hook', 'pogonlwow_main_content_width_columns');

function pogonlwow_main_content_width_columns () {

    global $dm_settings;

    $columns = '12';

    if ($dm_settings['right_sidebar'] != 0) {
        $columns = $columns - $dm_settings['right_sidebar_width'];
    }

    if ($dm_settings['left_sidebar'] != 0) {
        $columns = $columns - $dm_settings['left_sidebar_width'];
    }

    echo $columns;
}

function pogonlwow_main_content_width() {
    do_action('pogonlwow_main_content_width_hook');
}

////////////////////////////////////////////////////////////////////
// Add support for a featured image and the size
////////////////////////////////////////////////////////////////////

    add_theme_support( 'post-thumbnails' );
////////////////////////////////////////////////////////////////////
// Adds RSS feed links to for posts and comments.
////////////////////////////////////////////////////////////////////

    add_theme_support( 'automatic-feed-links' );


////////////////////////////////////////////////////////////////////
// Set Content Width
////////////////////////////////////////////////////////////////////

//if ( ! isset( $content_width ) ) $content_width = 800;

////////////////////////////////////////////////////////////////////
// Polskie komentarze od adpawl
////////////////////////////////////////////////////////////////////
function odmiana($in,$lp,$lm1,$lm2) {
 if ($in==1) return $lp;
 elseif (($in%10>1) && ($in%10<5) && !(($in%100>=10) && ($in%100<=21))) return $lm1;
return $lm2;
};

////////////////////////////////////////////////////////////////////
// Remove version
////////////////////////////////////////////////////////////////////
function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

////////////////////////////////////////////////////////////////////
// Dynamic Copy Year
////////////////////////////////////////////////////////////////////
function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
// Numbered pagination http://brajeshwar.com/2012/how-to-do-numbered-pagination-for-your-wordpress-blog/ 
/////////////////////////////////////////////////////////////////////////////////////////////////////////
function numbered_pagination() {

        global $wp_query;
        $big = 99999999;
        echo paginate_links(array('base' => str_replace($big, '%#%', get_pagenum_link($big)), 'format' => '?paged=%#%', 'total' => $wp_query->max_num_pages, 'current' => max(1, get_query_var('paged')), 'show_all' => false, 'end_size' => 2, 'mid_size' => 3, 'prev_next' => true, 'prev_text' => '&laquo;', 'next_text' => '&raquo;', 'type' => 'list'));
}

////////////////////////////////////////////////////////////////////
// Custom excerpt ellipses, custom length
///////////////////////////////////////////////////////////////////
function custom_excerpt_more($more) {
return '…';
}
add_filter('excerpt_more', 'custom_excerpt_more');

function new_excerpt_length($length) {
return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');
////////////////////////////////////////////////////////////////////
// Favicon
//////////////////////////////////////////////////////////////////// 
function blog_favicon() {
echo '<link rel="icon" type="image/png" href="'.get_template_directory_uri() . '/img/fav.png" />';
}
add_action('wp_head', 'blog_favicon');

// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);

////////////////////////////////////////////////////////////////////
// Post współpracy
//////////////////////////////////////////////////////////////////// 
function wspolpraca_post_type() {

	$labels = array(
		'name'                => _x( 'Linki współpracy', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Link współpracy', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Linki współpracy', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'Wszystkie linki', 'text_domain' ),
		'view_item'           => __( 'Zobacz link', 'text_domain' ),
		'add_new_item'        => __( 'Dodaj nowy link współpracy', 'text_domain' ),
		'add_new'             => __( 'Dodaj jeszcze jeden', 'text_domain' ),
		'edit_item'           => __( 'Edytuj link', 'text_domain' ),
		'update_item'         => __( 'Zaktualizuj link', 'text_domain' ),
		'search_items'        => __( 'szukaj link', 'text_domain' ),
		'not_found'           => __( 'Nie znaleziono', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'wspolpraca', 'text_domain' ),
		'description'         => __( 'Linki do sponsorów oraz klubów zaprzyjaźnionych', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'category'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-links',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'wspolpraca', $args );

}

// Hook into the 'init' action
add_action( 'init', 'wspolpraca_post_type', 0 );

////////////////////////////////////////////////////////////////////
// Post albumu
//////////////////////////////////////////////////////////////////// 
function album_post_type() {

	$labels = array(
		'name'                => _x( 'Albumy zdjęć', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Album zdjęć', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Albumy zdjęć', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'Wszystkie albumy', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Dodaj nowy album', 'text_domain' ),
		'add_new'             => __( 'Dodaj jeszcze jeden', 'text_domain' ),
		'edit_item'           => __( 'Edytuj album', 'text_domain' ),
		'update_item'         => __( 'Zaktualizuj album', 'text_domain' ),
		'search_items'        => __( 'Szukaj album', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'album', 'text_domain' ),
		'description'         => __( 'Albumy zdjęć', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author', 'thumbnail', 'comments', 'editor' ),
        'taxonomies'          => array( ''),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
        'menu_icon'           => 'dashicons-format-gallery',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'album', $args );

}

// Hook into the 'init' action
add_action( 'init', 'album_post_type', 0 );

function albums_by_year() {
  // array to use for results
  $years = array();

  // get posts from WP
  $posts = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'post_type' => 'album',
    'post_status' => 'publish'
  ));

  // loop through posts, populating $years arrays
  foreach($posts as $post) {
    $years[date('Y', strtotime($post->post_date))][] = $post;
  }

  // reverse sort by year
  krsort($years);

  return $years;
}
?>
