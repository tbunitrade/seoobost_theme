<?php /**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area newContainer">
    <main id="singlepost" class="singlePost pageDefaults" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>
    </main><!-- #main -->

    <aside class="sidebarNew">
        <div class="telegram">
            <p>подпишись на Канал<br>
                PLANWORLD.ru в<br>
                Telegram</p>
        </div>

        <div class="newTag">
            <?php dynamic_sidebar ('newtag'); ?>
        </div>

        <div class="mini">
            <div class="container sunset-posts-container">
                <?php // Show the selected frontpage content.
                $postsPerPage = 3;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $postsPerPage
                );
                $loop = new WP_Query($args);
                if ( $loop->have_posts() ) :
                    echo '<div class="page-limit" data-page="'. site_url() .'/lenta/' . sunset_check_paged() . ' ">';
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $class = 'reveal';
                        set_query_var('post-class' , $class );
                        get_template_part( 'template-parts/page/content', 'front-page' );
                    endwhile;
                    echo '</div>';
                endif; ?>
                <!-- append here -->
            </div>
        </div>
    </aside>
</div><!-- #primary -->
<div class="clear"></div>

<?php get_footer();?>
