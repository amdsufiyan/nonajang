<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/amd-sufiyan/nonajang
 * @since             1.0.0
 * @package           Nonajang
 *
 * @wordpress-plugin
 * Plugin Name:       Nonajang
 * Plugin URI:        https://github.com/amd-sufiyan/nonajang
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ahmad Sufiyan
 * Author URI:        https://projects.co.id/public/browse_users/view/bcb916/ahmad-sufiyan
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nonajang
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// If theme is not twentytwenty will doesn work
if( 'twentytwenty' !== get_option( 'template' ) ) {
   return;
 }


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NONAJANG_VERSION', '1.0.0' );
define('NONAJANG_PLUGIN_URL', plugin_dir_url(__FILE__));
define('NONAJANG_PLUGIN_DIR', plugin_dir_path(__FILE__));
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nonajang-activator.php
 */
function activate_nonajang() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nonajang-activator.php';
	Nonajang_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nonajang-deactivator.php
 */
function deactivate_nonajang() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nonajang-deactivator.php';
	Nonajang_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nonajang' );
register_deactivation_hook( __FILE__, 'deactivate_nonajang' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nonajang.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nonajang() {

	$plugin = new Nonajang();
	$plugin->run();

}
run_nonajang();
