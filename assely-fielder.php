<?php
/*
Plugin Name: Assely Fielder
Plugin URI: http://assely.org/
Description: Fielder is an collection of various custom fields that you can seamlessly use with The Assely framework. A considerable number of fields types allows for shaping your application metadata as much as you like.
Version: 0.1.0
Author: Assely
Author URI: http://assely.org
License: MIT
License URI: https://opensource.org/licenses/MIT
Domain Path: /resources/lang
Text Domain: Fielder
 */

// We need to define Fielder paths
// on the plugin activation.
define('FIELDER_DIR', plugin_dir_path(__FILE__));
define('FIELDER_URI', plugin_dir_url(__FILE__));

// If we have composer vendor directory inside plugin directory,
// that means plugin was installed manually or directly form
// Wordpress plugins repository. We need to autoload him.
if (
    is_dir(__DIR__.'/vendor')
    && ! class_exists('Assely\Fielder\Fielder')
) {
    require __DIR__.'/vendor/autoload.php';
}
