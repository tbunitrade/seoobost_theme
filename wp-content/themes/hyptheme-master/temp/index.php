<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="container ajax-posts-container">
                    yes
                    <?php
                        if ( have_posts() ) :
                        /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/post/content', get_post_format() );
                            endwhile;
                        endif;
                    ?>
                   <!-- //append here -->
                </div>

                <div class="container text-center textBtn">
                    <a class="btn btn-lg btn-default ajaxStart"  data-page="1"  ><span class="fa fa-spinner fa-spin "></span> Загрузить еще </a>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
<?php get_footer(); ?>
