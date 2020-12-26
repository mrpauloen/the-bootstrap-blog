<?php get_header(); ?>

<div class="container bg-white pt-1 pb-5"><!-- container -->

<div class="row">
<div id="site-content" class="col-sm-8 blog-main" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h4 class="text-primary mb-0"><a href="<?php the_permalink();?>">
<?php
	$the_bootstrap_blog_title = the_title( '', '', false );

	if ( $the_bootstrap_blog_title ){
		echo $the_bootstrap_blog_title;// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		esc_html_e( '(no title)', 'the-bootstrap-blog');
	}
	?>
	</a></h4>

	<p><small class="text-success"><?php the_permalink();?></small><br />
	<small><?php
	$excerpt = get_the_excerpt();
	$excerpt = str_ireplace( get_search_query(), '<strong>' . get_search_query() . '</strong>', $excerpt );
	echo wp_kses( $excerpt, 'strong' ); ?></small></p>

	<!--

	<?php trackback_rdf(); ?>

	-->
	</article>

<?php endwhile; else: ?>
<p class="lead"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-bootstrap-blog' ); ?></p>

<?php endif; ?>
<nav class="blog-pagination">
<?php next_posts_link( esc_html__( 'Older', 'the-bootstrap-blog' ) );?>

<?php if ( get_previous_posts_link() ) {
 previous_posts_link( esc_html__( 'Newer', 'the-bootstrap-blog' ));
 } elseif ( get_next_posts_link() ) { ?>
<a class="btn btn-outline-secondary disabled" href="#"><?php esc_html_e( 'Newer', 'the-bootstrap-blog' ); ?></a>
 <?php } ?>
</nav>
        </div><!-- /.blog-main -->
<?php get_sidebar(); ?>
 </div><!-- /.row -->
</div>
<!-- container -->

<?php get_footer(); ?>
