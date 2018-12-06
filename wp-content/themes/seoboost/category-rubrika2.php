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

<div id="primary" class="container content-area content-areaNew">
    <main id="main pageajax" class="site-main" role="main">
        <div class="row">
            <div class="col-md-8">
                <div class="sunset-posts-container">
                <?php
                    $args = array ( 
                        'post_type' => 'post',
                        'category_name' => 'rubrika2',  
                        'posts_per_page' => 12);

                    $loop = new WP_Query($args);

                    if ( $loop->have_posts() ) :

                        echo '<div class="row page-limit" data-page="'. site_url() .'/' . sunset_check_paged() . ' ">';
                        while ( $loop->have_posts() ) : $loop->the_post();

                            $class = 'reveal';
                            set_query_var('post-class' , $class );
                            get_template_part( 'template-parts/postforajax-category2', get_post_format() );

                        endwhile;
                        echo '</div>';

                    endif; ?>

                    <!-- append here -->

                </div>
                <div id="scroll-to" class="container.text-center">
                    <a  class="sunset-load-more-category2"  data-page="<?php echo sunset_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php');?>">
                           Загрузить еще 
                           <!-- <span class="hide"> <i class="fa fa-spinner fa-spin fa-3x fa-fw" ></i></span> -->
                <!-- <span class="textDown">Загружаем еще...</span> -->
                    </a>
                    <script>
                        $(document).ready(function(){
                            $(".sunset-load-more-category").hover(function(){
                                $(this).css("box-shadow", "0 0 10px rgba(0,0,0,0.5)");
                                $(".sunset-load-more-category span").css("display", "block");
                                }, function(){
                                $(".sunset-load-more-category span").css("display", "none");
                                $(this).css("box-shadow", "none");
                            });
                        });
                    </script>
                </div>

                
            </div>
            <div class="col-md-4">
                <?php dynamic_sidebar('category');?>
                
                <aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'seoboost' ); ?>">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </aside><!-- #secondary -->

            </div>
        </div>  
    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer();?>
