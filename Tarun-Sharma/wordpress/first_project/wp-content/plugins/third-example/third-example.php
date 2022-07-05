<?php
/*
    known as header 
Plugin Name:  Third Example
Plugin URI:   https://www.wpbeginner.com 
Description:  Third Example of basic plugin Devlopment 
Version:      2.1
Author:       Tarun Sharma
Author URI:   https://www.wpbeginner.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  Third-Example
Domain Path:  /languages
*/

add_action("admin_menu", "third_example_add_menu"); 

function third_example_add_menu() {// adding the menu 
	add_menu_page(
        "third-example.php",
        "Third Example",
        "manage_options",
        "Third-Example-plugin",
        "third_example_function",
        " dashicons-ellipsis",
        6 
    );
}

function third_example_function(){
    ?>
    <h1>User Name Panel</h1>
    <?php
        settings_errors();
    ?>
    <div>
        <form action="options.php" method="post">
            <?php
                // echo admin_url()."options.php";
                settings_fields("section");// provide area for setting fields
                do_settings_sections("plugin-example");// settings provider to store user value
                submit_button();
            ?>
        </form>
    </div>
    <?php
}
// hook called after initalizlation of admin section
add_action("admin_init", "adding_setting_section"); 

function adding_setting_section() {
    // echo "function called function called function called function called ";
    // #step 1: creating area for for field
    add_settings_section("section", "User Form", null, "plugin-example");

    // #step 2: creating setting fields to sotre user value
    add_settings_field("user_name", "User Name", "display_user_name", "plugin-example", "section");

    // #step 3 : registring the setting fields
    register_setting("section", "user_name");
}

function display_user_name() {
    ?>
    <!-- name of the input must be same as id of add_setting_fields -->
    <input type="text" name="user_name" value="<?php echo get_option("user_name"); /* wp function to get value from option table*/?>" id="userName">
    <?php
}

// add_action("admin_notices","information_message");
function information_message() {
    ?>
    <div class="notice notice-info is-dismissible">
        <p>Data get insertd into database</p>
    </div>
<?php
}