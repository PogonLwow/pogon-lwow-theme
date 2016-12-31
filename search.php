<?php get_header(); ?>

<?php get_template_part('parts/head'); ?>
<?php get_template_part('parts/topbar'); ?>
<div class="container">
    <?php
    $s = get_search_query();
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'pagination' => true,
        'posts_per_page' => '6',
        'paged' => $paged,
        's' =>$s
    );
    $posts = new WP_Query($args);
    ?>
    <section class="section section--main" id="searchQuery" data-search-query="<?php echo $s; ?>">
        <div class="container--cards container" id="feed">
                <?php card($posts); ?>
        </div>
        <div class="load-more-container">
            <button id="load_more_searched_posts" class="btn btn--loadMore  btn--synergia">Więcej wyników</button>
        </div>
    </section>
    <?php get_template_part('parts/sidebar'); ?>

</div>

<?php get_template_part('parts/sponsors'); ?>

<?php get_footer(); ?>
