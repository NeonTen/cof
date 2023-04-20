<?php
/**
 * The ACF template part for displaying Heading.
 *
 * @package COF
 */

$heading = get_sub_field( 'heading' );
$subheading = get_sub_field( 'sub_heading' );
$btn     = get_sub_field( 'link' );

if ( ! $heading && ! $subheading && ! $btn ) {
    return;
}
?>

<section class="mb-10">
	<div class="container">

		<div class="grid xl:flex xl:justify-between xl:items-end gap-8">
			<?php
			if ( $heading || $subheading ) {
				echo '<div class="grid gap-2">';
				// Heading.
				if ( $heading ) {
					echo '<h2 class="text-4xl font-bold">' . wp_kses_post( $heading ) . '</h2>';
				}
				// Sub Heading.
				if ( $subheading ) {
					echo '<p>' . wp_kses_post( $subheading ) . '</p>';
				}
				echo '</div>';
			}

			// Button.
			if ( $btn ) {
				printf(
					'<a href="%s" class="flex items-center uppercase tracking-widest text-text-color hover:text-secondary hover:fill-secondary group" target="%s">%s<span class="group-hover:rotate-45 transition-all">%s</span></a>',
					esc_url( $btn['url'] ),
					esc_html( $btn['target'] ),
					esc_html( $btn['title'] ),
					get_svg( 'icons/arrow-link', false ) //phpcs:ignore
				);
			}
			?>
		</div>

	</div>
</section>
