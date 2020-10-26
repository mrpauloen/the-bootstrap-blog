<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *
 * @subpackage The Bootstrap Blog
 * @since 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>

  </head>
<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

    <div class="blog-masthead">
      <div class="container nav-scroller">

<?php
		wp_nav_menu( array(

			'theme_location'	=> 'top',
			'container'			=> 'nav',
			'container_class'	=> 'nav d-flex',
			'items_wrap'        => '%3$s',
			'item_spacing'      => 'preserve',
			'fallback_cb'		=> 'The_Bootstrap_Blog_Walker::fallback',
			'walker'			=> new The_Bootstrap_Blog_Walker()

			)
		);
?>
      </div>
    </div>

  <header class="blog-header">
  <div class="container">
    <h1 class="blog-title mb-2"><?php the_bootstrap_blog__site_title(); ?></h1>
<?php if ( is_archive() ) { ?>
<p class="lead blog-description"><?php the_archive_title(); ?><p/>
<?php } else { ?>
    <p class="lead blog-description"><?php bloginfo('description'); ?></p>
<?php } ?>
  </div>
</header>
