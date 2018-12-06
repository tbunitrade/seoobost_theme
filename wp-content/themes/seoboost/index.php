<?php
/**
 * The main template file
 * @package seoboost
 * @version 1.2.1
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main indexphp" class="site-main" role="main">
        <div class="container sunset-posts-container">
            <?php // Show the selected frontpage content.
            $postsPerPage = 12;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $postsPerPage
            );
            $loop = new WP_Query($args);
            if ( $loop->have_posts() ) :
                echo '<div class="row page-limit" data-page="/' . sunset_check_paged() . ' ">';
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
            Загрузить еще 
                <!-- <span class="hide"> <i class="fa fa-spinner fa-spin fa-3x fa-fw" ></i></span> -->
                <!-- <span class="textDown">Загружаем еще...</span> -->
            </a>
            <script>
                $(document).ready(function(){
                    $(".sunset-load-more").hover(function(){
                        $(this).css("box-shadow", "0 0 10px rgba(0,0,0,0.5)");
                        $(".sunset-load-more span").css("display", "block");
                        }, function(){
                        $(".sunset-load-more span").css("display", "none");
                        $(this).css("box-shadow", "none");
                    });
                });
            </script>
           
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
