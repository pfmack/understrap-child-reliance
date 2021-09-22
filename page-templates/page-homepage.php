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

<?php //check if the flexible content fields has rows of data ?>

<?php if (have_rows( 'flexible_content' ) ): ?>

	<?php //loop through the rows of data ?>
	<?php while ( have_rows( 'flexible_content') ) : the_row(); ?>

		<?php //check current row laywout ?>
		<?php if( get_row_layout() == 'hero' ): ?>

			<section>
				<div class="hero" style="background-image:url(<?php the_sub_field('hero_image')?>)">
					<!--Text overlayed on Hero Image -->
					<div class="jumbotron-fluid">
						<div class="container-fluid">
						<?php the_sub_field('hero_text') ?>
							<!--CTA button overlayed on Hero Image -->
							<div class="container-fluid">
					
								<?php
									$selected = get_sub_field( 'display_cta_button');
					
									//if cta checkbox is checked the button will appear
									if( in_array( true , [$selected]) ) {
									?>
									<a class="btn btn-outline-light btn-lg" href="<?php the_sub_field('hero_cta_button_url') ?>">

									<?php the_sub_field('hero_button_text'); ?></a>
									<?php
									}
									else { ?>
									<!-- cta checkbox is not checked so no button appears ---> 
									<?php } ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php //check current row laywout ?>
		<?php if( get_row_layout() == 'featured-content' ): ?>

			<section id=#featured-content>
				<div class="featured-image" style="background-image:url(<?php the_sub_field('icon-image')?>)">
					<!--Text overlayed on Hero Image -->
						<div class="container">
							<div class="featured-text">
						<?php the_sub_field('featured-text') ?>
							</div>
							<!--CTA button overlayed on Hero Image -->
							<div class="container-fluid">
					
								<?php
									$selected = get_sub_field( 'display_cta_button');
					
									//if cta checkbox is checked the button will appear
									if( in_array( true , [$selected]) ) {
									?>
									<a class="btn btn-outline-light btn-lg" href="<?php the_sub_field('hero_cta_button_url') ?>">

									<?php the_sub_field('hero_button_text'); ?></a>
									<?php
									}
									else { ?>
									<!-- cta checkbox is not checked so no button appears ---> 
									<?php } ?>
						</div>
				</div>
			</section>
		<?php endif; ?>
		<?php //check current row laywout ?>
		<?php if( get_row_layout() == 'first' ): ?>

			<section>
			
				<div class="row">
					<div class="col-6">
					<img src="<?php the_sub_field('left_image'); ?>" />
					</div>
					<!--Text on right-->
					<div class="col-6">
						<div class="right-text"><?php the_sub_field('right_text') ?>
						</div>
					</div>
							<!--CTA button overlayed on Hero Image -->
							<div class="container-fluid">
							
								<?php
									$selected = get_sub_field( 'display_cta_button');
					
									//if cta checkbox is checked the button will appear
									if( in_array( true , [$selected]) ) {
									?>
									<a class="btn btn-outline-light btn-lg" href="<?php the_sub_field('hero_cta_button_url') ?>">

									<?php the_sub_field('hero_button_text'); ?></a>
									<?php
									}
									else { ?>
									<!-- cta checkbox is not checked so no button appears ---> 
									<?php } ?>
						</div>
					</div>
				</div>
			
			</section>
		<?php endif; ?>
	


		<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
	
	


	<!--<div class="//<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					//<?php
					//while ( have_posts() ) {
						//the_post();
						//get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						//if ( comments_open() || get_comments_number() ) {
							//comments_template();
						//}
					//}
					//?>-->

				<!--/main> #main -->

			<!-- </div>#primary -->

		<!--</div> .row end -->

	<!--</div> #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
