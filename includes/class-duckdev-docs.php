<?php

// If this file is called directly, abort.
defined( 'ABSPATH' ) or exit;

/**
 * Custom class for documentation page.
 *
 * Class that handle all functionality related to support docs
 * page and it's instant search.
 *
 * @category   Core
 * @package    DuckDevDocs
 * @subpackage Core
 * @author     Joel James <mail@cjoel.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://duckdev.com/support/docs
 */
class DuckDev_Docs {

	/**
	 * Initialize the class.
	 *
	 * @return void
	 */
	public function __construct() {

		//add_filter( 'wp_footer', array( $this, 'scripts' ) );
		add_filter( 'caldera_forms_render_field_classes', array( $this, 'doc_class' ), 10, 3 );
		//add_action( 'wp_head', array( $this, 'styles' ) );
		add_shortcode( 'ddd_searchbox', array( $this, 'search_box' ) );
	}

	/**
	 * Custom scripts for instant search.
	 *
	 * Custom scripts required to integrate agolia
	 * instant search into docs.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function scripts() {

		if ('https://duckdev.com/support' === get_site_url()) { ?>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.js" defer></script>
			<script type="text/javascript">
				window.onload = function() {
					docsearch({
						apiKey: 'c92d9543f67766248d3fe1ee9f714640',
						indexName: 'duckdev',
						inputSelector: '.duckdevdocs',
						debug: false
					});
				}
			</script>
		<?php }
	}

	/**
	 * Custom stylesheet for instant search.
	 *
	 * Custom stylesheet for Agolia instant search
	 * autocomplete field results.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function styles() {

		if ('https://duckdev.com/support' === get_site_url()) { ?>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css" />
		<?php }
	}

	/**
	 * Add doc autocomplete class to field.
	 *
	 * Add autocomplete class to the form field to get auto
	 * suggestions when user types thier issues.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return array
	 */
	public function doc_class( $classes, $field ) {

		// Search textbox field.
		if ( 'fld_4982800' === $field['ID'] ) {
			$classes['field'][] = 'duckdevdocs';
		}

		return $classes;
	}

	/**
	 * Custom search form shortcode.
	 *
	 * Load docu search form as shortcode.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return file
	 */
	public function search_box() {

		ob_start();

		// Only if class available.
		if ( class_exists( 'DOCU_Template_Loader' ) ) {
			$template = new DOCU_Template_Loader;
			$template->get_template_part( 'docu-search-form' );
		}

		return ob_get_clean();
	}

}
