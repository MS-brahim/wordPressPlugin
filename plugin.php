<?php
/*
Plugin Name: My Plugin
Plugin URI: 
Description: First Plugin To insert
Version: 0.1
Author: Himbraa
Author URI: https://wp_plugin.com/wordpress-my-plugins/
License: GPLv2 or later
*/

add_action("admin_menu","addMenu");


function addMenu() {
    add_menu_page( 'MonPlugin', 'MonPlugin', 'read', 'MonPlugin_Dashboard', 'MonPlugin_index' );
    add_submenu_page( 'MonPlugin_Dashboard', 'MonPlugin', 'Settings', 'read', 'MonPlugin_Dashboard', 'MonPlugin_index');
    add_submenu_page( 'MonPlugin_Dashboard', 'MonPlugin', 'info', 'read', 'MonPlugin_NouvellePage', 'MonPlugin_NouvellePage');
}



function MonPlugin_index(){
  // require_once( dirname( dirname( dirname( dirname( __FILE__ )))) . '/wp-load.php' );
  global $wpdb;
  if(isset($_POST['submit'])){
      $option=$_POST['option'];
      $name = $_POST['inputtxt'];
      $email = $_POST['inputarea'];

      $table_name = $wpdb->prefix . "plugin_table";
      $wpdb->insert( $table_name, array(
      'inputtxt' => $name,
      'inputarea' => $email,
      'option'=>$option
      )); 
    echo '
      <div id="message" class="updated below-h2">
       <p>data registred check your info page</p>
      </div>
    ';
}
?>      
<h2 class="mt-4">Configuration-Register some infos</h2> 
 <form class="row" action="" method="post">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" class="form-control" name="inputtxt" id="" aria-describedby="emailHelpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="">discription</label>
      <textarea class="form-control" name="inputarea" id="" cols="30" rows="5"></textarea>
    </div>
    <div class="form-group">
      <select class="w-50" name="option" id="option" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>
    <input type="submit" class="button button-primary mt-5" name="submit" value="save changes"/>
  </div>
</form>

<?php

}


function MonPlugin_NouvellePage(){
    
    
    echo '<h2 class=" mt-4">All Data</h2>';
    
    
    global $wpdb;
    $table_name = $wpdb->prefix . "plugin_table";
    $results = $wpdb->get_results( "SELECT * FROM $table_name"); 
    ?>
   
    <?php
if(!empty($results)) {  
     
    ?>  
    
    <table class="table w-75">
        <thead >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody  id="the-list">
    <?php
          
    foreach($results as $row){   
        
        ?>
        <tr>
            <td><?php  echo $row->id ; ?></td>
            <td><?php echo $row->inputtxt ;?></td>
            <td><?php echo $row->inputarea ;?></td>
            <td><?php echo $row->option ;?></td>
        </tr>
     
        <?php
    }
    ?>
    <tbody>
  </table>
<?php
}else{
    echo 'there is no data for now';
}
?>
    
<?php
}
//runs when plugin is activated
register_activation_hook( __FILE__, 'create_table' );

function create_table(){
    global $wpdb;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $table_name = $wpdb->prefix . "plugin_table";  

    $sql = "CREATE TABLE $table_name (
      id int(10) unsigned NOT NULL AUTO_INCREMENT,
      inputtxt varchar(255) NOT NULL,
      inputarea varchar(255) NOT NULL,
      option varchar(5) NOT NULL,
      
      PRIMARY KEY  (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    dbDelta( $sql );
}

// Runs when plugin is desactivated
register_deactivation_hook( __FILE__, 'remove_table' );

function remove_table() {
    global $wpdb;
     $table_name = $wpdb->prefix . 'plugin_table';
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);
     delete_option("my_plugin_db_version");
} 

?>