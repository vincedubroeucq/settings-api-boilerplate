<?php
/**
 * Plugin Name:       Settings Boilerplate
 * Description:       A simple boilerplate for a settings page
 * Version:           1.0
 * Author:            Vincent Dubroeucq
 * Author URI:        https://vincentdubroeucq.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       settings-boilerplate
 * Domain Path:       languages/
 */
defined( 'ABSPATH' ) || die();


add_action( 'init', 'settings_boilerplate_load_textdomain' );
/**
 * Load translations
 */
function settings_boilerplate_load_textdomain() {
    load_plugin_textdomain( 'settings-boilerplate', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

include 'inc/admin-menu.php';
include 'inc/single-setting.php';
include 'inc/multiple-settings.php';

