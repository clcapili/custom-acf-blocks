<?php
/**
 * Plugin Name:       Custom ACF Blocks
 * Description:       A library of custom ACF Blocks.
 * Requires at least: 6.4
 * Requires PHP:      7.4
 * Version:           1.0
 * Author:            Charlene Capili
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-acf-blocks
 *
 * @package           custom-acf-blocks
 */

// Define our handy constants.
define( 'CUSTOM_ACF_BLOCKS_VERSION', '1.0' );
define( 'CUSTOM_ACF_BLOCKS_PLUGIN_DIR', __DIR__ );
define( 'CUSTOM_ACF_BLOCKS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CUSTOM_ACF_BLOCKS_PLUGIN_BLOCKS', CUSTOM_ACF_BLOCKS_PLUGIN_DIR . '/blocks/' );

// Set custom load & save JSON points for ACF sync.
require 'includes/acf-json.php';
// Register blocks and other handy ACF Block helpers.
require 'includes/acf-blocks.php';
// Restrict access to ACF Admin screens.
require 'includes/acf-restrict-access.php';
