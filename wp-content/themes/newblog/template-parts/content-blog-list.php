<?php

/**
 * file to show blos list #content below carousel
 */
$args = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'orderby'           => 'date',
    'order'             => 'DESC',
    'posts_per_page'    => 3
);
$content_query = new WP_Query($args);
?>

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
                                <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php
                        if ($content_query->have_posts()) : while ($content_query->have_posts()) : $content_query->the_post();
                                // the_content();
                        ?>
                                <div class="col-lg-12" id="<?php echo get_the_ID(); ?>" id1="<?php the_ID(); ?>">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <!--  -->
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('list-thumb');
                                            } else { ?>
                                                <img src="<?php echo get_template_directory_uri() . "/assets/images/blog-post-01.jpg"; ?>" alt="<?php echo get_the_title(); ?>">
                                            <?php }
                                            ?>
                                        </div>
                                        <div class="down-content">
                                            <span>
                                                <?php
                                                echo get_the_category_list(',' ,'');
                                                ?>
                                            </span>
                                            <a href="<?php echo get_the_permalink(); ?>">
                                                <h4>
                                                    <?php
                                                    echo get_the_title();
                                                    ?>
                                                </h4>
                                            </a>
                                            <ul class="post-info">
                                                <li>
                                                    <a href="<?php echo esc_attr( get_author_posts_url( get_the_author_meta('ID') ) );?>">
                                                        <?php the_author() ?>
                                                    </a>
                                                </li>
                                                <li><a href="#"><?php echo get_the_date() ?></a></li>
                                                <li><a href="#"><?php comments_number() ?></a></li>
                                            </ul>
                                            <?php echo get_the_excerpt(); ?>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            <li>
                                                                <a href="<?php echo get_the_permalink(); ?>">
                                                                    <?php
                                                                    echo get_the_tag_list('' ,',','');
                                                                    ?>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul class="post-share">
                                                            <li><i class="fa fa-share-alt"></i></li>
                                                            <li><a href="#">Facebook</a>,</li>
                                                            <li><a href="#"> Twitter</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            // apply_filters("get_post_data", true);
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">View All Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>