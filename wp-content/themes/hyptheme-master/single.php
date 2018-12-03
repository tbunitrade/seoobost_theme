<?php get_header(); ?>

    <div id="primary" class="content-area singlePost" itemscope itemtype="http://schema.org/Article">
        <main id="main" class="site-main" role="main">

            <div class=" myBorder">
                <div  id="morememe">
                    <article id="meme" class="panel-image-prop" style="background-repeat:no-repeat;background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                        <div class="panel-image neW" >
                            <div class="newBgRed">
                                <?php the_category(' > ', 'single'); ?>
                            </div>

                            <div class="authoR">

                                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/mobile/authoricon.png">
                                <p itemprop="author">
                                    <span> Автор :</span>
                                    <span class="author">
                                <?php echo the_author_meta('display_name', $post->post_author ); ?>

                            </span>
                                </p>
                            </div>

                            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

                            <div class="bottom-content">
                                <!--  -->

                            </div>
                            <div class="panel-image-prop" ></div>
                        </div><!-- .panel-image -->
                    </article><!-- #post article-## -->
                </div><!-- end of id home-->

                <?php if (have_posts()) : while (have_posts()) : the_post();



                ?>

            </div><!-- end of my border-->

            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
<!--                <h1 class="title">--><?php //the_title(); ?><!--</h1>-->
                <p  class="forMobileAuthor">
                    Автор: <?php    echo get_the_modified_author(),
                    ' * ',  the_time('F d,  Y ') ;?>
                </p>
            </div>


            <div class="myContent" itemprop="articleBody">
                <?php the_content(); ?>
            </div>

            <div class="row categoryTag">
                <div class="col-md-12 tAg">
                    <div class="col-md-3"> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/cat.png"> Категории</div><div class="col-md-9" itemprop="articleSection"> <?php echo the_category(); ?></div>
                </div>

                <div class="col-md-11 tAgs">
                    <div class="col-md-3"> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/tag.png"> Метки </div><div class="col-md-9"> <?php the_tags( ' ', ', ', '<br />' ); ?></div>
                </div>

            </div>

            <a href="#start"  class="replyTo" style="display: none">Оставить комментарий</a>

            <div class="bottom-content" style="display: none">

                <div class="row">
                    <p class="postCalendar"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar.png"><span><?php echo the_date() ;?></span></p>
                    <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/counters.png"><span><?php echo the_views();  ?></span></p>
                    <p class="postCount"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/data.png"><span> <?php echo comments_number('0', '1', '%' ); ?></span></p>
                </div>
            </div>

            <?php endwhile; endif; ?>

        </main>
        <aside class="sidebarNew">
            <a class="telegram" href="https://t.me/planworld" target="_blank">
                <p>подпишись на Канал<br>
                    PLANWORLD.ru в<br>
                    Telegram</p>
            </a>

            <div class="newTag">
                <?php dynamic_sidebar ('newtag'); ?>
            </div>

            <div class="mini">


                    <?php // Show the selected frontpage content.

                    $tag = single_tag_title('', false);





                    $args = array(
                        'post_status'      => 'publish',
                        'tag'  =>  $tag,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'posts_per_page'   => 5
                    );

                    $loop3 = new WP_Query($args);

                    if ( $loop3->have_posts() ) :

                        //echo '<div class="page-limit" data-page="'. site_url() .'/' . sunset_check_paged() . ' ">';
                        while ( $loop3->have_posts() ) : $loop3->the_post();


                            get_template_part( 'template-parts/page/content', 'front-page' );

                        endwhile;
                       // echo '</div>';

                    endif; ?>

                    <!-- append here -->


            </div>
        </aside>


        <div class="container myBorder readMore">
            <div class="row">
                <h4>Читайте также:</h4>

                <?php
                $categories = get_the_category($post->ID);
                if ($categories) {
                    $category_ids = array();
                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                    $args=array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post->ID),
                        'showposts' => '4',
                        'orderby' => 'rand',
                        'ignore_sticky_posts' => '1');
                    $my_query = new wp_query($args);
                    if( $my_query->have_posts() ) {
                        echo '<ul>';
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            ?>
                            <li> <img class="readMoreImg" src="<?php the_post_thumbnail_url('thumbnail'); ?>"/>
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                <p><?php custom_length_excerpt(35); ?></p>
                            </li>

                            <?php
                        }
                        echo '</ul>';
                    }
                    wp_reset_query();
                }
                ?>
            </div>

        </div>

        <div class="container myComments myBorder" >
            <div class="row">
                <h4 class="giveH4">Оставьте свой комментарий:</h4>
                <p class="giveP">Ваш e-mail не будет опубликован. Обязательные поля помечены <span>*</span></p>

                <?php if ( comments_open() ):
                    comments_template( '/comments.php' );
                endif;
                ?>

            </div>
        </div>


    </div>

<?php get_footer(); ?>