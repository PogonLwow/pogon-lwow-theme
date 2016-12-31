<div class="slider js_slider js_simple">
    <div class="slider__frame">
        <div class='slider__arrows'>
            <button class='slider__prev'><i class='arrow icon-arl'></i></button>
            <button class='slider__next'><i class='arrow icon-arp'></i></button>
        </div>
        <ul class="slider__slides js_slides">
<?php
    $my_query = new WP_Query('posts_per_page=5');
    while ($my_query->have_posts()) : $my_query->the_post();
        echo'<li class="slider__slide">';
        if (has_post_thumbnail()) {
            $matches = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            $image_img_tag = $matches[0];
        } else {
            global $post;
            preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
            $image_img_tag = $matches[1][0];
        }
?>
        <img class="slider__img" src="<?php echo $image_img_tag ?>"/>
        <div class="slider__data">
            <div class="slider__date"><?php echo get_the_time('j F Y'); ?></div>
            <h4 class="slider__title">
                <a class="link link--footer" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <div class="read-more-wpsp">
                <a class="gold" href="<?php get_permalink(); ?>">czytaj więcej</a>
            </div>
        </div>
    </li>
<?php endwhile;
    wp_reset_postdata();
?>
        </ul>
    </div>
</div>
