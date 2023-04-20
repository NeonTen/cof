<?php
/**
 * Menu Walker.
 *
 * @package COF
 */

defined( 'WPINC' ) || exit;

/**
 * Main class
 */
class COF_Menu_Walker {

	/**
	 * Menu id
	 *
	 * @var $menu_id
	 */
	public $menu_id = '';

	/**
	 * Menu data
	 *
	 * @var $data
	 */
	public $data = [];

	/**
	 * Default constructor.
	 *
	 * @param string $menu_id menu id.
	 */
	public function __construct( $menu_id ) {
		$this->menu_id = $menu_id;
		$cache         = new get_menu_cache( $this->menu_id );
		$this->data    = $cache->data;
	}

	/**
	 * Build the mega menu with one tier drop downs
	 * Needs to be wrapped in a container/nav tag when
	 * output in template
	 *
	 * @param string $loc menu location.
	 *
	 * @return $html
	 */
	public function build_menu( $loc = '' ) {

		global $options;
		global $wp;
		$current_url = home_url( add_query_arg( [], $wp->request ) ) . '/';

		$menu_html = '<ul class="parent | text-text-color flex items-center gap-8 uppercase tracking-widest">';

		if ( 'mobile' === $loc ) {
			$menu_html = '<ul class="flex flex-col space-y-6 mt-6 uppercase tracking-widest">';
		}

		foreach ( $this->data as $link ) {

			$current        = ( $current_url === $link['url'] ) ? true : false;
			$mobile_submenu = 'sub-menu | w-60 gap-3 bg-light-color p-6 absolute top-5 -left-4 hidden group-hover:grid';
			$caret          = '';

			if ( $current && 'mobile' !== $loc ) {
				$classes = 'flex items-center text-secondary gap-2';
			}
			if ( ! $current ) {
				$classes = 'flex items-center hover:text-secondary gap-2 group-hover:text-secondary';
			}
			if ( 'mobile' === $loc ) {
				$classes        = 'flex items-center gap-5 relative';
				$mobile_submenu = 'space-y-5';
			}
			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) && 'mobile' !== $loc ) {
				$caret = '<span class="group-hover:fill-secondary group-hover:-rotate-180 transition-all">' . get_svg( 'icons/carot-down', false ) . '</span>';
			}
			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) && 'mobile' === $loc ) {
				$caret = '<span class="-rotate-180">' . get_svg( 'icons/carot-down', false ) . '</span>';
			}

			$target = '';
			if ( '' !== $link['target'] ) {
				$target = ' target="' . $link['target'] . '" ';
			}

			$menu_html .= '<li class="group relative">';

			$menu_html .= sprintf(
				'<a href="%s" %s class="%s">%s%s</a>',
				$link['url'],
				$target,
				$classes,
				$link['title'],
				$caret
			);

			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) ) {
				$menu_html .= '<ul class="mt-5 ' . $mobile_submenu . '">';
			}

			foreach ( $link['children'] as $child ) {

				$menu_html .= '<li class="group relative">';

				if ( empty( $child['children'] ) ) {
					$menu_html .= sprintf(
						'<a href="%s" %s class="hover:text-secondary">%s</a>',
						$child['url'],
						$target,
						$child['title']
					);
				}

				$menu_html .= '</li>';

			}

			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) ) {
				$menu_html .= '</ul>';
			}

			$menu_html .= '</li>';

		}

		$menu_html .= '</ul>';

		return $menu_html;

	}

}
