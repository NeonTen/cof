<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COF
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="main-content w-full max-w-full">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cof' ); ?></a>

	<?php
	/**
	 * Add content before header.
	 *
	 * @hooked get_before_header - 10
	 * (outputs Notification with BG)
	 */
	do_action( 'cof_before_header' );
	?>

	<?php theme_header_html(); ?>

	<?php
	/**
	 * Add content after header.
	 *
	 * @hooked nothing yet.
	 */
	do_action( 'cof_after_header' );
	?>
