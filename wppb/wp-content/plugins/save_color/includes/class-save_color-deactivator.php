<?php

/**
 * Fired during plugin deactivation
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
class Save_color_Deactivator {

	private $table;
	public function __construct($table_object){
		$this->table = $table_object;
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function deactivate() {
		// dorp table
		global $wpdb;
		$wpdb->query("Drop table IF EXISTS".$this->table->colortable());		
	}
	public function colortable(){
		global $wpdb;
		return $wpdb->prefix."color_table"; //wp_color_table
	}

}
