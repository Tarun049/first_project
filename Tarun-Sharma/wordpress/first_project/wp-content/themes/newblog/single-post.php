<?php
get_header();
/**
 * file to show blos list #content below carousel
 */
$post_id = get_the_id();
$args = array(
    'post_type'     => 'post',
    'post_status'   => 'publish',
    'orderby'       => 'date',
    'order'         => 'DESC',
    'p'             => $post_id,
);
$content_query = new WP_Query($args);
?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4><?php echo get_the_title($post_id); ?></h4>
                        <h2>Single blog post</h2>
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
                        if ($content_query->have_posts()) : $content_query->the_post();
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
                                            foreach ((get_the_category()) as $category) {
                                                echo $category->cat_name . ' ';
                                            }
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
                                                <a href="<?php echo get_the_permalink(); ?>">
                                                    <?php echo get_the_author() ?>
                                                </a>
                                            </li>
                                            <li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_date() ?></a></li>
                                            <li><a href="<?php echo get_the_permalink(); ?>"><?php comments_number() ?></a></li>
                                        </ul>
                                        <?php echo get_the_content(); ?>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li>
                                                            <a href="<?php echo get_the_permalink(); ?>">
                                                                <?php
                                                                foreach ((get_the_tags()) as $tags) {
                                                                    echo $tags->name . ' ';
                                                                }
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
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            // get_template_part('comments');
                            endif;
                            ?>
                        <?php
                        // apply_filters("get_post_data", true);
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php
            get_sidebar();
            ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
