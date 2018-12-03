<?php

// ===================================================
// ==== Register widget areas.  ======================
// ===================================================

/**

 * Register widget areas.

 */

function seoboost_widgets_init() {

	register_sidebar( array(

		'name'          => __( 'Blog Sidebar', 'seoboost' ),

		'id'            => 'sidebar-1',

		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'seoboost' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

	



	

	register_sidebar( array(

		'name'          => __( 'Header Widget - Advertisement Area', 'seoboost' ),

		'id'            => 'sidebar-3',

		'description'   => __( 'Add widget(Image) here to appear in your header. Recommand Size: 720x90 ', 'seoboost' ),

		'before_widget' => '',

		'after_widget'  => '',

		'before_title'  => '',

		'after_title'   => '',

	) );

	

	register_sidebar( array(

		'name'          => __( 'Footer 1', 'seoboost' ),

		'id'            => 'footer-1',

		'description'   => __( 'Add widgets here to appear in your footer.', 'seoboost' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );



	register_sidebar( array(

		'name'          => __( 'Footer 2', 'seoboost' ),

		'id'            => 'footer-2',

		'description'   => __( 'Add widgets here to appear in your footer.', 'seoboost' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

	register_sidebar( array(

		'name'          => __( 'Footer 3', 'seoboost' ),

		'id'            => 'footer-3',

		'description'   => __( 'Add widgets here to appear in your footer.', 'seoboost' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

	register_sidebar( array(

		'name'          => __( 'Footer 4', 'seoboost' ),

		'id'            => 'footer-4',

		'description'   => __( 'Add widgets here to appear in your footer.', 'seoboost' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

	register_sidebar ( array (
        'name' => 'Подписка ',
        'id' => 'sendsid',
        'description' => 'sendsid',
        'before_widget' => '<div class="sendsid">',
        'after_widget' => '</div>'
    ));

    register_sidebar ( array (
        'name' => 'общая category ',
        'id' => 'category',
        'description' => 'category',
        'before_widget' => '<div class="category">',
        'after_widget' => '</div>'
    ));

}

add_action( 'widgets_init', 'seoboost_widgets_init' );
