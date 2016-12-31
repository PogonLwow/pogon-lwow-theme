<?php get_header(); ?>

<?php get_template_part('parts/head'); ?>
<?php get_template_part('parts/topbar'); ?>


<?php
$imagesDir = get_template_directory_uri() . 'build/img/404/';
$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$randomImage = $images[array_rand($images) ]; // See comments
?>
    <!-- start content container -->
    <div class="container">
        <h1 class="single__title">404 Ta joj!</h1>
    <?php get_template_part('parts/sidebar'); ?>
    </div>

    <!-- end content container -->

<?php get_footer(); ?>
