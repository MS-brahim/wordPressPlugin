<?php

/**
 * Fired during plugin activation
 *
 * @link       http://localhost/himDB/wordPressPlugin/wppb/wp-admin/plugins.php?plugin_status=all&paged=1&s
 * @since      1.0.0
 *
 * @package    Save_color
 * @subpackage Save_color/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Save_color
 * @subpackage Save_color/includes
 * @author     BraHim <brahim7khalil@gmail.com>
 */
class Save_color_Activator {

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
	public function activate() {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		// create table
		global $wpdb;
		if(count($wpdb->get_var("Show tables like '".$this->table->colortable()."'"))== 0){
			$sqlQuery = 'CREATE TABLE '.$this->colortable().' (
					id int(11) NOT NULL AUTO_INCREMENT,
					username varchar(255) DEFAULT NULL,
					email int(255) DEFAULT NULL,
					PRIMARY KEY (id)
				) 	ENGINE=InnoDB DEFAULT CHARSET=utf8';
				dbDelta($sqlQuery);
		}
	}

}
