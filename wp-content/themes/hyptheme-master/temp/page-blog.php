<?php /**
 Template Name: Blog
 *
 **/ ?>
<?php get_header(); ?>


    <div class="wrap">
        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php else : ?>
            <header class="page-header">
                <h2 class="page-title"><?php _e( 'Posts', 'hyiptheme' ); ?></h2>
            </header>
        <?php endif; ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php  if ( is_paged() ):?>

                    <div class="container text-center container-load-previous">
                        <a class="styleMe start_ajax_more" data-prev="1" data-page="<?php echo hyip_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                            <span class="fa fa-refresh"></span>
                            <span class="styleMeText">Загрузить ранее</span>
                        </a>
                    </div>

                <?php endif; ?>

                <div class="container customClassContainer">
                    <h2>i found you</h2>
                    <?php
                    if ( have_posts() ) :

                        echo '<div class="page-limit">';

                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */

//                        $class = 'reveal';
//                        set_query_var('post-class',$class);


                            get_template_part( 'template-parts/post/content', get_post_format() );

                        endwhile;

                        echo '</div>';
                    endif;
                    ?>

                    <!-- append here  -->
                </div>

                <div class="container text-center">
                    <a class="styleMe start_ajax_more" data-page="<?php echo hyip_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <span class="fa fa-refresh"></span>
                        <span class="styleMeText">Загрузить еще</span>
                    </a>
                </div>

            </main><!-- #main -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->

<?php get_footer();
