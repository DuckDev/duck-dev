<?php

// If this file is called directly, abort.
defined( 'ABSPATH' ) or exit;

/**
 * Misc functionality for duckdev.
 *
 * @category   Core
 * @package    DuckDevMisc
 * @subpackage Core
 * @author     Joel James <mail@cjoel.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://duckdev.com/
 */
class DuckDev_Misc {

	/**
	 * Initialize the class.
	 *
	 * @return void
	 */
	public function __construct() {

		add_filter( 'docu_doc_post_type_args', array( $this, 'docs_slug' ) );
		add_filter( 'edd_download_labels', array( $this, 'change_download_label' ) );
		add_filter( 'edd_default_downloads_name', array( $this, 'change_download_names' ) );
	}

	/**
	 * Change url slug for docs.
	 *
	 * Change the default url slug "doc" of docu docs
	 * links to "documentation"
	 *
	 * @param array $docu_args Docu arguments.
	 *
	 * @return string
	 */
	function docs_slug( $docu_args ) {

		if ('https://duckdev.com/support' === get_site_url()) {

			$docu_args['rewrite'] = array( 'slug' => 'docs' );
		}

		return $docu_args;
	}

	/**
	 * Change EDD downloads label to products.
	 *
	 * @return array Array of label.
	 */
	public function change_download_label( $labels ) {

		if ('https://duckdev.com' === get_site_url()) {

			$labels = array(
				'name' => _x( 'Products', 'post type general name', 'duck-dev' ),
				'singular_name' => _x( 'Product', 'post type singular name', 'duck-dev' ),
				'name' => _x( 'Products', 'post type general name', 'duck-dev' ),
				'add_new' => __( 'Add New', 'duck-dev' ),
				'add_new_item' => __( 'Add New Product', 'duck-dev' ),
				'edit_item' => __( 'Edit Product', 'duck-dev' ),
				'new_item' => __( 'New Product', 'duck-dev' ),
				'all_items' => __( 'All Products', 'duck-dev' ),
				'view_item' => __( 'View Product', 'duck-dev' ),
				'search_items' => __( 'Search Products', 'duck-dev' ),
				'not_found' => __( 'No Products found', 'duck-dev' ),
				'not_found_in_trash' => __( 'No Products found in Trash', 'duck-dev' ),
				'parent_item_colon' => '',
				'menu_name' => __( 'Products', 'duck-dev' ),
				'featured_image' => __( '%1$s Image', 'duck-dev' ),
				'set_featured_image' => __( 'Set %1$s Image', 'duck-dev' ),
				'remove_featured_image' => __( 'Remove %1$s Image', 'duck-dev' ),
				'use_featured_image' => __( 'Use as %1$s Image', 'duck-dev' ),
			);
		}

		return $labels;
	}

	/**
	 * Change EDD downloads names to products.
	 *
	 * @return array Array of names.
	 */
	public function change_download_names( $defaults ) {

		if ('https://duckdev.com' === get_site_url()) {

			$defaults = array(
				'singular' => __( 'Product', 'duck-dev' ),
				'plural'   => __( 'Products','duck-dev' )
			);
		}

		return $defaults;
	}

}
