<?php /**
 Template Name: Contacts
 **/ ?>
<?php get_header(); ?>


<div id="primary" class="content-area contacts">
		<main id="main" class="site-main" role="main">
			
			<div class="container">
                <div class="borderRadius">


                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php the_content(); ?>

                    <?php endwhile; endif; ?>

                    <div class="myData">
                        <h3><?php the_field ('my_data');?></h3>

                        <a href="mailto:<?php the_field ('email') ;?>"><img src="<?php the_field ('emailimg') ;?>"> - <?php the_field ('email') ;?></a>
                        <a href="mailto:<?php the_field ('telegram') ;?>"><img src="<?php the_field ('telegramimg') ;?>"> - <?php the_field ('telegram') ;?></a>

                    </div>

                    <div class="chat">
                        <h3>
                            <?php the_field ('slogan') ;?>
                        </h3>

                        <p>
                            <?php the_field ('slogan_text') ;?>
                        </p>
                        <a href="<?php the_field ('telegram_chat') ;?>"><img src="<?php the_field ('telegramimgbottom') ;?>"> -
                        <?php the_field ('telegram_chat') ;?>
                        </a>

                    </div>
                </div>
			</div>
		</main>
</div>


<br>

<?php get_footer();?>