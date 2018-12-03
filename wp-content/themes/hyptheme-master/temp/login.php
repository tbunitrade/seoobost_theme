<?php /**
 Template Name: Login final
 **/ ?>
<?php get_header(); ?>
<?php
/**
 * Template Name: User Login
 */

$args = array( 'redirect' => site_url() );

if(isset($_GET['login']) && $_GET['login'] == 'failed')
{
    ?>
    <div id="login-error" style="background-color: #FFEBE8;border:1px solid #C00;padding:5px;">
        <p>Login failed: You have entered an incorrect Username or password, please try again.</p>
    </div>
    <?php
}

wp_login_form( $args );
?>

<?php

get_footer();
?>