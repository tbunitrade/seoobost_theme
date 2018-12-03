<?php

// ===================================================
// ==== Declare footer widget zone ==================
// ===================================================
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer Menu 1',
		'id'   => 'menu1',
		'description'   => 'These are widgets for the footer menu1.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name' => 'Footer Menu 2',
		'id'   => 'menu2',
		'description'   => 'These are widgets for the footer menu2.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name' => 'Footer Menu 3',
		'id'   => 'menu3',
		'description'   => 'These are widgets for the footer menu3.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name' => 'Footer Menu 4',
		'id'   => 'menu4',
		'description'   => 'These are widgets for the footer menu4.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}
