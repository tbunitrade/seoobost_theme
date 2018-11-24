<?php
/**
 * Template part for displaying posts
 * @package seoboost
 * @version 1.2.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		
		<header class="entry-header">
		<?php 
		// For top header

		$breadcrumb_type = seoboost_get_option( 'breadcrumb_type' );
		
	?>
	 <?php if($breadcrumb_type == 'normal'): ?>
                            <div class="header-breadcrumb">
                                <?php seoboost_breadcrumb_trail(); ?>
                            </div>
                        <?php endif; ?>
            
            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        
        	<ul class="entry-meta list-inline">
                
				<?php seoboost_posted_on(); ?>
				
				
				<?php	if(!get_theme_mod('post_categories')) :?>
                
				<?php if( has_category()):
                        echo '<li class="meta-categories list-inline-item"><i class="fa fa-folder-o" aria-hidden="true"></i>';
                            the_category( ',' );
                        echo '</li>';
				endif; ?>
                
				<?php endif; ?>
				
				
					<?php	if(!get_theme_mod('article_comment_link')) :?>
				<li class="meta-comment list-inline-item">
                    <?php $cmt_link = get_comments_link(); 
						  $num_comments = get_comments_number();
							if ( $num_comments == 0 ) {
								$comments = __( 'No Comments', 'seoboost' );
							} elseif ( $num_comments > 1 ) {
								$comments = $num_comments . __( ' Comments', 'seoboost' );
							} else {
								$comments = __('1 Comment', 'seoboost' );
							}
					?>	
					<i class="fa fa-comment-o" aria-hidden="true"></i>
                    <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $comments );?></a>
                </li>
					<?php endif; ?>
                
			</ul>
        
        </header><!-- .entry-header -->
        
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('seoboost-thumbnail-1'); ?>
            </div>
		<?php endif; ?>
        
        <div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		
		
        <div class="entry-footer">
		
		<div class="meta-left">
			
		<?php	if(!get_theme_mod('article_tags')) :?>
		<?php if(has_tag()): ?>
			<div class="tag-list"><?php the_tags( '<i class="fa fa-tags" aria-hidden="true"></i>'); ?></div>
		<?php endif; ?>
		<?php endif; ?>
		</div>
		
		<div class="meta-right">
			
		<?php if(!get_theme_mod('article_social_share')) : ?>
		<div class="share-text">Поделиться</div>
		<div class="social-share">
<ul>
			<li><a class="hint--top" data-hint="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a></li>
			<li><a class="hint--top" data-hint="Twitter" target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php print seoboost_social_title( get_the_title() ); ?>%20-%20<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
			<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
			<li><a class="hint--top" data-hint="Pinterest" data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pin_image; ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a></li>
			<li><a class="hint--top" data-hint="Google-plus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a></li>
	</ul>
	</div>
		<?php endif; ?>
			
		</div>
		
			
				
        </div>
   	
		
		
	
		
		



	</div>
</article><!-- #post-## -->

