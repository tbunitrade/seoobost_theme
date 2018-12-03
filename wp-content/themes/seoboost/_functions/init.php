<?php

// ===================================================
// ==== Re-Register jQuery ===========================
// ===================================================

//function jquery_cdn() {
//	wp_deregister_script('jquery');
//	wp_register_script('jquery', 'http://code.jquery.com/jquery-1.11.0.js', false, '1.11.0');
//	wp_enqueue_script('jquery');
//}
//add_action('init', 'jquery_cdn');


// ===================================================
// ==== Register All Scripts & Styles  ===============
// ===================================================

wp_localize_script( 'hyiptheme-script', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'noposts' => __('No older posts found', 'hyiptheme'),
));




function hyip_register_all_scripts_and_styles() {
	
	wp_register_script('dist', get_template_directory_uri() . '/public/js/custom.js', array('jquery'), true);
}

add_action('get_footer', 'hyip_register_all_scripts_and_styles');

// ===================================================
// ==== Load All Scripts & Styles  ===================
// ===================================================

function hyip_load_all_scripts_and_styles() {


	wp_enqueue_script('dist');

	// ===== Conditional Scripts =============



}
add_action( 'wp_enqueue_scripts', 'hyip_load_all_scripts_and_styles' );

function remove_head_scripts() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);


    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
