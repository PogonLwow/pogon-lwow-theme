<?php


function seo_title() {
	global $post, $page, $paged;
	$sep = " » "; # Separator
	$newtitle = get_bloginfo('name'); # Default

	# Single page ########################################
	if (is_single() || is_page()) {
		$newtitle = single_post_title("", false); # default title
	}

	# Search results ########################################
	if (is_search())
	 $newtitle = "Wyniki wyszukiwania: " . $s;


	# Add page number if necesary
	if ($paged >= 2 || $page >= 2)
			$newtitle .= $sep . sprintf('Strona %s', max($paged, $page));

	# Home & Front Page ########################################
	if (is_home() || is_front_page()) {
		$newtitle = get_bloginfo('name') . $sep . get_bloginfo('description');
	} else {
		$newtitle .= " » " . get_bloginfo('name');
	}

	return $newtitle;
}
add_filter('wp_title', 'seo_title');

function pogon_footer_admin()
{
    echo 'Made with &hearts; in Lwów by <a href="https://twitter.com/stsdc" target="_blank"> Stanisław</a>, powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a> </p>';
}
add_filter('admin_footer_text', 'pogon_footer_admin');


// Przypomina, by zainstalować wtyczki //
function remind_to_do() {



  if ( !is_plugin_active( 'carbon-fields/carbon-fields-plugin.php' ) ) {
    echo '<div class="error"> <p>Należy zainstalować wtyczkę Carbon Fields</p></div>';
  }

}
add_action( 'admin_notices', 'remind_to_do' );

// Dynamiczna zmiania roku //
function comicpress_copyright()
{
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
    if ($copyright_dates) {
        $copyright = '&copy; '.$copyright_dates[0]->firstdate;
        if ($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
            $copyright .= '-'.$copyright_dates[0]->lastdate;
        }
        $output = $copyright;
    }

    return $output;
}

// Zaawansowana ekscerpcja //

function my_excerpt($text, $excerpt)
{
    if ($excerpt) {
        return $excerpt;
    }

    $text = strip_shortcodes($text);

    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 25);
    $excerpt_more = apply_filters('excerpt_more', '...');
    $words = preg_split("/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text.$excerpt_more;
    } else {
        $text = implode(' ', $words);
    }

    return apply_filters('wp_trim_excerpt', $text, $excerpt);
}
// Zmienia Posts na Blog //
function change_post_menu_label() {
    global $menu;
    $menu[5][0] = 'Blog';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );


// Dodaje style dla paginacji //
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn--pagination"';
}
