<?php
/*
Plugin Name: Tag or Category term_group order
Plugin URI: http://ravidreams.com/wordpress-plugins
Description: To sort categories or tags based on groups.
Version: 0.1
Author: Logesh Kumar
Author URI: https://ravidreams.com/about/
Attribution: Based on http://wordpress.org/extend/plugins/term-menu-order/ by http://profiles.wordpress.org/users/jameslafferty/
License: License: GPLv2 or later
*/

/*  

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
* Set up the autoloader.
*/

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . '/lib/'));

spl_autoload_extensions('.class.php');

if (! function_exists('buffered_autoloader')) {
	
	function buffered_autoloader ($c) {

		try {
		
			spl_autoload($c);
			
		} catch (Exception $e) {
			
			$message = $e->getMessage();
			
			return $message;
			
		}
		

	}
	
}

spl_autoload_register('buffered_autoloader');

/**
 * Get the plugin object. All the bookkeeping and other setup stuff happens here.
 */

$tctgo_plugin = TCTGO_Plugin::get_instance();

?>