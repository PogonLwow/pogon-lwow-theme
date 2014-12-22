 <!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>" />
    <title>
        <?php wp_title('&laquo;', true, 'right'); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<?php
$imagesDir = get_template_directory_uri() . '/img/404/';
$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$randomImage = $images[array_rand($images) ]; // See comments
?>
    <!-- start content container -->
    <div class="row dmbs-content">
        <div class="col-md-10 er404-container">
        <div class="er404" id="er404" style="background-image: url( <?php echo get_template_directory_uri() . '/img/404/' . rand(1,4);?>.jpg)">
            <div class="tajoj">
                <div class="e404">404</div>
                                Ta joj !
            </div>
        </div>
        </div>
             <?php get_sidebar('right'); ?>
<!--              <div style="clear: both;"></div>-->
    </div>

    <!-- end content container -->

<?php get_footer(); ?>
