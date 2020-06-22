<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://localhost/himDB/wordPressPlugin/wppb/wp-admin/plugins.php?plugin_status=all&paged=1&s
 * @since             1.0.0
 * @package           Save_color
 *
 * @wordpress-plugin
 * Plugin Name:       Save Color
 * Plugin URI:        http://localhost/himDB/wordPressPlugin/wppb/wp-admin/plugins.php?plugin_status=all&paged=1&s
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            BraHim
 * Author URI:        http://localhost/himDB/wordPressPlugin/wppb/wp-admin/plugins.php?plugin_status=all&paged=1&s
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       save_color
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if(!defined("SAVE_COLOR_PLUGIN_DIR"))
define("SAVE_COLOR_PLUGIN_DIR",plugin_dir_path(__FILE__));
if(!defined("SAVE_COLOR_PLUGIN_URL"))
define("SAVE_COLOR_PLUGIN_URL",plugins_url()."/save_color");

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SAVE_COLOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-save_color-activator.php
 */
function activate_save_color_fn() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-save_color-tables.php';
	$tables = new Save_color_Tables();

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-save_color-activator.php';
	$activator = new Save_color_Activator($tables);
	$activator->activate();
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-save_color-deactivator.php
 */
function deactivate_save_color_fn() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-save_color-tables.php';
	$tables = new Save_color_Tables();

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-save_color-deactivator.php';
	$deactivator = new Save_color_Deactivator($tables);
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_save_color_fn' );
register_deactivation_hook( __FILE__, 'deactivate_save_color_fn' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-save_color.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_save_color() {

	$plugin = new Save_color();
	$plugin->run();

}
run_save_color();
