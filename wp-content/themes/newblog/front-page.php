<?php
get_header();

if ( have_posts() && is_front_page() ) :
// the_content();

get_template_part( 'template-parts/content-blog-carousel' );
get_template_part( 'template-parts/content-blog-list' );

endif;
get_footer();
