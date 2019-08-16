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
$autoloaderPath = sprintf(
    '%1$s%2$ssrc%2$sphp%2$sVendor%2$sAutoloader.php',
    __DIR__,
    DIRECTORY_SEPARATOR
);
require_once $autoloaderPath;

$autoloader = new Plugin\Vendor\Autoloader;
$autoloader->addPrefix(
    'Plugin',
    sprintf(
        '%1$s%2$ssrc%1$sphp%1$s',
        __DIR__,
        DIRECTORY_SEPARATOR
    )
);
$autoloader->register();

// Run plugin
$plugin = new Plugin\Core(new Plugin\PluginInfo(__FILE__));
$plugin->init();
