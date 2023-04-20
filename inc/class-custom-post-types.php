<?php
/**
 * Register Custom Post Types
 *
 * @package COF
 */

defined( 'WPINC' ) || exit;

/**
 * Main class of Custom Post Types
 */
class Custom_Post_Types {

	/**
	 * The Construct
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'testimonials_custom_post_type' ] );
	}

	/**
	 * Testimonials CPT
	 */
	public function testimonials_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = [
			'name'               => _x( 'Testimonials', 'Post Type General Name', 'cof' ),
			'singular_name'      => _x( 'Testimonial', 'Post Type Singular Name', 'cof' ),
			'menu_name'          => __( 'Testimonials', 'cof' ),
			'parent_item_colon'  => __( 'Parent Testimonial', 'cof' ),
			'all_items'          => __( 'All Testimonials', 'cof' ),
			'view_item'          => __( 'View Testimonial', 'cof' ),
			'add_new_item'       => __( 'Add New Testimonial', 'cof' ),
			'add_new'            => __( 'Add New', 'cof' ),
			'edit_item'          => __( 'Edit Testimonial', 'cof' ),
			'update_item'        => __( 'Update Testimonial', 'cof' ),
			'search_items'       => __( 'Search Testimonial', 'cof' ),
			'not_found'          => __( 'Not Found', 'cof' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'cof' ),
		];

		// Set other options for Custom Post Type.
		$args = [
			'label'               => __( 'Testimonials', 'cof' ),
			'menu_icon'           => 'dashicons-admin-comments',
			'description'         => __( 'Testimonial posts', 'cof' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor.
			'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
			/**
			 * A hierarchical CPT is like Pages and can have
			 * Parent and child items. A non-hierarchical CPT
			 * is like Posts.
			 */
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			// 'show_in_rest'        => true,

		];

		// Registering your Custom Post Type.
		register_post_type( 'testimonials', $args );
	}

}

/**
 * Init
 */
new Custom_Post_Types();
