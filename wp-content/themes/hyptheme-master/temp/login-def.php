<?php /**
 Template Name: Login def
 **/ ?>
<?php get_header(); ?>


<div id="primary" class="content-area contacts">
		<main id="main" class="site-main" role="main">
			
			<div class="container">
              <div class="row">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php the_content(); ?>

                    <?php endwhile; endif; ?>

                    <?php wp_login_form();

                    $args = array(
                        'echo' => true,
                        'redirect' => site_url( $_SERVER['REQUEST_URI'] ),
                        'form_id' => 'loginform',
                        'label_username' => 'Логин',
                        'label_password' => 'Пароль',
                        'label_remember' => 'Запомнить меня',
                        'label_log_in' => 'Войти',
                        'id_username' => 'user_login',
                        'id_password' => 'user_pass',
                        'id_remember' => 'rememberme',
                        'id_submit' => 'wp-submit',
                        'remember' => true,
                        'value_username' => NULL,
                        'value_remember' => false
                    );


                    ?>
              </div>


			</div>
		</main>
</div>


<br>

<?php get_footer();?>