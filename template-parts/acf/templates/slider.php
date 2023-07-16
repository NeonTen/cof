<?php
/**
 * The ACF template part for displaying Slider.
 *
 * @package COF
 */

if ( ! have_rows( 'add_slides' ) ) {
	return;
}
?>

<section class="w-full max-h-[400px] relative overflow-hidden">
	<div class="container">

		<div class="main-slider">
		<?php
		// Loop through rows.
		while ( have_rows( 'add_slides' ) ) :
			the_row();

			// Load sub field value.
			$small_text = get_sub_field( 'small_text' );
			$heading    = get_sub_field( 'heading' );
			$handwriting = get_sub_field( 'hand_writing_text' );
			$text        = get_sub_field( 'text' );
			$btn        = get_sub_field( 'button' );
			$image1 = get_sub_field( 'image_1' );
			$image2 = get_sub_field( 'image_2' );

			echo '<div><div class="grid grid-cols-2 lg:grid-cols-4 items-center justify-between">';
			if ( $small_text || $heading || $handwriting ) {
				?>
				<div class="caption | col-span-2 w-full h-full grid items-center bg-white/40 lg:bg-light-color px-10 xl:px-20 absolute lg:relative z-30 lg:z-0">
					<div class="grid gap-2">
						<div class="grid">
							<?php
							if ( $small_text ) {
								echo '<span class="w-max text-xs sm:text-sm bg-primary uppercase tracking-widest px-2 py-0.5">' . esc_html( $small_text ) . '</span>';
							}
							if ( $heading ) {
								echo '<h2 class="text-xl sm:text-4xl 3xl:text-5xl font-black uppercase tracking-wider leading-none mt-3">' . esc_html( $heading ) . '</h2>';
							}
							if ( $handwriting ) {
								echo '<h3 class="font-handwritting text-xl sm:text-4xl 3xl:text-80 text-secondary tracking-wider leading-none sm:-mt-8">' . esc_html( $handwriting ) . '</h3>';
							}
							?>
						</div>
						<?php
						if ( $text ) {
							echo '<p class="text-base sm:text-xl sm:text-2xl 2xl:text-[42px] xl:leading-tight">' . wp_kses_post( $text ) . '</p>';
						}
						if ( $btn ) {
							printf(
								'<div class="mt-6"><a href="%s" class="button" target="%s">%s</a></div>',
								esc_url( $btn['url'] ),
								esc_html( $btn['target'] ),
								esc_html( $btn['title'] )
							);
						}
						?>
					</div>
				</div>
				<?php
			}

			if ( $image1 ) {
				echo '<img class="w-full h-full xl:w-[219px] xl:h-[320px] object-cover xl:ml-[50%] 2xl:ml-[60%] 3xl:ml-[75%] 4xl:ml-[90%] xl:shadow-custom relative z-20" src="' . esc_url( $image1 ) . '" alt="Product image 1">';
			}
			if ( $image2 ) {
				echo '<img class="w-full h-full xl:w-[271px] xl:h-[400px] object-cover ml-auto z-10" src="' . esc_url( $image2 ) . '" alt="Product image 2">';
			}

			echo '</div></div>';
		endwhile;
		?>
		</div>

	</div>
</section>
