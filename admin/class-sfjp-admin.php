<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://pootlepress.co.uk
 * @since      1.0.0
 *
 * @package    Storefront_Jetpack
 * @subpackage Storefront_Jetpack/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Storefront_Jetpack
 * @subpackage Storefront_Jetpack/admin
 * @author     PootlePress <nick@pootlepress.co.uk>
 */
class Sfjp_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sfjp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sfjp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sfjp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sfjp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sfjp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sfjp-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Initiates Settings API sections, controls and settings
	 *
	 * @since    1.0.0
	 */
	public function init_settings(){
		// First, we register a section. This is necessary since all future options must belong to one.
		add_settings_section(
			'sfjp_section',
			'Storefront Jetpack',
			array( $this, 'sfjp_section_callback', ),
			'storefront_jetpack'
		);

		// Finally, we register the fields with WordPress
		register_setting(
			'storefront_jetpack',
			'sfjp_mods_enabled'
		);
	}

	/**
	 * Add the settings page
	 *
	 * @since    1.0.0
	 */
	public function settings_page() {
		add_theme_page(
			'Storefront Jetpack',
			'Storefront Jetpack',
			'administrator',
			'storefront_jetpack',
			array( $this, 'sfjp_page_callback', )
		);
	}

	/**
	 * Add the settings page
	 *
	 * @since    1.0.0
	 */
	public function sfjp_page_callback() {
		include 'partials/sfjp-admin-display.php';
	}

	/**
	 * Add the settings page
	 *
	 * @since    1.0.0
	 */
	public function sfjp_section_callback() {}

	/**
	 * Add the settings page
	 *
	 * @since    1.0.0
	 */
	public function modules( $mods ) {
		global $sfjp_modules;

		return array_merge( $mods, $sfjp_modules );
	}

}
