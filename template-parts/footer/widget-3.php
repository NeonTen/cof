<?php
/**
 * The template part for displaying Widget 3 in footer.
 *
 * @package COF
 */

$heading = get_field( 'fw3_heading', 'option' );

if ( ! $heading && ! have_rows( 'fw3_links', 'option' ) ) {
	return;
}
?>
<div class="f-widget | text-white">

	<?php
	if ( $heading ) {
		echo '<h3 class="widget-title | text-lg font-bold text-white">' . esc_html( $heading ) . '</h3>';
	}

	if ( have_rows( 'fw3_links', 'option' ) ) :

		echo '<ul class="grid gap-2 mt-4">';

		while ( have_rows( 'fw3_links', 'option' ) ) :
			the_row();

			$links = get_sub_field( 'fw3_link' );

			if ( $links ) {
				printf(
					'<li><a class="hover:text-primary" href="%s" target="%s">%s</a></li>',
					esc_url( $links['url'] ),
					esc_html( $links['target'] ),
					esc_html( $links['title'] )
				);
			}

		endwhile;

		echo '</ul>';

	endif;
	?>

</div>
