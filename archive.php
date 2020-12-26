<?php
/**
 * The template for displaying archive pages
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

<li class="my-3">
<article>


<h5 class="mt-0 mb-1"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

<?php
	the_bootstrap_blog__icon_svg( 'link-45deg' );
	the_bootstrap_blog__padlock();
	the_title();
?>
</a></h5>

<?php
	wp_link_pages(

		$args = array(
		'before'			=> '<p class="pager">' . esc_html__( 'Pages:', 'the-bootstrap-blog' ),
		'after'				=> '</p>',
		'link_before'	=> '<span class="badge badge-danger">',
		'link_after'	=> '</span>',
		'separator'		=> '&nbsp;&nbsp;',
		'pagelink'		=> '%',

	));
?>

<!--

<?php trackback_rdf(); ?>

-->

</article>
</li>
<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-bootstrap-blog' ); ?></p>

<?php endif; ?>
</ul>

<nav class="blog-pagination">
<?php next_posts_link( esc_html__( 'Older', 'the-bootstrap-blog' ) );?>

<?php previous_posts_link( esc_html__( 'Newer', 'the-bootstrap-blog' ) ); ?>
</nav>

</div><!-- /.blog-main -->

<?php get_sidebar(); ?>

</div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer();
