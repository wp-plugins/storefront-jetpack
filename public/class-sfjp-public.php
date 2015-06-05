<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://pootlepress.co.uk
 * @since      1.0.0
 *
 * @package    Storefront_Jetpack
 * @subpackage Storefront_Jetpack/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Storefront_Jetpack
 * @subpackage Storefront_Jetpack/public
 * @author     PootlePress <nick@pootlepress.co.uk>
 */
class Sfjp_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->call_enabled_mods();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sfjp-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sfjp-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Calls the default Storefront Jetpack mods
	 *
	 * @since    1.0.0
	 */
	private function call_enabled_mods() {

		$s = get_option( 'sfjp_mods_enabled', array() );

		foreach ( $s as $mod => $status ) {

			$method_name = 'mod_activation_' . $mod;

			if ( ! empty( $status ) and method_exists( $this, $method_name ) ) {

				$this->$method_name();
			}
		}
	}

	/**
	 * Calls the Align menu right mod
	 *
	 * @since    1.0.0
	 */
	private function mod_activation_align_menu_right(){

		include_once 'mods/sfx-amr/plugin.php';
	}

	/**
	 * Calls Add top bar mod
	 *
	 * @since    1.0.0
	 */
	private function mod_activation_add_top_bar(){

		include_once 'mods/top-bar.php';

	}

	/**
	 * Calls the Remove header search bar mod
	 *
	 * @since    1.0.0
	 */
	private function mod_activation_remove_header_search(){

		add_action( 'init', array( $this, 'remove_header_search' ) );
	}

	/**
	 * Calls the Remove header search bar mod
	 *
	 * @action init
	 * @since    1.0.0
	 */
	public function remove_header_search() {

		remove_action( 'storefront_header', 'storefront_product_search', 	40 );
	}

	/**
	 * Calls the custom logo mod
	 *
	 * @since    1.0.0
	 */
	private function mod_activation_custom_logo(){

		include_once 'mods/custom-logo.php';
	}
}
