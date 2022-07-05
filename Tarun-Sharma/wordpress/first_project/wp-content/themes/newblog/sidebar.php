<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">

                    <div class="content">
                        <?php 
                            if ( is_active_sidebar('new-blog-sidebar') ) { ?>
                                <?php dynamic_sidebar('new-blog-sidebar'); ?>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="content">
                        <ul>
                            <?php 
                            if( is_archive("shop") || is_singular("product") ) {
                                if ( ('new-blog-product')) { 
                                    dynamic_sidebar('new-blog-product');
                                }
                            } else {
                                if ( ('new-blog-sidebar-2')) {
                                    dynamic_sidebar('new-blog-sidebar-2');
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="content">
                        <?php 
                            if ( is_active_sidebar('new-blog-sidebar-3') ) { ?>
                                <ul>
                                    <?php dynamic_sidebar('new-blog-sidebar-3'); ?>
                                </ul>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>