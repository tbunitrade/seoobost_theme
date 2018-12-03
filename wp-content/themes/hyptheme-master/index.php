<?php
/**
 *
 * Template Name: Главная
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
    <div class="topSideBar">
    </div>
    <main id="main indexphp" class="site-main" role="main">
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
        <div id="scroll-to" class="container.text-center">
            <a  class="sunset-load-more"  data-page="<?php echo sunset_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php');?>">
                <span> <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></span>
                <span class="textDown">Загружаем еще...</span>
            </a>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
