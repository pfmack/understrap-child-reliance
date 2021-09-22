<?php
/**
 * Template Name: Homepage Template
 *
 * Template for displaying a homepage without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper" id="full-width-page-wrapper">

	<?php 

	// check if the flexible content fields have rows of data

	if ( have_rows( 'flexible_content' ) ): 

		// loop through the rows of data
		while (have_rows( 'flexible_content') ) : the_row();

			// check current row layout
			if (get_row_layout() == 'hero'): ?> 
			
			<section>
				<div class="hero" style="background-image:url(<?php the_sub_field('hero_image') ?>)">
				
				</div>
			
			</section>

<?php 
			endif;

		endwhile;

	else:

		// no flexible content fields found
	endif;

?>
	
	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
