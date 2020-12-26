<?php
/**
 * The template for displaying category pages
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
<li class="media my-3">

<?php the_post_thumbnail( array( 80, 80 ), array ( 'class' => 'd-flex mr-3' )); ?>

	<div class="media-body w-100">
		<h5 class="mt-0 mb-1"><a href="<?php esc_url( the_permalink() ); ?>"><?php

		the_bootstrap_blog__padlock();

			 $the_bootstrap_blog_title = the_title( '', '', false );

				if ( $the_bootstrap_blog_title ){
					echo $the_bootstrap_blog_title;// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				} else {
					esc_html_e( '(no title)', 'the-bootstrap-blog');
				}
				?>
			 </a></h5>

<?php the_excerpt();

	wp_link_pages(

		$args = array(
		'before'		=> '<p class="pager">' . esc_html__( 'Pages:', 'the-bootstrap-blog' ),
		'after'			=> '</p>',
		'link_before'	=> '<span class="badge badge-danger badge-pill">',
		'link_after'	=> '</span>',
		'separator'		=> '&nbsp;&nbsp;',
		'pagelink'		=> esc_html_x( 'part: %', 'category & tag page', 'the-bootstrap-blog' )

	));
?>

    </div>

	<!--

	<?php trackback_rdf(); ?>

	-->

</li>
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

<?php get_footer();?>
