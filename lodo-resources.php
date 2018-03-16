<?php
/**
 * Plugin Name:     LodoResources
 * Plugin URI:      http://lodopress.com
 * Description:     Resources Post Type
 * Author:          LodoPress
 * Author URI:      http://lodopress.com
 * Text Domain:     lodo-resources
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Lodo_Resources
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( plugin_dir_path( __FILE__ ) . 'post-types/resources.php' );
