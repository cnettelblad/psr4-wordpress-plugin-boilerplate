<?php
/**
 * PSR-4 Wordpress Plugin Boilerplate
 *
 * @package           psr4-wp-plugin-boilerplate
 * @author            Carl Nettelbladt
 * @license           MIT
 *
 * @wordpress-plugin
 * Plugin Name:       PSR-4 Wordpress Plugin Boilerplate
 * Plugin URI:        https://github.com/cnettelblad/psr4-wordpress-plugin-boilerplate
 * Description:       A Plugin boilerplate for Wordpress following the PSR-4 convention.
 * Version:           0.0.1
 * Requires PHP:      7.0
 * Author:            Carl Nettelbladt
 * Author URI:        https://carls.app
 * Text Domain:       plugin-slug
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 */

// Setup Autoloading
require_once __DIR__.'/src/php/Vendor/Autoloader.php';

$autoloader = new Plugin\Vendor\Psr4ClassLoader;
$autoloader->addPrefix('Plugin', __DIR__.'/src/php/');
$autoloader->register();

// Run plugin
$plugin = new Plugin\Core(
    plugin_dir_path(__FILE__),
    plugin_url(__FILE__),
    __FILE__,
    '0.0.1'
);
$plugin->init();
