<?php
/*
 * Add my new menu to the Admin Control Panel
 */

// Hook the 'admin_menu' action hook, run the function named 'Add_My_Admin_Link()'
add_action( 'admin_menu', 'Add_My_Admin_Link' );
 
// Add a new top level menu link to the ACP
function Add_My_Admin_Link()
{
    add_menu_page(
        'ibrator Plug', // Title of the page
        'Ibrator', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'Plugin_demo/includes/my_first_page.php' // The 'slug' - file to display when clicking the link
    );
}
function nes_general_settings_view () { 
    require_once("views/admin/general_settings.php");
}

function nes_vendor_view () { 
    require_once("views/admin/vendor.php");
}

function nes_vendor_new_view () {
    require_once("views/admin/vendor_new.php");
}

function nes_vendor_edit_view () {

    require_once("views/admin/vendor_edit.php");
}

add_action("admin_menu", function () {
    add_menu_page(
        "Service",  
        "Service",  
        "manage_options",            
        "nes_general_settings",      
        "nes_general_settings_view", 
        null,                        
        4                            
    );

    add_submenu_page( "nes_general_settings", "General Settings", "General Settings", 0, "nes_general_settings", "nes_general_settings_view");      
    add_submenu_page( "nes_general_settings", "Vendors", "Vendors", 0, "nes_vendor", "nes_vendor_view");
    add_submenu_page( "nes_general_settings", "New Vendor", "New Vendor", 0, "nes_vendor_new", "nes_vendor_new_view");
    add_submenu_page( "nes_fake_id", "Edit Vendor", "Edit Vendor", 0, "nes_vendor_edit", "nes_vendor_edit_view");       
});