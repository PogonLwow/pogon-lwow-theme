<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'pagination' => true,
    'posts_per_page' => '6',
    'paged' => $paged,
);
$posts = new WP_Query($args);
?>
<div class="container">
    <div class="container--cards container" id="feed">
            <?php card($posts); ?>
    </div>
    <div class="load-more-container">
        <button id="load_more_posts" class="btn btn--loadMore  btn--synergia">Zobacz starsze</button>
</div>
</div>


<?php
wp_reset_postdata();
?>
