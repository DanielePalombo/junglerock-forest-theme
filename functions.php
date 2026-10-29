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

// Finché dall'admin non viene scelto un logo, il blocco Logo del sito mostra quello del tema.
add_filter( 'get_custom_logo', function ( $html ) {
	if ( $html ) {
		return $html;
	}
	return sprintf(
		'<a href="%s" class="custom-logo-link" rel="home"><img src="%s" class="custom-logo" alt="Jungle Rock" width="44" height="54"/></a>',
		esc_url( home_url( '/' ) ),
		esc_url( get_theme_file_uri( 'assets/img/logo.svg' ) )
	);
} );
