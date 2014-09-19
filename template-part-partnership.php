<div class="col-md-6" >
    <div class="partnership">
        <h3>Współpraca</h3>

        <?php $args = array(
                'post_type' => 'wspolpraca',
                'category_name' => 'wspolpraca+partnerzy'
                );
            $products = new WP_Query( $args );
            if( $products->have_posts() ) {
                while( $products->have_posts() ) {
                    $products->the_post(); ?>
        
            <div class="single-club col-md-3">
                <a href="<?php the_title(); ?>">
				<?php the_post_thumbnail("medium"); ?>
                </a>
            </div>  
        <?php
                }
            }
            else { echo 'Trzeba z kimś współpracować...'; } ?>
        </div>
</div>
