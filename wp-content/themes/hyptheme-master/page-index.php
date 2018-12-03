<?php
/**
 *
 * Template Name: Index Главная
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
    <div class="sideBar"> </div>
    <main id="main" class="site-main" role="main">

        <div class="container sunset-posts-container">

            <?php // Show the selected frontpage content.

            $postsPerPage = 3;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $postsPerPage
            );

            $loop = new WP_Query($args);

            if ( $loop->have_posts() ) :

                echo '<div class="page-limit" data-page="/' . sunset_check_paged() . ' ">';
                while ( $loop->have_posts() ) : $loop->the_post();

                    $class = 'reveal';
                    set_query_var('post-class' , $class );
                    get_template_part( 'template-parts/postforajax', get_post_format() );

                endwhile;
                echo '</div>';

            endif; ?>

            <!-- append here -->




        </div>

        <div  align="center" class="">1
            <?php  echo paginate_links();?>
        </div>



    </main><!-- #main -->
</div><!-- #primary -->




<?php get_footer(); ?>
