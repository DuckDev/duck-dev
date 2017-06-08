<?php

// If this file is called directly, abort.
defined( 'ABSPATH' ) or exit;

/**
 * Custom class for login page customization.
 *
 * @category   Core
 * @package    DuckDevLogin
 * @subpackage Core
 * @author     Joel James <mail@cjoel.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://duckdev.com/support/docs
 */
class DuckDev_Login {

	/**
	 * Initialize the class.
	 *
	 * @return void
	 */
	public function __construct() {

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
				background: url(https://cdn.duckdev.com/wp-content/uploads/2017/06/DuckDevLogin.jpg) no-repeat center center fixed !important;
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
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

}
