<?php
/**
 * The ACF template part for displaying Custom HTML.
 *
 * @package COF
 */

?>

<section class="wysiwyg-editor">
	<div class="container">

		<div class="w-full space-y-10">
			<?php
			if ( get_sub_field( 'custom_html_code' ) ) {
				echo get_sub_field( 'custom_html_code' ); // phpcs:ignore
			}
			?>
		</div>

	</div>
</section>
