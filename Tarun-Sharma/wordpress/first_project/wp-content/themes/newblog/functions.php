<?php

/**
 * Action hook to setups basic functions to custom theme
 */
function new_blog_theme()
{
    // enqueue style.css
    wp_enqueue_style('style_css_new_blog', get_stylesheet_uri());

    // enqueing stylesheets
    wp_register_style("new_blog_style1", get_template_directory_uri() . "/assets/css/fontawesome.css", "");
    wp_register_style("new_blog_style2", get_template_directory_uri() . "/assets/css/templatemo-stand-blog.css", "");
    // wp_register_style("new_blog_style3", get_template_directory_uri()."/assets/css/owl.css","");
    wp_register_style("new_blog_style4", get_template_directory_uri() . "/assets/css/owl.css", "");
    wp_register_style("new_blog_style5", get_template_directory_uri() . "/vendor/bootstrap/css/bootstrap.min.css", "");
    wp_enqueue_style("new_blog_style1");
    wp_enqueue_style("new_blog_style2");
    wp_enqueue_style("new_blog_style3");
    wp_enqueue_style("new_blog_style4");
    wp_enqueue_style("new_blog_style5");

    // // enqueing js files
    wp_enqueue_script("new_blog_script2", get_template_directory_uri() . "/assets/js/custom.js", array('jquery'), "");
    wp_enqueue_script("new_blog_script4", get_template_directory_uri() . "/assets/js/owl.js", array('jquery'), "");
    wp_enqueue_script("new_blog_script5", get_template_directory_uri() . "/assets/js/slick.js", array('jquery'), "");
    wp_enqueue_script("new_blog_script3", get_template_directory_uri() . "/assets/js/isotope.js", array('jquery'), "");
    wp_enqueue_script("new_blog_script1", get_template_directory_uri() . "/assets/js/accordions.js", array('jquery'), "");
    // wp_enqueue_script("new_blog_script6", get_template_directory_uri()."/vendor/jquery/jquery.min.js",array('jquery'),"",true);
    // wp_enqueue_script("new_blog_script7", get_template_directory_uri()."/vendor/bootstrap/js/bootstrap.bundle.min.js",array('jquery'),"",true);

}
add_action("wp_enqueue_scripts", "new_blog_theme");

function add_custom_menus()
{
    register_nav_menus(
        array(
            "header_menu" => "primary-menu",
            "footer_menu" => "footer-menu"
        )
    );
}
add_action("after_setup_theme", "add_custom_menus");
/**
 * adding side for new blog Theme
 */

function custom_side_bar_new_blog()
{
    register_sidebar(
        array(
            'name'         => 'New Blog',
            'id'           => 'new-blog-sidebar',
            'description'   => 'This is custom side bar for New Blog Theme',
            'before_title'  => '<h2 class="new-blog-sidebar">',
            'after_title'   => '</h2>',
            'before_widget' => '',
            'after_widget'  => '',
            'show_in_rest'   => true,
        )
    );

    register_sidebar(
        array(
            'name'         => 'New Blog 2',
            'id'           => 'new-blog-sidebar-2',
            'description'   => 'This is custom side bar for New Blog Theme',
            'before_title'  => '<h2 class="new-blog-sidebar-2">',
            'after_title'   => '</h2>',
            'before_widget' => '',
            'after_widget'  => '',
            'show_in_rest'   => true,
        )
    );

    register_sidebar(
        array(
            'name'         => 'New Blog 3',
            'id'           => 'new-blog-sidebar-3',
            'description'   => 'This is custom side bar for New Blog Theme',
            'before_title'  => '<h2 class="new-blog-sidebar-2">',
            'after_title'   => '</h2>',
            'before_widget' => '<li>',
            'after_widget'  => '</li>',
            'show_in_rest'   => true,
        )
    );

    register_sidebar(
        array(
            'name'         => 'Contact Us',
            'id'           => 'new-blog-contact-us',
            'description'   => 'This is custom side bar for New Blog Theme',
            'before_title'  => '<h2 class="new-blog-sidebar-2">',
            'after_title'   => '</h2>',
            'before_widget' => '<li>',
            'after_widget'  => '</li>',
            'show_in_rest'   => true,
        )
    );

    register_sidebar(
        array(
            'name'         => 'Product',
            'id'           => 'new-blog-product',
            'description'   => 'This is custom side bar for New Blog Theme',
            'before_title'  => '<h2 class="new-blog-sidebar-2">',
            'after_title'   => '</h2>',
            'before_widget' => '<li>',
            'after_widget'  => '</li>',
            'show_in_rest'   => true,
        )
    );
}
add_action("widgets_init", "custom_side_bar_new_blog");


add_theme_support('post-thumbnails'); // function to show featured image 
add_theme_support('widgets'); // function to widgets area
add_theme_support( 'woocommerce' ); // for support woo-commerce
add_theme_support( 'elementor' ); // for support woo-commerce

add_image_size('list-thumb', 720, 320, array('center', 'center')); // Hard Crop Mode
add_image_size('featured-thumb', 436, 378, array('center', 'center')); // Soft Crop Mode
add_image_size('featured-blog-entries', 350, 322, array('center', 'center')); // Soft Crop Mode


function wpb_custom_image_sizes($size_names)
{
    $new_sizes = array(
        'list-thumb' => 'List Thumbmail',
        'featured-thumb' => 'Featured Single Post',
        'featured-blog-entries' => 'Featured Blog Entries',
    );
    return array_merge($size_names, $new_sizes);
}
add_filter('image_size_names_choose', 'wpb_custom_image_sizes');
/**
 * hook to add meta box for featured image
 */
add_action("add_meta_boxes", "add_new_blog_meta_box");
function add_new_blog_meta_box()
{
    add_meta_box("featured_post", "Featured Post", "add_post_to_be_featured_fn", "post", "side", "high");
}

//call back funtion of meta box function
function add_post_to_be_featured_fn()
{
    $attr = get_post_meta( get_the_id(), "featured_post");
?>
    <div>
        <label>Featured Post</label>
        <input type="checkbox" name="featured_post" value="checked" <?php print_r($attr[0]);?>>
    </div>
<?php
}
//function to run save_post hook
function save_meta_box_value($post_id)
{
    update_post_meta(// wp function to save data of metabox field
        $post_id,
        'featured_post',
        $_POST['featured_post']
    );
}
add_action("save_post", "save_meta_box_value");

/**
 * hook to include script 
*/
function callback_fn_contact_us() {
    wp_enqueue_script("contact_us", get_template_directory_uri()."/assets/js/contact.js",array('jquery'));
    wp_localize_script("contact_us" ,"ajax_contact", array("ajaxurl" => admin_url("admin-ajax.php")));
}
add_action("wp_enqueue_scripts", "callback_fn_contact_us");

/**
 * hook to handle ajax request
 */

 add_action("wp_ajax_contact_form", "callback_fn_ajax_request");
 add_action("wp_ajax_nopriv_contact_form", "callback_fn_ajax_request");

 function callback_fn_ajax_request() {

    $name = $_POST['name'];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    global $wpdb;
    $wpdb->insert( 'wp_contact_us', array(
        'name'      => $name,
        'email'     => $email,
        'subject'   => $subject,
        'message'   => $message
    ) );
    echo "Data Received";
    die;
}

add_filter("excerpt_length", "callback_fn_post_excerpt");
function callback_fn_post_excerpt($words)
{
    return 25;
}

/**
 * theme customizer
 */

 function testing_custom_theme_customizer( $wp_customize ) {

    //  adding custom pannel
        $wp_customize->add_panel( 'footer', array(
            'title' => __( 'Footer' ),
            'description' => 'New Blog Pannel', // Include html tags such as <p>.
            'priority' => 160, // Mixed with top-level-section hierarchy.
        ) );
    // end of the custom pannel
    
    /*
        adding copyright section 
    */
        // adding section
        $wp_customize->add_section("sec_footer_copyright", array(
            'title'         => 'Copyright',
            'description'   => 'New blog Copyright',
            'panel'         => 'footer',
        ));
        // adding setting(field area)
        $wp_customize->add_setting("set_footer_copyright", array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',   
        ));
        // adding control ( input field)
        $wp_customize->add_control("set_footer_copyright", array(
            'label'         => 'Copyright',
            'descirpiton'   => 'Enter the copyright',
            'section'       => 'sec_footer_copyright',
            'type'          => 'text'
        ));
    // end of copyright section
    
    /*
        adding social link section
    */    
        // adding section
        $wp_customize->add_section("sec_footer_social_links", array(
            'title'         => 'Social Links',
            'description'   => 'New Blog Social Links ',
            'panel'         => 'footer',
        ));

        // adding setting(field area)
        $wp_customize->add_setting("set_social_links_1", array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting("set_social_links_2", array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',   
        ));

        $wp_customize->add_setting("set_social_links_3", array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',   
        ));

        $wp_customize->add_setting("set_social_links_4", array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',   
        ));

        $wp_customize->add_setting("set_social_links_5", array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',   
        ));

        // adding control ( input field)
        $wp_customize->add_control("set_social_links_1", array(
            'label'         => 'Social Link 1',
            'descirpiton'   => 'Please Provide the Social links',
            'section'       => 'sec_footer_social_links',
            'type'          => 'text'
        ));

        $wp_customize->add_control("set_social_links_2", array(
            'label'         => 'Social Link 2',
            'descirpiton'   => 'Please Provide the Social links',
            'section'       => 'sec_footer_social_links',
            'type'          => 'text'
        ));

        $wp_customize->add_control("set_social_links_3", array(
            'label'         => 'Social Link 3',
            'descirpiton'   => 'Please Provide the Social links',
            'section'       => 'sec_footer_social_links',
            'type'          => 'text'
        ));

        $wp_customize->add_control("set_social_links_4", array(
            'label'         => 'Social Link 4',
            'descirpiton'   => 'Please Provide the Social links',
            'section'       => 'sec_footer_social_links',
            'type'          => 'text'
        ));

        $wp_customize->add_control("set_social_links_5", array(
            'label'         => 'Social Link 5',
            'descirpiton'   => 'Please Provide the Social links',
            'section'       => 'sec_footer_social_links',
            'type'          => 'text'
        ));
    // end of social link section
  
 }

 add_action("customize_register", "testing_custom_theme_customizer");
 /** end of theme customizer */

add_action("woocommerce_before_main_content", "open_divs_according_new_blog_theme",6);
function open_divs_according_new_blog_theme() {
    ?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4><?php echo get_the_archive_title(); ?></h4>
                            <h2>Product List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->

    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-lg-8">
                                <span>Stand Blog HTML5 Template</span>
                                <h4>Creative HTML Template For Bloggers!</h4>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-button">
                                    <a href="#" target="_parent">Download Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">    
    <?php
    // echo do_shortcode('[product_categories]');
}

add_action("woocommerce_after_main_content", "closing_divs_according_new_blog_theme",7); 
function closing_divs_according_new_blog_theme() {
    ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </section>
    <?php
}

// Alter shop columns
function wpex_woo_shop_columns( $columns ) {
	return 2;
}
add_filter( 'loop_shop_columns', 'wpex_woo_shop_columns' );

add_filter( "nav_menu_link_attributes", "simple_bootstrap_theme_add_anchor_links",1,3 );
function simple_bootstrap_theme_add_anchor_links( $classes, $item, $args ) {
    $classes['class'] = 'nav-link';
    return $classes;
}


/**
 * action hooks to add custom rewrite rules
 */
function wp_foo_rewrite_rule() {
    add_rewrite_rule(
        'custom-template/([a-z0-9-]+)[/]?$',
        'index.php?custom-page=$matches[1]&custom-post=$matches[2]',
        'top'
    );
    // flush_rewrite_rules();
}
add_action( 'init', 'wp_foo_rewrite_rule' );

function custom_query_var( $vars ) {
    $vars[] = 'custom-page';
    $vars[] = 'custom-post';   
    return $vars;
}
add_filter('query_vars', 'custom_query_var');

add_action( 'template_include', function( $template ) {

    if ( get_query_var( 'custom-page' ) == false || get_query_var( 'custom-page' ) == '' ) {
        return $template;
    }    
    return get_template_directory() . '/template-parts/custom-page.php';

    // if ( get_query_var( 'custom-post' ) == true ) {
    //     echo 'ok custom post';
    // } else {
    //     return get_template_directory() . '/template-parts/custom-post.php';
    // }
} );

/* end of rewrite code */
?>
