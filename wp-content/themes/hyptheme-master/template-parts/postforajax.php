<?php

$class = get_query_var('post-class');
?>

    <article class="newArcitle" id=" post-<?php the_ID(); ?>" <?php post_class( array('hyiptheme-panel' , $class ) ); ?> >
           <div id="meme" class="panel-image-prop" style="background-repeat: no-repeat;background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">

                    <div class="rowTitle">
                        <a href="<?php the_permalink(); ?>" class="neWhrefTypeOne"> <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
                    </div>

                    <div class="rowBottom">
                        <p class="postCalendar"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar.png"><span><?php echo get_the_date() ;?></span></p>
                        <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/counters.png"><span><?php #echo the_views(); ?></span></p>
                        <p class="postViewData"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/data.png"><span><?php comments_number('0', '1', '%'); ?> </span></p>

                    </div>
            </div>

    </article><!-- #post-## -->

