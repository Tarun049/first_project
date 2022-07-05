<?php
    /*
     * Plugin Name: OWT WP Hooks
     * Description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the     industry's standard dummy text ever since the 1500.
     * Author: Owt Hooks
     * Version: 1.1
     * Author URI: #
    */

    // example of init hook
    function owt_wp_init() {
        $args = array(
            'public'    => true,
            'label'     => 'OWT Hooks'
        );
        register_post_type( 'owt_hook', $args );
    }
    add_action( "init", "owt_wp_init" );

    // example of widget_init
    function owt_register_sidebar() {
        register_sidebar( array(
            'name'          => __( 'OWT sidebar' ),
            'id'            => 'owt-sidebar-1',
            'description'   => __( 'This is example of owt sidebar' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>'
        ));
    }
    // add_action( "widgets_init", "owt_register_sidebar" );

    // addmin menu on admin side using admin_menu hook
    function owt_custom_menu() {
        add_menu_page("OWT_Playlist", "OWT_Playlist", "manage_options", "owt-playlist", "owt_playlist_fn");
        add_submenu_page("owt-playlist", "Submenu 1", "submenu 1", "manage_options", "submenu-1", "owt_submenu_fn");
    }

    //callback function of add_menu_page
    function owt_playlist_fn() {
        echo "This is our admin menu page";
    }

    //callback function of add_submenu_page
    function owt_submenu_fn() {
        echo "This is our admin submenu page";
    }
    add_action( "admin_menu", "owt_custom_menu" );

    //function to add css and js file to admin side
    function owt_add_assets_to_admin() {
        // wp_enqueue_script("owt-js", plugin_dir_url(__FILE__)."assets/js/owt-admin.js");
        // wp_enqueue_style("owt-css", plugin_dir_url(__FILE__)."assets/css/owt-admin.css");
    }
    add_action( "admin_enqueue_scripts", "owt_add_assets_to_admin" );

    //function to add custom admin_bar_menu
    function owt_custom_bar_menu( $wp_admin_bar ) {
        $args = array(
            "id"=>"owt-blog",
            "title"=>"online web tutor",
            "href"=>"http://192.168.168.31:8080/new_22/tarun/wordpress/first_project/blog-page/",
            "meta"=>array(
                "class"=>"owt-custom-blog"
            )
        );
        $wp_admin_bar->add_node( $args );
    }
    add_action("admin_bar_menu", "owt_custom_bar_menu", 999);

    //function to admin_notices hook
    function owt_admin_notice() {
        ?>
        <div class="notice notice-error is-dismissible">
            <p>This is error message of Admin Panel</p>
        </div>
        <div class="notice notice-success">
            <p>This is success message of Admin Panel</p>
        </div>
        <div class="notice notice-warning">
            <p>This is warning message of Admin Panel</p>
        </div>
        <div class="notice notice-info">
            <p>This is info message of Admin Panel</p>
        </div>
        <?php
    }
    // add_action( "admin_notices", "owt_admin_notice" );

    //function to add meta boxes
    function owt_make_meta_boxes () {
        add_meta_box( "owt-mxb", "OWT Custom Box", "owt_mbx_fn", "post", "side", "high" );
    }

    //call back funtion of meta box function
    function owt_mbx_fn() {
        echo "This is custom meta box";
        ?>
        <div>
            <label>Feedback</label>
            <input type="text" name="owt_mxb_name" placeholder="Feedback">
        </div>
        <?php
    }
    add_action( "add_meta_boxes", "owt_make_meta_boxes" );

    //function to run save_post hook
    function owt_save_meta_box_value( $post_id ) {
        $owt_mxb_name = isset( $_REQUEST['owt_mxb_name'] )?trim( $_REQUEST['owt_mxb_name']):"";
    }
    // add_action( "save_post", "owt_save_meta_box_value" );
?>