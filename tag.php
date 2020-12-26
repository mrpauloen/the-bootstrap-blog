<?php
/**
 * The template for displaying tag pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @since The Bootstrap Blog 0.1
 */

get_header(); ?>

   <div class="container">

      <div class="row">
       <div class="col-sm-8 blog-main">
	   <ul class="list-unstyled">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article>
	<li>
	<a href="<?php the_permalink(); ?>">
<?php

	the_bootstrap_blog__icon_svg( 'link-45deg' );

	$the_bootstrap_blog_title = the_title( '', '', false );

		if ( $the_bootstrap_blog_title ){
			echo $the_bootstrap_blog_title;// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			esc_html_e( '(no title)', 'the-bootstrap-blog');
		}
?>
</a>
	</li>
	<!--

	<?php trackback_rdf(); ?>

	-->
	</article>

<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-bootstrap-blog' ); ?></p>

<?php endif; ?>
	</ul>

<nav class="blog-pagination">
<?php next_posts_link( esc_html__( 'Older', 'the-bootstrap-blog' ) );?>

<?php previous_posts_link( esc_html__( 'Newer', 'the-bootstrap-blog' )); ?>
</nav>
			</div><!-- /.blog-main -->

<?php get_sidebar(); ?>

		</div><!-- /.row -->
	</div><!-- /.container -->

<?php get_footer(); ?>
