<?php
/**
 *   Template Name: page-test-ajax
 **/
?>
<?php get_header(); ?>

<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div <?php 
                if(!get_theme_mod('home_sidebar')==true) : ?>
                class="col-md-12" <?php else: ?>class="col-md-8" <?php endif; ?> >
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
                            <div class="pagination_ajax">
                            li
                            <li <?php if (!has_post_thumbnail()) { ?> class="no-img"<?php } ?>>
                                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('alm-thumbnail'); }?>
                                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                <p class="entry-meta"><?php the_time("F d, Y"); ?></p>
                                <?php the_excerpt(); ?>
                                </li>
                            </div>
                            <div class="pagination-wrap">
                                <?php seoboost_numeric_posts_nav(); ?>
                            </div>
                        </main><!-- #main -->
                    </div><!-- #primary -->
            </div><!-- .col-md-8 -->
            <?php #if(get_theme_mod('home_sidebar')==false) : ?> 
            <div class="col-md-4" style="display:none">    
                <?php get_sidebar(); ?>
            </div>
                <?php #endif; ?>	                
		</div><!-- .row -->
	</div>
</div>

<?php get_footer();

