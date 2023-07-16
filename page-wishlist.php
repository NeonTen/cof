<?php
/**
 * Template Name: Wishlist
 * The template for displaying wishlist
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

				cof_post_title();

				echo '<div class="w-full">';
				the_content();
				echo '</div>';

			endwhile; // End of the loop.
			?>

		</div>
	</section>

<?php
get_footer();
