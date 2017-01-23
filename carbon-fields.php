<?php
/**
 * Plugin Name: Carbon Fields
 * Description: WordPress developer-friendly custom fields for post types, taxonomy terms, users, comments, widgets, options, navigation menus and more.
 * Version: 1.5.0.0
 * Author: htmlburger
 * Author URI: https://htmlburger.com/
 * Plugin URI: http://carbonfields.net/
 * License: GPL2
 * Requires at least: 4.0
 * Tested up to: 4.7
 * Text Domain: carbon-fields
 * Domain Path: /languages
 */

use \Carbon_Fields\App;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require( __DIR__ . '/vendor/autoload.php' );
} else {
	function carbon_fields_spl_autoload_register( $class ) {
		$prefix = 'Carbon_Fields';
		if ( stripos( $class, $prefix ) === false ) {
			return;
		}

		$file_path = __DIR__ . '/core/' . str_ireplace( 'Carbon_Fields\\', '', $class ) . '.php';
		$file_path = str_replace( '\\', DIRECTORY_SEPARATOR, $file_path );
		include_once( $file_path );
	}

	spl_autoload_register( 'carbon_fields_spl_autoload_register' );
}

App::boot();
