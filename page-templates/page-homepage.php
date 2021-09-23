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

		<?php //check current row layout ?>
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

		<?php //check current row layout ?>
		<?php if( get_row_layout() == 'featured-content' ): ?>

			<section id=#featured-content>
				<div class="featured-image" style="background-image:url(<?php the_sub_field('icon-image')?>)">
					<!--Text overlayed on background Image -->
						<div class="container">
							<div class="featured-text">
						<?php the_sub_field('featured-text') ?>
							</div>
				</div>
			</section>
		<?php endif; ?>
		<?php //check current row layout ?>
		<?php if( get_row_layout() == 'first-section' ): ?>

			<section>
			
				<div class="row">
					<div class="col-md left-image">
					<img src="<?php the_sub_field('left_image'); ?>" />
					</div>
					<!--Text on right-->
					<div class="col-md rightside-text"><?php the_sub_field('right_text') ?>
					</div>
					</div>
				</div>
			
			</section>
		<?php endif; ?>

		<?php //check current row layout ?>
		<?php if( get_row_layout() == 'second-section' ): ?>

			<section>
			
				<div class="row flex-column-reverse flex-md-row">
					<div class="col-md second-leftside-text"><?php the_sub_field('second_leftside_text') ?>
					</div>
	
					<div class="col-md second-rightside-image">
					<img src="<?php the_sub_field('second_rightside_image'); ?>" />
						</div>
				</div>
			
				
							
			</section>
		<?php endif; ?>

	<?php //check current row layout ?>
		<?php if( get_row_layout() == 'third-section' ): ?>
			<section>
				<div class="row">
					<div class="col-md third-leftside-image">
					<img src="<?php the_sub_field('third_leftside_image');?>" />
					</div>
					<!--Text on right-->
					<div class="col-md third-rightside-text"><?php the_sub_field('third_rightside_text') ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php //check current row layout ?>
		<?php if( get_row_layout() == 'fourth-section' ): ?>

			<section>
				<div class="row flex-column-reverse flex-md-row">
					<div class="col-md fourth-leftside-text"><?php the_sub_field('fourth_leftside_text') ?>
					</div>
	
					<div class="col-md fourth-rightside-image">
					<img src="<?php the_sub_field('fourth_rightside_image'); ?>" />
						</div>
					</div>
					</div>
				</div>
			
			</section>
		<?php endif; ?>

	<?php //check current row layout ?>
		<?php if( get_row_layout() == 'fifth-section' ): ?>
			<section>
				<div class="row">
					<div class="col-md fifth-leftside-image">
					<img src="<?php the_sub_field('fifth_leftside_image');?>" />
					</div>
					<!--Text on right-->
					<div class="col-md fifth-right-text"><?php the_sub_field('fifth_rightside_text') ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>

<?php
get_footer();
