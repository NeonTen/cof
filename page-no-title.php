<?php
/**
 * Template Name: No Title
 * The template for displaying page without title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COF
 */

get_header();
?>

	<section class="my-14">
		<div class="container">

			<?php
			while ( have_posts() ) :
				the_post();

				echo '<div class="w-full">';
				the_content();
				echo '</div>';

			endwhile; // End of the loop.
			?>

		</div>
	</section>

<?php
get_footer();
