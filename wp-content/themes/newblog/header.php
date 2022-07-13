<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="<?php bloginfo("description"); ?>" content="">
        <meta name="<?php bloginfo("author"); ?>" content="TemplateMo">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

        <?php wp_head(); ?>
        <title>
            <?php bloginfo("name"); ?>
        </title>
        <!-- TemplateMo 551 Stand Bloghttps://templatemo.com/tm-551-stand-blog -->
    </head>
    <body <?php body_class(); ?>>
        <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- ***** Preloader End ***** -->
        <!-- Header -->
        <header class="">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo bloginfo("home"); ?>">
                        <h2>
                            <?php echo bloginfo("name"); ?><em>.</em>
                        </h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <?php
                        if (has_nav_menu("header_menu")) { // if true
                            wp_nav_menu( //wp function to show the menu of given id
                                array(
                                    'theme_location'    => 'header_menu',
                                    'menu_class'        => 'navbar-nav ml-auto',
                                    'menu_id'           => '',
                                    'container'         => '',
                                    'container_class'   => '',
                                    'container_id'      => '',
                                    // 'a_class'           => 'nav-link',
                                    // 'active_class'      => 'active'
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </header>