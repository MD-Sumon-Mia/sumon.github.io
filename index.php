<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelia
 */

get_header();
?>
<!-- Blog -->
<section class="blog archive section">
	<div class="container" id="content">
		<div class="row">
			<!-- Single Blog -->
			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;?>
		
		<!-- End Single Blog -->

	</div>
	<?php if(is_single()):
		the_posts_navigation();
		 endif;?>


	<!-- pagination -->
	<div class="row">
		<div class="col-12">
			<div class="pagination">
				<?php travelia_bs_pagination();?>
			</div>
		</div>
	</div>
	<!--/ End pagination -->
</div>
</section>
<!-- End Blog -->

<?php
get_footer();
