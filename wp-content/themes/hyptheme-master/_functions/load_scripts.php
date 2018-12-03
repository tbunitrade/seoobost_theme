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
	// ======== CSS
    //wp_register_style('font_awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_register_style( 'vendor', get_template_directory_uri() . '/dist/css/vendor.css', false, '', 'all' );
	wp_register_style ('style', get_template_directory_uri() .'/dist/css/style.css', false,'', 'all');
	wp_register_style( 'admin_css', get_template_directory_uri() . '/admin.css', false, '1.0.0' );
	// ======== JS
	wp_register_script('vendor', get_template_directory_uri() . '/dist/js/vendor.js', array('jquery'), true);
	wp_register_script('dist', get_template_directory_uri() . '/dist/js/dist.js', array('jquery'), true);
}

add_action('get_footer', 'hyip_register_all_scripts_and_styles');

// ===================================================
// ==== Load All Scripts & Styles  ===================
// ===================================================

function hyip_load_all_scripts_and_styles() {

	// ===== Global Scripts ==================

    // ===== CSS Files

    wp_enqueue_style('font_awesome');
	wp_enqueue_style('vendor');
	wp_enqueue_style('style');
	// ===== JS Files
	wp_enqueue_script('vendor');
	wp_enqueue_script('dist');

	// ===== Conditional Scripts =============

//
//	if (is_page_template('page-doc-search.php')) {
//		wp_enqueue_script('fuse_js');
//		wp_enqueue_style('sass');
//		wp_enqueue_script('doc_search_js');
//
//	}
//	if (is_page_template('page-video.php')) {
//		wp_enqueue_script('light_case_js');
//	}
//	if (is_singular('events') || is_singular('doctors')) {
//		wp_enqueue_script('light_case_js');
//	}



	// load Parameters from php to JS.
//	wp_localize_script( 'doc_search_js', 'php_params', ['templateUrl' => get_stylesheet_directory_uri()] );



}
add_action( 'wp_enqueue_scripts', 'hyip_load_all_scripts_and_styles' );

// =====================================================
// ==== Load Admin Scripts & Styles  ===================
// =====================================================

function load_admin_styles() {
	wp_enqueue_style( 'admin_css');
}
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'admin.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


// =====================================================
// ==== Remove WP Embed JS  ============================
// =====================================================
function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );