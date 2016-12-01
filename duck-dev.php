<?php

/**
 * Plugin Name:     Duck Dev - Custom Functions
 * Plugin URI:      https://duckdev.com
 * Description:     Custom functions form duckdev.com website.
 * Version:         1.0.0
 * Author:          Joel James
 * Author URI:      https://duckdev.com/
 * Donate link:     https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XUVWY8HUBUXY4
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * 
 * @category Core
 * @package  DuckDev
 * @author   Joel James <me@joelsays.com>
 * @license  http://www.gnu.org/licenses/ GNU General Public License
 * @link     https://duckdev.com
 */
// Change 'download' slug to product.
define( 'EDD_SLUG', 'products' );

// If this file is called directly, abort.
defined( 'WPINC' ) or die( 'Hold on, looser!' );

class DuckDev_Custom {

	/**
	 * Initialize the class.
	 *
	 * @return void
	 */
	public function __construct() {

		add_filter( 'docu_doc_post_type_args', array( $this, 'docs_slug' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'login_style' ) );
		add_filter( 'login_headertitle', array( $this, 'login_url_title' ) );
		add_filter( 'edd_download_labels', array( $this, 'change_download_label' ) );
	}

	/**
	 * Customize the login page screen.
	 *
	 * @param string $title Page title.
	 *
	 * @return string
	 */
	public function login_style( $title ) {
		?>
		<style type="text/css">
			#login h1 a, .login h1 a {
				background-image: url(https://cdn.duckdev.com/wp-content/uploads/2016/11/Duck-Dev.png);
				height: 194px;
				background-size: 176px;
				width: 183px;
			}
			#login .button-primary {
				background: #404040;
				border-color: #404040;
				-webkit-box-shadow: 0 1px 0 #000000;
				box-shadow: 0 1px 0 #000000;
				text-shadow: 0 -1px 1px #262626, 1px 0 1px #262626, 0 1px 1px #262626, -1px 0 1px #262626;
			}
			.login #nav a, .login #backtoblog a {
				color: #fff;
			}
			.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
				color: #ffffff;
			}
			body {
				background: url(https://duckdev.com/wp-content/uploads/2016/11/DuckDev-Login-BG-1.jpg) repeat center center fixed !important;
			}
			#jetpack-sso-wrap a {
				color: #555d66 !important;
			}
			#login .button-primary {
				color: #fff !important;
			}
			.login #login_error, .login .message {
				border-left: 4px solid #000;
			}
			a {
				color: #000;
			}
			.login #login_error {
				border-left-color: #000;
			}
		</style>
		<?php

	}

	/**
	 * Change login page logo.
	 *
	 * @return string
	 */
	public function login_url_title( $title ) {

		return __( 'Back to ', 'duck-dev' ) . get_bloginfo( 'name' );
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

		$docu_args['rewrite'] = array( 'slug' => 'docs' );

		return $docu_args;
	}

	/**
	 * Change EDD downloads label to products.
	 *
	 * @return array Array of label.
	 */
	public function change_download_label() {

		$labels = array(
			'name' => _x( 'Products', 'post type general name', 'duck-dev' ),
			'singular_name' => _x( 'Product', 'post type singular name', 'duck-dev' ),
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
			'featured_image' => __( '%1$s Image', 'easy-digital-downloads' ),
			'set_featured_image' => __( 'Set %1$s Image', 'easy-digital-downloads' ),
			'remove_featured_image' => __( 'Remove %1$s Image', 'easy-digital-downloads' ),
			'use_featured_image' => __( 'Use as %1$s Image', 'easy-digital-downloads' ),
		);

		return $labels;
	}

}

new DuckDev_Custom();
