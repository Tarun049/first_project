<?php
    /**
     * Template Name: Mid-Screen
    */ 
    wp_head();
    get_header();    
    $args = array(
        'post_type' => 'book',
    );

    if ( have_posts() ) {
        echo '<ul>';
        while ( have_posts() ) {
         the_post();
            echo '<li> <a href="'.get_the_permalink().'">' . get_the_title() .'</a></li>';
        }
        echo '</ul>';
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    get_footer();
?>
