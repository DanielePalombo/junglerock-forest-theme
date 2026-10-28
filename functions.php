<?php
add_action( 'wp_enqueue_scripts', function () {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'junglerock', get_theme_file_uri( 'assets/css/theme.css' ), [], $version );
	wp_enqueue_style( 'junglerock-motion', get_theme_file_uri( 'assets/css/motion.css' ), [ 'junglerock' ], $version );
	wp_enqueue_script( 'junglerock-motion', get_theme_file_uri( 'assets/js/motion.js' ), [], $version, [ 'strategy' => 'defer', 'in_footer' => true ] );
} );

add_action( 'after_setup_theme', function () {
	add_editor_style( [ 'assets/css/theme.css', 'assets/css/motion.css' ] );
} );
