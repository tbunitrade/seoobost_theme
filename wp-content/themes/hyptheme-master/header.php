<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo get_template_directory_uri (); ?>/dist/img/public/favicon.png" rel="shortcut icon"  >

    <?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow" />
    <?php } ?>
    <title>    </title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">-->
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

</head>

<body id="body" <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage" >
<header class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation sticky" itemscope itemtype="http://schema.org/WPHeader">
    <div class="headerContainer">
            <div class="logoContainer">
                <a class="logo col-md-2" href="<?php echo home_url(); ?>">Plan<img src="<?php echo get_bloginfo('template_url')?>/dist/img/logoPlanet.png" alt=""/>world
                </a>
                <button class='scroll-to-top'><span>наверх</span></button>
            </div>
            <!-- ================== NAVBAR ================ -->
            <nav class="navbar " role="navigation" itemscope itemtype="http://www.schema.org/SiteNavigationElement">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <?php
                wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                );
                ?>

            </nav>

           <?php get_template_part ('page-login');?>

    </div>
    <!-- ================== END  NAVBAR ================ -->
</header>

