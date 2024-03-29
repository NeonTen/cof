<?php
/**
 * The template for displaying search form.
 *
 * @package COF
 */

?>

<form id="searchform" class="search-form flex justify-between items-center" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" accept-charset="utf-8">
	<input type="text" class="search-input | w-full text-lg border-none focus:border-none focus:outline-none focus:ring-0 bg-transparent px-0" name="s" autocomplete="off" placeholder="Search here..." value="<?php echo get_search_query(); ?>">
	<input type="hidden" name="post_type" value="product" />
	<button class="search-submit text-text-color" type="submit"><?php get_svg( 'icons/search' ); ?></button>
</form>
