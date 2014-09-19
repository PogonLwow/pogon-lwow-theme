<div class="row">
    <div class="sponsors">
        <div class="sponsors-header">
            <h3>Wspierają nas</h3>
            <a class="join" href="<?php echo $dm_settings['join'] ?>">dołącz do naszych sponsorów</a>
        </div>

<?php
    $args = array(
      'post_type' => 'wspolpraca',
        'category_name' => 'wspolpraca+link-do-sponsora'
    );
    $products = new WP_Query( $args );
    if( $products->have_posts() ) {
      while( $products->have_posts() ) {
        $products->the_post();
        ?>
            <div class="single-sponsor col-md-4">
                <a href="<?php the_title(); ?>">
				<?php the_post_thumbnail(); ?>
                </a>
            </div>  
<?php
      }
    }
    else {
      echo 'Bez sponsorów ciężko będzie...';
    }
  ?>
    </div>
</div>