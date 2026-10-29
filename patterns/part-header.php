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
<div class="wp-block-group jr-brand"><!-- wp:site-logo {"width":44,"className":"jr-brand__logo"} /-->

<!-- wp:paragraph {"className":"jr-brand__name"} -->
<p class="jr-brand__name"><a href="/"><span>Jungle</span> Rock</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<?php if ( junglerock_nav_menu_id() ) : ?>
<!-- wp:navigation {"ref":<?php echo junglerock_nav_menu_id(); ?>,"overlayMenu":"mobile","className":"jr-nav","layout":{"type":"flex","justifyContent":"right"}} /-->
<?php else : ?>
<!-- wp:navigation {"overlayMenu":"mobile","className":"jr-nav","layout":{"type":"flex","justifyContent":"right"}} -->
<?php echo junglerock_nav_links(); ?>

<!-- /wp:navigation -->
<?php endif; ?></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
