<?php

/**
 * Plugin Name:       Storefront Jetpack
 * Plugin URI:        http://www.pootlepress.com
 * Description:       A powerful plugin with lots of features for WooThemes Storefront. Go to Appearance > Storefront Jetpack for settings page.
 * Version:           1.0.0
 * Author:            PootlePress
 * Author URI:        http://www.pootlepress.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       storefront-jetpack
 * Domain Path:       /languages
 *
 * @link              http://www.pootlepress.com
 * @since             1.0.0
 * @package           Storefront_Jetpack
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'StorefrontJetpackUrl', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sfjp-activator.php
 */
function activate_sfjp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sfjp-activator.php';
	Sfjp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sfjp-deactivator.php
 */
function deactivate_sfjp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sfjp-deactivator.php';
	Sfjp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sfjp' );
register_deactivation_hook( __FILE__, 'deactivate_sfjp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sfjp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sfjp() {

	$plugin = new Storefront_Jetpack();
	$plugin->run();

}
run_sfjp();
