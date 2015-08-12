<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              peeller.com
 * @since             1.0.0
 * @package           Peeller_Dynamic_Content
 *
 * @wordpress-plugin
 * Plugin Name:       peeller
 * Plugin URI:        peeller.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            cheli kirshanbaum
 * Author URI:        peeller.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       peeller-dynamic-content
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-peeller-dynamic-content-activator.php
 */
function activate_peeller_dynamic_content() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-peeller-dynamic-content-activator.php';
	Peeller_Dynamic_Content_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-peeller-dynamic-content-deactivator.php
 */
function deactivate_peeller_dynamic_content() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-peeller-dynamic-content-deactivator.php';
	Peeller_Dynamic_Content_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_peeller_dynamic_content' );
register_deactivation_hook( __FILE__, 'deactivate_peeller_dynamic_content' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-peeller-dynamic-content.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_peeller_dynamic_content() {

	$plugin = new Peeller_Dynamic_Content();
	$plugin->run();

}
run_peeller_dynamic_content();
