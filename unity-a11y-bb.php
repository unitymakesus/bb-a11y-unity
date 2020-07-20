<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/unitymakesus/unity-a11y-bb
 * @since             1.0.0
 * @package           Unity_A11y_Bb
 *
 * @wordpress-plugin
 * Plugin Name:       Unity Accessible Modules
 * Plugin URI:        https://github.com/unitymakesus/unity-a11y-bb
 * Description:       Custom, accessible modules for our page builder.
 * Version:           1.0.0
 * Author:            Unity Web Agency
 * Author URI:        https://unitywebagency.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       unity-a11y-bb
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'UNITY_A11Y_BB_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-unity-a11y-bb-activator.php
 */
function activate_unity_a11y_bb() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-unity-a11y-bb-activator.php';
    Unity_A11y_Bb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-unity-a11y-bb-deactivator.php
 */
function deactivate_unity_a11y_bb() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-unity-a11y-bb-deactivator.php';
    Unity_A11y_Bb_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_unity_a11y_bb' );
register_deactivation_hook( __FILE__, 'deactivate_unity_a11y_bb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-unity-a11y-bb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_unity_a11y_bb() {

    $plugin = new Unity_A11y_Bb();
    $plugin->run();

}
run_unity_a11y_bb();
