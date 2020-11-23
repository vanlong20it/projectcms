<?php
/**
 * @subpackage shopsix
 * @since shopsix 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// Show the selected front page content.
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/page/content', 'front-page' );
			endwhile;
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>

		<?php
		// Get each of our panels and show the post data.
		if ( 0 !== shopsix_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filter number of front page sections in shopsix.
			 *
			 * @since shopsix 1.0
			 *
			 * @param int $num_sections Number of front page sections.
			 */
			$num_sections = apply_filters( 'shopsix_front_page_sections', 4 );
			global $shopsixcounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$shopsixcounter = $i;
				shopsix_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== shopsix_panel_count() ) ends here.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
