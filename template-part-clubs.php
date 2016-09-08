<div class="col-md-10" style="padding-right:20px;">
    <div class="clubs">
        <h3>Kluby partnerskie</h3>

        <?php $args = array(
                'post_type' => 'wspolpraca',
                'category_name' => 'wspolpraca+link-do-klubu'
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
            else { echo 'Trzeba się z kimś zaprzyjaźnić...'; } ?>
        </div>
</div>
