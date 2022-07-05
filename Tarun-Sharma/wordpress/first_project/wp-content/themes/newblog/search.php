<?php
    get_header(); 
?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4><?php ?></h4>
                        <h2><?php the_archive_title(); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title" itemprop="name"><?php printf(esc_html__('Search Results for: %s', 'newblog'), get_search_query()); ?></h1>
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
                                endwhile;
                                ?>
                                <?php else : ?>
                                <article id="post-0" class="post no-results not-found">
                                    <div>
                                        <h1 class="entry-title" itemprop="name"><?php esc_html_e('Nothing Found', 'newblog'); ?></h1>
                                    </div>
                                </article>
                            <?php endif; ?>
                            <?php else : ?>
                                <article id="post-0" class="post no-results not-found">
                                    <div>
                                        <h1 class="entry-title" itemprop="name"><?php esc_html_e('Nothing Found', 'newblog'); ?></h1>
                                    </div>
                                </article>

                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>