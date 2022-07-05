<?php
/*
    known as header 
Plugin Name:  Second Example
Plugin URI:   https://www.wpbeginner.com 
Description: Second Example of basic plugin Devlopment 
Version:      2.1
Author:       Tarun Sharma
Author URI:   https://www.wpbeginner.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  Second-Example
Domain Path:  /languages
*/


add_action("wp_footer", "mfp_Add_Text");
// Hook the 'wp_head' action, run the function named 'mfp_Remove_Text()'
function mfp_Add_Text()
{
    echo "<p>After the footer is loaded, my text is added!</p>";
}

//hook to replace the contant of the post
add_filter("the_content", "mfp_Fix_Text_Spacing");
// Automatically correct double spaces from any post
function mfp_Fix_Text_Spacing($the_Post)
{
    $the_New_Post = str_replace("Nature", "Apple", $the_Post);
    return $the_New_Post;
}


//hook to remove filter of adding text
// add_action("wp_head", "mfp_Remove_Text");
function mfp_Remove_Text()
{
    // Target the 'wp_footer' action, remove the 'mfp_Add_Text' function from it
    remove_action("wp_footer", "mfp_Add_Text");
}

// Hook the get_the_excerpt filter hook, run the function named mfp_Add_Text_To_Excerpt
add_filter("get_the_excerpt", "mfp_Add_Text_To_Excerpt");
// Take the excerpt, add some text before it, and return the new excerpt
function mfp_Add_Text_To_Excerpt($old_Excerpt)
{
    $new_Excerpt = $old_Excerpt."<br> <b>This is Updated Excerpt for this post </b>";
    return $new_Excerpt;
    
}

// pending
add_action('init', 'remove_My_Meta_Tags');
// Remove the 'add_My_Meta_Tags' function from the wp_head action hook
function remove_My_Meta_Tags()
{
    remove_action('wp_head', 'add_My_Meta_Tags');
}
