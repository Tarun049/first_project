<?php
    /**
     * Template Name: Mid-Screen
    */ 
    wp_head();
    get_header();
    $args = array(
        'post_type'     => 'post',
        'category_name' => 'News,Politics,Sports,Treaking',
     );

    $the_query = new WP_Query($args);

    if ( $the_query->have_posts() ) {
        echo '<ul>';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $the_query->the_content();
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
