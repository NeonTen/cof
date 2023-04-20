<?php
/**
 * The ACF template part for displaying Categories.
 *
 * @package COF
 */

$heading = get_sub_field( 'heading' );
$cats    = get_sub_field( 'select_category' );

if ( ! $cats ) {
	return;
}
?>

<section class="w-full">
	<div class="container">

		<?php
		if ( $heading ) {
			echo '<h2 class="text-3xl 4xl:text-[32px] leading-tight font-bold text-dark-color mb-8">' . wp_kses_post( $heading ) . '</h2>';
		}
		?>

		<div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8">

		<?php
		foreach ( $cats as $category ) {

			$icon_html  = '';
			$icon_url   = get_field( 'cat_icon', $category->taxonomy . '_' . $category->term_id );
			$term_link  = get_term_link( $category );
			$custom_url = get_field( 'custom_url', $category->taxonomy . '_' . $category->term_id );

			if ( $icon_url ) {
				$icon_html = sprintf(
					'<img src="%s" alt="%s">',
					$icon_url,
					$category->name
				);
			}

			printf(
				'<a href="%s" class="flex items-center gap-6 bg-light-color hover:bg-blue-medium text-dark-color hover:text-white transition-all">
					<div class="w-16 h-16 grid place-content-center bg-[#DFF7F8]">%s</div>
					<h4 class="text-2xl font-bold">%s</h4>
				</a>',
				esc_url( $custom_url ),
				wp_kses_post( $icon_html ),
				esc_html( $category->name )
			);
		}
		?>

		</div>

	</div>
</section>
