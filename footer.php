<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COF
 */

?>
	<?php do_action( 'cof_before_footer' ); ?>

	<?php theme_footer_html(); ?>

</div><!-- #page, .main-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
