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

add_action( 'init', function () {
	register_block_pattern_category( 'junglerock', [ 'label' => 'Jungle Rock' ] );
} );

// La home è la pagina impostata come prima pagina e si modifica da Pagine. Finché è vuota (o se la prima pagina mostra gli articoli) si vede il pattern del tema.
add_filter( 'render_block_core/post-content', function ( $content ) {
	if ( ! is_front_page() || ( is_page() && '' !== trim( get_post_field( 'post_content', get_queried_object_id() ) ) ) ) {
		return $content;
	}
	return '<div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">' . do_blocks( '<!-- wp:pattern {"slug":"junglerock/front-page"} /-->' ) . '</div>';
} );

// Le voci del menu dell'header, usate per creare il menu e finché il menu non esiste.
function junglerock_nav_links() {
	return '<!-- wp:navigation-link {"label":"La palestra","url":"/la-palestra/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Corsi","url":"/corsi/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Orari","url":"/orari/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Iscriviti","url":"/iscriviti/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Chi siamo","url":"/chi-siamo/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Blog","url":"/blog/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Contatti","url":"/contatti/","kind":"custom","className":"jr-nav__cta"} /-->';
}

// Il menu dell'header si modifica da Aspetto → Editor → Navigazione: il tema crea "Menu principale" una sola volta, al primo accesso a wp-admin.
add_action( 'admin_init', function () {
	if ( get_option( 'junglerock_nav_menu' ) || ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	$id = wp_insert_post( [
		'post_type'    => 'wp_navigation',
		'post_title'   => 'Menu principale',
		'post_status'  => 'publish',
		'post_content' => junglerock_nav_links(),
	] );
	if ( $id && ! is_wp_error( $id ) ) {
		update_option( 'junglerock_nav_menu', $id );
	}
} );

function junglerock_nav_menu_id() {
	$id = (int) get_option( 'junglerock_nav_menu' );
	return $id && 'publish' === get_post_status( $id ) ? $id : 0;
}
