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

// If this file is called directly, abort.
defined( 'WPINC' ) or die('Hold on, looser!');

class DuckDev_Custom {

	/**
	 * Initialize the class.
	 *
	 * @return void
	 */
	public function __construct() {

		add_filter( 'the_title', array( $this, 'the_title' ) );
	}

	/**
	 * Do not show title on specific page.
	 *
	 * @param string $title Page title.
	 *
	 * @return string
	 */
	public function the_title( $title ) {

		// Do not show on front page.
		if ( is_home() || is_front_page() ) {
			return '';
		}

		return $title;
	}
}

new DuckDev_Custom();