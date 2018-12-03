<?php

// Initial setup
// Thumbnail support
//Excerpt custom
require_once( '_functions/init.php' );

// load CSS & JS scripts
require_once( '_functions/load_scripts.php' );

// Bootstrap NavWalker
require_once( '_functions/wp_bootstrap_navwalker.php' );

// menu widgets
require_once( '_functions/footer_menu_widgets.php' );

//Breadcrumb
require_once('_functions/breadcrumb.php');

//postView
require_once ('_functions/postview.php');

//Plugin login
require_once ('_functions/login_user.php');

//Plugin Register
//require_once ('_functions/register_user.php');

//Plugin Register
require_once ('_functions/ajax.php');

//Plugin Register
require_once ('_functions/excerpt.php');

//Plugin Register
require_once ('_functions/postview.php');

//comments count
require_once ('_functions/comments.php');

// Doctor Login
//require_once ('_functions/login.php');

function remove_head_scripts() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);


    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );


//// Async load
//function ikreativ_async_scripts($url)
//{
//    if ( strpos( $url, '#asyncload') === false )
//        return $url;
//    else if ( is_admin() )
//        return str_replace( '#asyncload', '', $url );
//    else
//        return str_replace( '#asyncload', '', $url )."' async='async";
//}
//add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );
//
//// Enqueue scripts
//function ikreativ_theme_scripts()
//{
//    // wp_enqueue_script() syntax, $handle, $src, $deps, $version, $in_footer(boolean)
//    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.min.js#asyncload', 'jquery', '', true );
//    wp_enqueue_script( 'application', get_template_directory_uri() . '/assets/js/application.min.js#asyncload', 'jquery', '', true );
//}
//add_action( 'wp_enqueue_scripts', 'ikreativ_theme_scripts');

// Adapted from https://gist.github.com/toscho/1584783

//в данной ситуации я разрешу вход в панель администрирования только для администраторов.
function restrict_admin()
{
    if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
        wp_redirect( site_url() );
    }
}
add_action( 'admin_init', 'restrict_admin', 1 );


add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
    wp_redirect( home_url() );
    exit();
}
//
//add_action ('login_header','auto_redirect_after_logout');


//add_filter ('login_errors','auto_redirect_login');
//
//function auto_redirect_login(){
//    wp_redirect( 'login' );
//    exit();
//}


add_action( 'wp_login_failed', 'pu_login_failed' ); // hook failed login

function pu_login_failed( $user ) {
    // check what page the login attempt is coming from
    $referrer = $_SERVER['HTTP_REFERER'];

    // check that were not on the default login page
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
        // make sure we don't already have a failed login attempt
        if ( !strstr($referrer, '?login=failed' )) {
            // Redirect to the login page and append a querystring of login failed
            wp_redirect( $referrer . '?login=failed');
        } else {
            wp_redirect( $referrer );
        }

        exit;
    }
}


add_action( 'authenticate', 'pu_blank_login');

function pu_blank_login( $user ){
    // check what page the login attempt is coming from
    $referrer = $_SERVER['HTTP_REFERER'];

    $error = false;

    if($_POST['log'] == '' || $_POST['pwd'] == '')
    {
        $error = true;
    }

    // check that were not on the default login page
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {

        // make sure we don't already have a failed login attempt
        if ( !strstr($referrer, '?login=failed') ) {
            // Redirect to the login page and append a querystring of login failed
            wp_redirect( $referrer . '?login=failed' );
        } else {
            wp_redirect( $referrer );
        }

        exit;

    }
}


// Deregister Contact Form 7 styles
add_action( 'wp_print_styles', 'aa_deregister_styles', 100 );
function aa_deregister_styles() {
    if ( ! is_page( 'kontaktyi' ) ) {
        wp_deregister_style( 'contact-form-7' );
    }
}
//
//function prefix_add_footer_styles() {
//    wp_enqueue_style( 'your-style-id', get_template_directory_uri() . '/stylesheets/somestyle.css' );
//};
//add_action( 'get_footer', 'prefix_add_footer_styles' );

function remove_styles () {
    wp_deregister_style('slb_core-css');
}

add_action ('wp_print_styles', 'remove_styles', 100);


function footer_enqueue_scripts(){
    remove_action('wp_head','wp_print_scripts');
    remove_action('wp_head','wp_print_head_scripts',9);
    remove_action('wp_head','wp_enqueue_scripts',1);
    add_action('wp_footer','wp_print_scripts',5);
    add_action('wp_footer','wp_enqueue_scripts',5);
    add_action('wp_footer','wp_print_head_scripts',5);
}
add_action('after_setup_theme','footer_enqueue_scripts');