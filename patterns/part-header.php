<?php
/**
 * Title: Parte: header
 * Slug: junglerock/part-header
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"header","align":"full","className":"jr-header","layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull jr-header"><!-- wp:group {"align":"wide","className":"jr-header__inner","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide jr-header__inner"><!-- wp:group {"className":"jr-brand","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group jr-brand"><!-- wp:image {"width":"48px","sizeSlug":"full","linkDestination":"custom","className":"jr-brand__logo"} -->
<figure class="wp-block-image size-full is-resized jr-brand__logo"><a href="/"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo.jpg' ) ); ?>" alt="Jungle Rock" style="width:48px"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"jr-brand__name"} -->
<p class="jr-brand__name"><a href="/"><span>Jungle</span> Rock</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:navigation {"overlayMenu":"mobile","className":"jr-nav","layout":{"type":"flex","justifyContent":"right"}} -->
<!-- wp:navigation-link {"label":"La palestra","url":"/la-palestra/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Corsi","url":"/corsi/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Orari","url":"/orari/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Iscriviti","url":"/iscriviti/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Chi siamo","url":"/chi-siamo/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Blog","url":"/blog/","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Contatti","url":"/contatti/","kind":"custom","className":"jr-nav__cta"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
