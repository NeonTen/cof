<?php
/**
 * The ACF template part for displaying Testimonials.
 *
 * @package COF
 */

$testimonials = get_sub_field( 'select_testimonials' );

if ( ! $testimonials ) {
	return;
}
?>

<section class="w-full">
	<div class="container">

	<?php
	// Testimonials.
	$args = [
		'post_type'      => 'testimonials',
		'posts_per_page' => '-1',
		'order'          => 'ASC',
		'post__in'       => $testimonials,
	];

	$query = new WP_Query( $args );

	if ( ! $query->have_posts() ) {
		echo '<p>No testimonial found.</p>';
	}

	echo '<div class="testimonial-slider relative">';

	while ( $query->have_posts() ) :
		$query->the_post();

		$featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		$image_html       = '';

		if ( $featured_img_url ) {
			$image_html = '<img class="w-20 h-20 object-cover rounded-full" src="' . $featured_img_url . '">';
		}
		?>

		<div class="flex flex-col justify-between bg-white p-8 shadow-custom">

			<?php
			printf(
				'<div class="flex items-center gap-6 mb-4">
					%1$s
					<div>
						<h4 class="text-lg font-bold">%2$s</h4>
						<span class="flex fill-primary">%3$s%3$s%3$s%3$s%3$s</span>
					</div>
				</div>
				<p>%4$s</p>',
				wp_kses_post( $image_html ),
				wp_kses_post( get_the_title() ),
				get_svg( 'icons/star', false ), // phpcs:ignore
				html_entity_decode( wp_trim_words( htmlentities( wpautop( get_the_content() ) ), 36, '...' ) ) // phpcs:ignore
			);
			?>

		</div>

		<?php
	endwhile;
	wp_reset_postdata();

	echo '</div>';
	?>

	</div>
</section>
