<?php
/**
 * The main template file
 * Template Name : front-page
 * @package seoboost
 * @version 1.2.1
 */

get_header(); ?>

  
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div <?php 
                if(!get_theme_mod('home_sidebar')==true) : ?>
                class="col-md-12" <?php else: ?>class="col-md-8" <?php endif; ?> >
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <div class="seoboost-post-grid " >
                                <?php
                                   while ( have_posts() ) : the_post();

                                   get_template_part( 'template-parts/page/content', 'ajax' );
                   
                                   // If comments are open or we have at least one comment, load up the comment template.
                                   if ( comments_open() || get_comments_number() ) :
                                       comments_template();
                                   endif;
                   
                               endwhile; // End of the loop.
                                ?>
                                
                            </div>
                            <div class="pagination-wrap">
                                <?php #seoboost_numeric_posts_nav(); ?>
                                here click
                            </div>
                        </main><!-- #main -->
                    </div><!-- #primary -->
            </div><!-- .col-md-8 -->
            <?php #if(get_theme_mod('home_sidebar')==false) : ?> 
            <div class="col-md-4" style="display:none">    
                <?php #get_sidebar(); ?>
            </div>
                <?php #endif; ?>	                
		</div><!-- .row -->
	</div>
</div>
<?php get_footer();
