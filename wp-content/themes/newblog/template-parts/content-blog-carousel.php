<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">

            <?php
            $args = array(
                'post_type'     	=> 'post',
                'post_status' 		=> 'publish',	
				'posts_per_page'    => '5', 			    
				'meta_query' => array(
                    array(
                        'key'     => 'featured_post',
                        'value'   => 'checked'
                    ),
                )
            );
            $content_query = new WP_Query($args);                        
            if ($content_query->have_posts() && is_front_page()) : while ($content_query->have_posts()) : $content_query->the_post();
            ?>
            <div class="item">             

                <?php if(has_post_thumbnail()) { 
                    the_post_thumbnail( 'featured-thumb' ); 
                } else { ?>
                    <img src="<?php echo get_template_directory_uri()."/assets/images/banner-item-01.jpg"; ?>" alt="<?php echo get_the_title(); ?>">
                <?php } ?>
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>
                                <?php
                                // foreach ((get_the_category()) as $category) {
                                //     echo $category->cat_name . ' ';
                                // }
                                echo get_the_category_list(',' ,'');
                                ?>
                            </span>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>">
                            <h4>
                                <?php
                                    echo get_the_title();
                                ?>
                            </h4>
                        </a>
                        <ul class="post-info">
                            <li>
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
                                    <?php the_author(); ?>
                                </a>
                            </li>
                            <li><a href="<?php echo get_day_link('2002', '09', '04');?>"> <?php echo get_the_date() ?> </a></li>
                            <li><a href="#"><?php comments_number() ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            endif;
			wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php 
    // echo "<pre>";
    // $date_link = ( get_post( get_the_id()) );
    // echo $date_link->post_date;
    // print_r( $date_link );
    // echo "</pre>";
?>

<!-- Banner Ends Here -->