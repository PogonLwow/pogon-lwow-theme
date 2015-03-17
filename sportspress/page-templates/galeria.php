<?php/** Template Name: Galeria **/ ?>
 <?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div id="primary" class="row">
    <div id="content" role="main">
        <?php foreach(albums_by_year() as $year => $posts) : ?>
  <h2 class="page-header"><?php echo $year; ?></h2>

  <ul class="album_container">
    <?php foreach($posts as $post) : setup_postdata($post); ?>
      <li class="album">
          <p>
                <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('medium', array( 'class'	=> "album_cover")); ?>
                </a>
          </p>
              <div class="wpscp_detail">

                  <h2 class="featured-header">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>
            </div>

      </li>
    <?php endforeach; ?>
  </ul>
<?php endforeach; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<!--end of sfs-->
<?php get_template_part('template-part', 'sponsors'); ?>
<div class="row">
<?php get_template_part('template-part', 'clubs'); ?>
<?php get_template_part('template-part', 'partnership'); ?>
</div>
<?php get_footer(); ?>
