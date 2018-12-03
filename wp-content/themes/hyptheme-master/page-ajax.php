<?php
/**
 *   Template Name: ajax
 **/


?>
<?php get_header(); ?>




        <div id="primary  " class="content-area">

            <main id="main pageajax" class="site-main" role="main">

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
                                get_template_part( 'template-parts/postforajax', get_post_format() );

                            endwhile;
                        echo '</div>';

                    endif; ?>

                    <!-- append here -->




                </div>

                <div id="scroll-to" class="container.text-center">
                    <a  class="sunset-load-more"  data-page="<?php echo sunset_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php');?>">
                  
                    </a>
                </div>



            </main><!-- #main -->
        </div><!-- #primary -->


<?php get_footer(); ?>