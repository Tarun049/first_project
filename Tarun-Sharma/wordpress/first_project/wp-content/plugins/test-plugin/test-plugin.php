<?php
/*
    known as header 
Plugin Name:  Test Plugin
Plugin URI:   https://www.wpbeginner.com 
Description:  A short little description of the plugin. It will be displayed on the Plugins page in WordPress admin area. 
Version:      1.0
Author:       Tarun
Author URI:   https://www.wpbeginner.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  Tarun-test
Domain Path:  /languages
*/

function wpb_follow_us($content)
{

    // Only do this when a single post is displayed

    // Message you want to display after the post
    // Add URLs to your own Twitter and Facebook profiles

    $content .= '<p class="follow-us">If you liked this article, then please follow us on <a href="http://twitter.com/wpbeginner" title="WPBeginner on Twitter" target="_blank" rel="nofollow">Twitter</a> and <a href="https://www.facebook.com/wpbeginner" title="WPBeginner on Facebook" target="_blank" rel="nofollow">Facebook</a>.</p>';


    // Return the content
    return $content;
}
// Hook our function to WordPress the_content filter
add_filter('the_content', 'wpb_follow_us');



function pluginprefix_setup_post_type()
{
    register_post_type('book', array("public" => true, "label" => "book"));// wp function to add post field in admin section
}
add_action('init', 'pluginprefix_setup_post_type');


/**
 * Activate the plugin.
 */
function pluginprefix_activate()
{
    // Trigger our function that registers the custom post type plugin.
    pluginprefix_setup_post_type();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'pluginprefix_activate');

/**
 * Deactivation hook.
 */
function pluginprefix_deactivate()
{
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type('book');
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'pluginprefix_deactivate');