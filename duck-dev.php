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

		add_filter( 'docu_doc_post_type_args', array( $this, 'docs_slug' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'login_style' ) );
		add_filter( 'login_headertitle', array( $this, 'login_url_title' ) );
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
				background: url(https://cdn.duckdev.com/wp-content/uploads/2016/11/DuckDev-Login.jpg) no-repeat 0 0 #fff !important;;
			}
			#jetpack-sso-wrap a {
				color: #555d66 !important;
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

		return 'Back to ' . get_bloginfo( 'name' );
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
}

new DuckDev_Custom();