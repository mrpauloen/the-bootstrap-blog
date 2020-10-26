<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @subpackage The Bootstrap Blog
 * @since 0.1
 */

?><footer class="blog-footer">
	<p><?php /* translators: %s: WordPress. */
		printf( esc_html__( 'Blog template built for %s.', 'the-bootstrap-blog' ), 'WordPress' ); ?></p>
	<p><a href="<?php echo esc_url( '#' );?>"><?php esc_html_e( 'Back to top', 'the-bootstrap-blog' );?></a></p>
    </footer>

<?php wp_footer(); ?>

  </body>
</html>
