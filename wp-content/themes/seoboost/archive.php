<?php
/**
 * The template for displaying archive pages
 * @package seoboost
 * @version 1.2.1
 */

get_header(); ?>
<div id="content" class="site-content">
	<div class="container">
        <div class="row">
          <div <?php if(get_theme_mod('archive_sidebar')==true) : ?> class="col-md-12" <?php else: ?>class="col-md-8" <?php endif; ?> >
			
			
		
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
            			
                    	<div class="seoboost-post-grid masonry-wrap row" >
						

								 <?php
                                    if ( have_posts() ) :
                                        
                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();
										
									
										
										get_template_part( 'template-parts/post/content');
										
								      
										
                                            
                                                 
                                                 
                                        endwhile;
                        

                                    else :
                        
                                        get_template_part( 'template-parts/post/content', 'none' );
                        
                                    endif;
                                ?>
                			</div>
						                            <div class="pagination-wrap">
                            <?php seoboost_numeric_posts_nav(); ?>
								
							
                            </div>
                    
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
	<?php if(get_theme_mod('archive_sidebar')==false) : ?> 
			
			   <div class="col-md-4">    
                
                <?php get_sidebar(); ?>
            
            </div>
	
<?php endif; ?> 
        </div><!-- .row -->
	</div>
</div>
<?php get_footer();
