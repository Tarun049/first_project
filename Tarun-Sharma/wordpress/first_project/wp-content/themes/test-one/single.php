<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php the_content(); ?>
    <div class="entry-links"><?php wp_link_pages(); ?></div>
<?php
else : echo "no data in single page";
endif;  ?>
<?php get_footer(); ?>