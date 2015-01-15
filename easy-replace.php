<?php
/*
Plugin Name: Easy Replace
Plugin URI: http://www.think201.com
Description: Easy Replace (ER) helps you find and replace phrases at ease
Author: Think201
Text Domain: easy-replace
Domain Path: /languages
Version: 1.1
Author URI: http://www.think201.com
License: GPL v1

Easy Replace
Copyright (C) 2015, Think201 - think201.com@gmail.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/**
 * @package Main
 */

//start session
if (session_id() == '') {
	session_start();
}

if(version_compare(PHP_VERSION, '5.2', '<' )) 
{
	if (is_admin() && (!defined( 'DOING_AJAX' ) || !DOING_AJAX )) 
	{
		require_once(ABSPATH . 'wp-admin/includes/plugin.php');
		deactivate_plugins( __FILE__ );
		wp_die( sprintf( __( 'Easy Replace requires PHP 5.2 or higher, as does WordPress 3.2 and higher. The plugin has now disabled itself.', 'Easy Replace' ), '<a href="http://wordpress.org/">', '</a>' ));
	} 
	else 
	{
		return;
	}
}

if ( !defined( 'ER_PATH' ) )
define( 'ER_PATH', plugin_dir_path( __FILE__ ) );

if ( !defined( 'ER_BASENAME' ) )
define( 'ER_BASENAME', plugin_basename( __FILE__ ) );

if ( !defined( 'ER_VERSION' ) )
define('ER_VERSION', '1.1' );

if ( !defined( 'ER_PLUGIN_DIR' ) )
define('ER_PLUGIN_DIR', dirname(__FILE__) );

if ( ! defined( 'ER_LOAD_JS' ) )
define( 'ER_LOAD_JS', true );

if ( ! defined( 'ER_LOAD_CSS' ) )
define( 'ER_LOAD_CSS', true );

require_once ER_PLUGIN_DIR .'/includes/er-install.php';
require_once ER_PLUGIN_DIR .'/includes/er-admin.php';
require_once ER_PLUGIN_DIR .'/includes/er.php';
require_once ER_PLUGIN_DIR .'/includes/er-engine.php';

function easy_replace_load_plugin_textdomain() {
    load_plugin_textdomain( 'easy-replace', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'easy_replace_load_plugin_textdomain' );

register_activation_hook( __FILE__, array('ER_Install', 'activate') );
register_deactivation_hook( __FILE__, array('ER_Install', 'deactivate') );
register_uninstall_hook(    __FILE__, array('ER_Install', 'delete') );

add_action( 'plugins_loaded', 'EasyReplaceStart' );

add_filter('the_content', 'er\EREngine::getContent');

function EasyReplaceStart()
{
	$initObj = er\ERAdmin::get_instance();
	$initObj->init();

	$erObj = er\EasyReplace::get_instance();
	$erObj->init();
}

?>