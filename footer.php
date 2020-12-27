<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since The Bootstrap Blog 0.1
 */

?>
<footer class="blog-footer">
<?php
/**
 * Footer Mega Menu
 * @since The Bootstrap Blog 0.1.4
 */

 	if ( has_nav_menu( 'footer-menu-1' ) ):
?>
	<div class="container mb-5">
	<div class="row">
	<?php

	$locations = array (
		'footer-menu-1',
		'footer-menu-2',
		'footer-menu-3',
		'footer-menu-4',
		'footer-menu-5',
		'footer-menu-6'
	);
	foreach ( $locations as $location ){
?>
	<div class="col-6 col-md-3 col-lg-2">
<?php

	 wp_nav_menu( array(
			'theme_location' => $location,
			'container'=> false,
			'menu_id' => $location,
			'menu_class' => 'list-unstyled',
			'fallback_cb' => false,
			)
		);
	 ?>
</div>
<?php
	}
?>

	</div><!-- .row -->
</div>
<?php endif; ?>

	<p class="copyright"><?php echo the_bootstrap_blog__custom_footer_text(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in the_bootstrap_blog__sanitize_footer_text() ?></p>
	<p><a href="<?php echo esc_url( '#' );?>"><?php esc_html_e( '&uarr; Back to top', 'the-bootstrap-blog' );?></a></p>
    </footer>

<?php wp_footer(); ?>

  </body>
</html>
