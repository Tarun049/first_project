<?php

add_action("after_setup_theme", "custom_theme_test_one");// hook called after theme get setup
function custom_theme_test_one()
{

    add_theme_support('post-thumbnails'); // function to show featured image section
}

function twentytwenty_register_styles()
{
    //enqueue script to include style.css 
    wp_enqueue_style('custom-theme-test-one', get_stylesheet_uri());

    //enqueue style using directly without registration
    wp_enqueue_style("custom-style-test-one", get_template_directory_uri() . "/css/custom-style.css");



    //adding custom script for registration
    wp_enqueue_script("custom-script-test-one", get_template_directory_uri() . "/js/custom-script.js", array('jquery'));
    wp_localize_script('custom-script-test-one', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    // wp_enqueue_script("custom-script-test-one");

    //adding custom script for login
    wp_register_script("custom-login-script-test-one", get_template_directory_uri() . "/js/custom-login-script.js", array('jquery'));
    wp_enqueue_script("custom-login-script-test-one");
}
// hook for adding the custom script 
add_action('wp_enqueue_scripts', 'twentytwenty_register_styles');

//add action for register user through ajax
add_action('wp_ajax_custom_registration', 'fun_custom_registration');
add_action('wp_ajax_nopriv_custom_registration', 'fun_custom_registration');

function fun_custom_registration()
{
    // print_r( $_REQUEST );
    $email = $_REQUEST['emailAjax'];
    $name = $_REQUEST['nameAjax'];
    $password = $_REQUEST['passwordAjax'];
    $userdata = array(
        'user_email'            => $email,
        'user_nicename'         => $name,
        'user_pass'             => $password,
        'user_login'            => $name,
        'user_url'              => "http://192.168.168.31/new_22/tarun/project/",
        'role'                  => 'subscriber'
    );
    $user_id = wp_insert_user($userdata); // function to insert the data into user table
    // On success.
    if (!is_wp_error($user_id)) {
        echo "User created : " . $user_id;
    } else {
        echo "User Not Created";
    }

    die;
}

// add action for login through ajax
add_action('wp_ajax_custom_login', 'fun_custom_login');
add_action('wp_ajax_nopriv_custom_login', 'fun_custom_login');

function fun_custom_login()
{
    $email = $_REQUEST['emailAjax'];
    $password = $_REQUEST['passwordAjax'];

    $credentials = array(
        'user_login'    => $email,
        'user_password' => $password,
        'remember'      => true
    );
    $user = wp_signon($credentials, false); // function to check while user_login
    if (empty($email) && empty($password)) {
        echo "please provide email and passowrd";
    } else {
        if (is_wp_error($user)) {
            echo $user->get_error_message();
        } else {
            echo "login success!";
        }
    }
    die;
}

function add_custom_menus()
{
    register_nav_menus(
        array('primary-menu' => 'header-menu')
    );
    add_theme_support("widgets");// function to show widgets section in admin dashboard
}

add_action("after_setup_theme", "add_custom_menus");


// adding custom side bar
function adding_custom_side_bars()
{
    register_sidebar( // function to show side bar in widgets section
        array(
            'id'            => 'custom-sidebar-1',
            'name'          => 'Custom Sidebar Test-one',
            'description'   => 'This is custom side bar for test-one theme',
            'before_title'  => '<h2 class="Sidebar-Test-one">',
            'after_title'   => '</h2>',
            'before_widget' => '<div class="widget"><div class="widget-content">',
            'after_widget'  => '</div></div>',
        )
    );
}
// hook to call function to register sidebar
add_action("widgets_init", "adding_custom_side_bars");

// register post type all parameters
add_action("init", "post_type_params_test");

function post_type_params_test()
{
    $labels = array(
        'name'                  => _x('Books', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Book', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Books', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Book', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add Book', 'textdomain'),
        'add_new_item'          => __('Add New Book', 'textdomain'),
        'new_item'              => __('New Book', 'textdomain'),
        'edit_item'             => __('Edit Book', 'textdomain'),
        'view_item'             => __('View Book', 'textdomain'),
        'all_items'             => __('All Books', 'textdomain'),
        'search_items'          => __('Search Books', 'textdomain'),
        'parent_item_colon'     => __('Parent Books:', 'textdomain'),
        'not_found'             => __('No books found.', 'textdomain'),
        'not_found_in_trash'    => __('No books found in Trash.', 'textdomain'),
        'featured_image'        => _x('Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list'            => _x('Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,                        // showing the names in different places
        'description'        => 'Exploring Register post type', // short discription about post
        'menu_icon'          => 'dashicons-book',               // menu icon
        'rewrite'            => array('slug' => 'books'),       // customize the permastructure according to slug
        'capability_type'    => 'post',                         //capibility to edit, delete,read ect default #post
        'public'             => true,                           // visible to all
        'show_ui'            => true,                           // accessable to admin default $public 
        'show_in_menu'       => true,                           // to show post in admin menu #must be true :-show_ui
        'menu_position'      => 5,                              // sets the position of menu 
        'has_archive'        => true,                           // if post type is archive so generate archive slug and rewrite the rules
        'show_in_rest'       => true,                           // allow to access by rest api
        'hierarchical'       => false,                          // true to make the post hierarchical
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'), // adding core featuers
        'publicly_queryable' => true,
        'query_var'          => true
    );
    register_post_type("book", $args);// function to add post field in admin menu
}

// creating custom taxanomy
add_action("init", "add_custom_taxanmoy");

function add_custom_taxanmoy()
{
    $labels = array(
        'name'              => _x('Genres', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Genre', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Genres', 'textdomain'),
        'all_items'         => __('All Genres', 'textdomain'),
        'parent_item'       => __('Parent Genre', 'textdomain'),
        'parent_item_colon' => __('Parent Genre:', 'textdomain'),
        'edit_item'         => __('Edit Genre', 'textdomain'),
        'update_item'       => __('Update Genre', 'textdomain'),
        'add_new_item'      => __('Add New Genre', 'textdomain'),
        'new_item_name'     => __('New Genre Name', 'textdomain'),
        'menu_name'         => __('Genre', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'genre-new'),
        'show_in_rest'      => true,
    );

    register_taxonomy("genre", 'book', $args);// function to add custom taxonomy

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name'              => _x('Tags', 'taxonomy general name'),
        'singular_name'     => _x('Tags', 'taxonomy singular name'),
        'search_items'      => __('Search Genres'),
        'all_items'         => __('All Tags'),
        'parent_item'       => __('Parent Tags'),
        'parent_item_colon' => __('Parent Tags:'),
        'edit_item'         => __('Edit Tags'),
        'update_item'       => __('Update Tags'),
        'add_new_item'      => __('Add New Tags'),
        'new_item_name'     => __('New Tags Name'),
        'menu_name'         => __('Tags'),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'Tags'),
    );

    register_taxonomy('Tags', array('book'), $args); // function to add custom taxonomy
}

/**  
 * adding  new-meta box
 */
// hook to call function to add meta box
add_action("add_meta_boxes", "add_new_meta_box");

function add_new_meta_box() {
    // function to add meta box
    add_meta_box("user_name", "User Name", "user_name_input_fn", "book", "", "default");
}

// calling callback function of new-meta box
function user_name_input_fn() {
    ?>
        <label for="">User Name</label>
        <input type="text" name="user_name" placeholder="Enter User Name" id="user_name">
    <?php
}

// hook to save data of meta box
add_action("save_post", "save_user_name_met_box");
function save_user_name_met_box( $post_id ) {
    if ( array_key_exists( 'user_name', $_POST ) ) {
        update_post_meta(// wp function to save data of metabox field
            $post_id,
            'user_name',
            $_POST['user_name']
        );
    }
}
/**  end of new-meta box*/


/**
 * Register a custom menu page.
 */

// hook to call function to add menu in admin section
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

function wpdocs_register_my_custom_menu_page() {
    add_menu_page( // function to add menu page in admin menu
        __( 'Custom Menu Title', 'textdomain' ),// page title
        'Custom menu',                          // menu title
        'manage_options',                       // capabilities
        'my_custom_menu',                       // menu slug
        'custom_menu_fn',                       // call back function
        '',                                     // icon url
        6                                       // position
    );
    add_action( 'admin_init', 'register_setting_custom_menu' );
}

function register_setting_custom_menu() {
	//register our settings and its data
	register_setting( 'my-custom-form-gruop', 'custom_user_name' );
	register_setting( 'my-custom-form-gruop', 'custom_user_email' );
	register_setting( 'my-custom-form-gruop', 'custom_user_passsword' );
}

// call-back funtion of add_menu_page #custom_menu
function custom_menu_fn() {
    ?>
         <div class="wrap">
            <h1>User Data Form</h1>
            <?php 
                // $test = 1234;
                // $test2 = 'custom text';
                // echo absint($test);
                // echo sanitize_text_field($test);

                // echo absint($test2);
                // echo sanitize_text_field($test2);
            ?>
            <form method="post" action="options.php">
                <?php
                    settings_fields( 'my-custom-form-gruop' );
                    do_settings_sections( 'my-custom-form-gruop' );
                ?>
                <table class="form-table">
                    <!-- input field #1 -->
                    <tr valign="top">
                        <th scope="row">Name</th>
                        <td>
                            <input type="text" name="custom_user_name" id="name" placeholder="Enter Name" value="<?php echo get_option("custom_user_name");?>">
                        </td>
                    </tr>

                    <!-- input field #2 -->
                    <tr valign="top">
                        <th scope="row">E-mail</th>
                        <td>
                            <input type="text" name="custom_user_email" id="email" placeholder="Enter E-mail" value="<?php echo get_option("custom_user_email");?>">
                        </td>
                    </tr>

                    <!-- input field #3 -->
                    <tr valign="top">
                        <th scope="row">Password</th>
                        <td>
                            <input type="password" name="custom_user_passsword" id="Password" placeholder="Password" value="<?php echo get_option("custom_user_passsword");?>">           
                        </td>
                    </tr>

                </table>   
                <?php submit_button(); ?>
            </form> 
        </div>
    <?php
}


// second example

class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'My Settings', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h1>My Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(// Registers the setting field and its data
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  

        add_settings_field(
            'id_number', // ID
            'ID Number', // Title 
            array( $this, 'id_number_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="my_option_name[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
            // #esc_attr() escape html attributes
        );
    }
}

if( is_admin() ) {
    $my_settings_page = new MySettingsPage();
}

// third example

add_action("admin_menu", "third_example_fn");

function third_example_fn() {
    // This page will be under "Settings"
    add_menu_page(
        'Third Ecample', 
        'Third', 
        'manage_options', 
        'third-example-custom', 
        'create_registration_form'
    );
}
function create_registration_form() {
   // Set class property
//    $options = get_option( '' );
   ?>
   <div class="wrap">
       <h1>Registration Form</h1>
       <form method="post" action="options.php">
       <?php
           // This prints out all hidden setting fields
           settings_fields( '' );
           do_settings_sections( '' );
           submit_button();
       ?>
       </form>
   </div>
   <?php
}

add_action( 'admin_init', 'custom_page_init' );

function custom_page_init() {
    add_settings_section("reg_custom", "Registration", "Registration_custom_fn", "registration");

    add_settings_field("reg_user_id", "User Id", "user_id_call_back", "registration", "reg_custom");

    add_settings_field("reg_user_name", "User name", "user_name_call_back", "registration", "reg_custom");

    register_setting("reg_custom_group", "reg_custom_name");
}

function user_id_call_back(){
    ?>
    <?php
}
function user_name_call_back(){
    ?>
    <?php
}