<?php

/**
 * file contains definition of tables section
 *
 * @link       http://localhost/himDB/wordPressPlugin/wppb/wp-admin/plugins.php?plugin_status=all&paged=1&s
 * @since      1.0.0
 *
 * @package    Save_color
 * @subpackage Save_color/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Save_color
 * @subpackage Save_color/includes
 * @author     BraHim <brahim7khalil@gmail.com>
 */
class Save_color_Tables {


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	
	public function colortable(){
		global $wpdb;
		return $wpdb->prefix."color_table"; //wp_color_table
	}

}
