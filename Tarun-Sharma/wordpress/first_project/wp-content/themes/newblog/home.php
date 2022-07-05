<?php
get_header();
$paged = get_query_var('paged') ? get_query_var('paged'): 1;
?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Recent Posts</h4>
                        <h2>Our Recent Blog Entries</h2>
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
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="col-lg-6">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('featured-blog-entries');
                                            } else {
                                            ?>
                                                <img src="<?php get_template_directory_uri() . "/assets/images/blog-thumb-01.jpg" ?>" alt="">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="down-content">
                                            <span>
                                                <?php
                                                echo get_the_category_list(',' ,'');
                                                ?>
                                            </span>
                                            <a href="<?php echo get_the_permalink(); ?>">
                                                <h4><?php the_title() ?></h4>
                                            </a>
                                            <ul class="post-info">
                                                <li>
                                                    <a href="<?php echo esc_attr( get_author_posts_url( get_the_author_meta('ID') ) );?>">
                                                        <?php the_author() ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <?php echo get_the_date(); ?>
                                                    </a>
                                                </li>
                                                <li><a href="#"><?php comments_number() ?></a></li>
                                            </ul>
                                            <p>
                                                <?php
                                                echo get_the_excerpt();
                                                ?>
                                            </p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-lg-12">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        //wp_reset_postdata();
                        ?>
                        <div class="col-lg-12">
                            <ul class="page-numbers">
                                <li> <?php //wp_pagenavi( array( 'query'=> $content_query )); ?> </li>
                                <?php //next_posts_link( );?>
                                <?php //previous_posts_link(); ?>
                                <li>
                                    <?php echo paginate_links(); ?> 
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
