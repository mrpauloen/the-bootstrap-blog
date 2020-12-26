<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since The Bootstrap Blog 0.1
 */

?><!DOCTYPE html>
<html  class="no-js" <?php language_attributes(); ?>>
  <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

  </head>
<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

<?php // Let's get them only once
$has_header_image = has_header_image();
?>

		<div class="blog-masthead<?php
	 if ( $has_header_image ){
			echo esc_attr( ' border-bottom border-white' );
	}
	 ?>">
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
  <div class="container<?php
	if ( $has_header_image ){
		echo esc_attr( ' has-custom-header');
	}
	?>">
		<h1 class="site-title"><?php the_bootstrap_blog__site_title(); ?></h1><br/>
		<p class="lead site-description<?php
		if ( ! $has_header_image ){
			echo esc_attr( ' text-muted' );
		}
		?>"><?php the_bootstrap_blog__site_description(); ?></p>
  </div>
</header>
