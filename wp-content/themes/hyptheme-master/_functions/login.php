<?php
// ===================================================
// ==== Handle the front-end login  ==================
// ===================================================



function ajax_login_init(){

	// Enable the user with no privileges to run ajax_login() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );


	if ( is_user_logged_in() && is_admin() && ! current_user_can( 'administrator' ) &&
	     ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		wp_redirect( home_url() );
		exit;
	}
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}


}

add_action( 'init', 'ajax_login_init' );

function ajax_login_load_scripts() {
	if (is_page_template('page-login.php')) {
		wp_register_script('ajax-login-script', get_template_directory_uri() . '/public/js/ajax_login.js', array('jquery'),true );
		wp_enqueue_script('ajax-login-script');

		wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'redirecturl' => home_url(),
			'loadingmessage' => __('מבצע אימות, אנא המתן...')
		));
	}
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
	add_action( 'wp_enqueue_scripts', 'ajax_login_load_scripts' );
}

function ajax_login(){

	// First check the nonce, if it fails the function will break
	check_ajax_referer( 'ajax-login-nonce', 'security' );
	// Nonce is checked, get the POST data and sign user on
	$info = array();
	$info['user_login'] = $_POST['username'];
	$info['user_password'] = $_POST['password'];
	$info['remember'] = true;

	$user_signon = wp_signon( $info, false );
	if ( is_wp_error($user_signon) ){
		echo json_encode(array('loggedin'=>false, 'message'=>__('שם משתמש ו/או סיסמא שגוים')));
	} else {
		echo json_encode(array('loggedin'=>true, 'message'=>__('כניסה בוצעה בהצלחה!  אנא המתן..')));
	}

	die();
}