<?php/**
 * The template for displaying Search Results pages
*/
?>
 <?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="row dmbs-content">
    
    <div class="col-md-10 dmbs-main">
				<h2 class="page-header"><?php printf( __( 'Wyniki wyszukiwania: %s', 'pogonlwow' ), get_search_query() ); ?></h2>
				<?php
						get_template_part( 'content' );
			?>

		</div><!-- #content -->
<?php
get_sidebar( 'right' );
get_footer();
?>