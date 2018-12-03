<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<!-- <article id="meme" class="panel-image-prop" style="background-repeat: no-repeat;background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
    <div class="panel-image neW" >
        <div class="newBgRed">
            <?php #the_category(' > ', 'single'); ?>
        </div>

        <div class="authoR">

                    <img src="<?php #echo get_template_directory_uri(); ?>/dist/img/mobile/authoricon.png">
                    <p itemprop="author">
                        <span> Автор :</span>
                        <span>
                            <?php #echo the_author_meta('display_name', $post->post_author ); ?>

                        </span>
                    </p>
        </div>
        <a href="<?php #the_permalink(); ?>">
            <?php #the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        </a>

        <a href="<?php #the_permalink(); ?>" class="hrefTypeTwo"><span>Читать далее</span></a>

        <div class="bottom-content">
            <p class="postCalendar"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar.png"><span><?php echo get_the_date() ;?></span></p>
            <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/counters.png"><span><?php #echo the_views(); ?></span></p>
            <p class="postViewData"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/data.png"><span><?php comments_number('0', '1', '%'); ?> </span></p>

        </div>
        <div class="panel-image-prop" ></div>
    </div><!-- .panel-image -->
</article>
