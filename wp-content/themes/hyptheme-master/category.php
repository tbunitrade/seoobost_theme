<?php
/**
 * The category page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

 

<div id="primary222  " class="content-area content-areaNew">

    <main id="main pageajax" class="site-main" role="main">

        <div class="container sunset-posts-container">

            <?php // Show the selected frontpage content.

            $postsPerPage = 13;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $postsPerPage
            );

            $loop = new WP_Query($args);

            if ( $loop->have_posts() ) :

                echo '<div class="page-limit" data-page="'. site_url() .'/' . sunset_check_paged() . ' ">';
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

                <span class="textDown"></span>
                <span class="more"></span>
            </a>
        </div>



    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer();?>
