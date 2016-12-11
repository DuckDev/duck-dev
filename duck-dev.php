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

		$this->load();
		$this->run();
	}

	/**
	 * Load all dependancies.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function load() {

		require plugin_dir_path( __FILE__ ) . 'includes/class-duckdev-docs.php';
		require plugin_dir_path( __FILE__ ) . 'includes/class-duckdev-login.php';
		require plugin_dir_path( __FILE__ ) . 'includes/class-duckdev-misc.php';
	}
	
	/**
	 * Load all hooks for duckdev.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function run() {

		new DuckDev_Docs();
		new DuckDev_Login();
		new DuckDev_Misc();
	}
	
}

new DuckDev_Custom();
