<?php
/**
 * The template for displaying Search results.
 *
 * @package COF
 */

get_header();
?>

<section class="my-14">
	<div class="container">

		<header>
			<h1 class="text-4xl font-bold text-blue-dark mb-14">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'cof' ), '<span>' . get_search_query() . '</span>' );
			?>
			</h1>
		</header>

		<?php
		echo '<div class="item-wrap grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10">';

		if ( ! have_posts() ) {
			echo '<p>No posts found.</p>';
		}

		while ( have_posts() ) :
			the_post();

			// Load sub field value.
			$thumbnail    = '';
			$thumbnail_id = '';
			$price        = '';

			if ( is_woocommerce_activated() ) {
				$price = $product->get_price_html();
			}

			if ( has_post_thumbnail() ) {
				$thumbnail_id = get_post_thumbnail_id( get_the_id() );
				$image        = df_resize( $thumbnail_id, '', 424, false, true, true );

				$thumbnail = sprintf(
					'<a href="%s">
						<img class="w-full drop-shadow-custom" src="%s" alt="%s">
					</a>',
					get_permalink(),
					$image['url'],
					get_the_title()
				);
			}

			printf(
				'<div class="grid">
					%s
					<div class="">
						<h3 class="text-lg 2xl:text-2xl uppercase tracking-widest mt-4 hover:text-secondary transition-all">
							<a class="" href="%s">%s</a>
						</h3>
						<p class="text-base mt-2">%s</p>
					</div>
				</div>',
				$thumbnail, // phpcs:ignore
				esc_url( get_permalink() ),
				wp_kses_post( get_the_title() ),
				$price
			);

		endwhile;

		wp_reset_postdata();

		echo '</div>';
		?>

		<?php bootstrap_pagination(); ?>

	</div>
</section>

<?php
get_footer();
