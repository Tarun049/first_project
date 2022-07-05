<?php
    register_nav_menus(
        array('primary-menu'=>'header-menu')
    );

	// add_action('template_redirect', 'members_only');

	// function members_only() {
	// 	if ( is_page('contact-us') && is_user_logged_in() ) {
	// 		wp_redirect( home_url() );
	// 	}
	// }

	// function wpac_plugin_scripts() {
	// 	wp_enqueue_style( "main-css", get_stylesheet_uri().'/assets/css/main.css',true);
	// }
	// add_action("wp_enqueue_scripts", "wpac_plugin_scripts");

	add_filter("the _content", "change_content");

	function change_content( $content ) {
		$content ="ISRO";
		return $content;
	}