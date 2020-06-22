<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://localhost/himDB/wordPressPlugin/wppb/wp-admin/plugins.php?plugin_status=all&paged=1&s
 * @since      1.0.0
 *
 * @package    Save_color
 * @subpackage Save_color/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Save_color
 * @subpackage Save_color/admin
 * @author     BraHim <brahim7khalil@gmail.com>
 */
class Save_color_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Save_color_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Save_color_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/save_color-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Save_color_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Save_color_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/save_color-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function color_menus_sections(){
		global $wpdb;
		add_menu_page("Color Playlists","Color Playlists","manage_options","color-menus",array($this,"color_playlists"),"dashicons-dashboard
		",30);
		add_submenu_page("color-menus","All Playlists","All Playlists","manage_options","color-menus",array($this,"color_playlists"));
		add_submenu_page("color-menus","Add playlists","Add playlists","manage_options","color-add-playlist",array($this,"color_add_playlist"));
	}

	public function color_playlists(){
		include_once SAVE_COLOR_PLUGIN_DIR.'/admin/partials/color-menu-all-playlist.php';
	}
	public function color_add_playlist(){
		include_once SAVE_COLOR_PLUGIN_DIR.'/admin/partials/color-menu-add-playlist.php';
	}

}
