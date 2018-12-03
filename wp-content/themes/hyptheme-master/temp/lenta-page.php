<?php
/**
 * Template Name: Lenta
 *
 */
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
    <div class="sideBar"> </div>
    <main id="main" class="site-main" role="main">

        <?php // Show the selected frontpage content.

            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/page/content' );
            endwhile;

        endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-offset-5 col-md-3">

                    <?php echo paginate_links('$args') ;

                    $args = array (
                        'base'               => '%_%',
                        'format'             => '?paged=%#%',
                        'total'              => 1,
                        'current'            => 0,
                        'show_all'           => false,
                        'end_size'           => 1,
                        'mid_size'           => 2,
                        'prev_next'          => true,
                        'prev_text'          => __('« Previous'),
                        'next_text'          => __('Next »'),
                        'type'               => 'plain',
                        'add_args'           => false,
                        'add_fragment'       => '',
                        'before_page_number' => '',
                        'after_page_number'  => ''
                    );
                    ?>



                </div>

            </div>
        </div>
        <div class="clear"></div>

    </main><!-- #main -->
</div><!-- #primary -->



<?php get_footer();?>
