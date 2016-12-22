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

		add_filter( 'wp_footer', array( $this, 'scripts' ) );
		add_filter( 'caldera_forms_render_field_classes', array( $this, 'doc_class' ), 10, 3 );
		add_action( 'wp_head', array( $this, 'styles' ) );
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

		if ( 'fld_8616820' === $field['ID'] ) {
			$classes['field'][] = 'duckdevdocs';
		}

		return $classes;
	}

}
