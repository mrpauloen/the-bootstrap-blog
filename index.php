<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @since The Bootstrap Blog 0.1
 */

get_header(); ?>

    <div class="container">

      <div class="row">
       <div class="col-sm-8 blog-main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="blog-post">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="blog-post-title <?php the_bootstrap_blog__sticky_class(); ?>"><?php the_title(); ?> <?php the_bootstrap_blog__sticky_pin(); ?></h2>

	<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid mb-3 ')); ?>

	<?php the_excerpt(); ?>

	<!--

	<?php trackback_rdf(); ?>

	-->
	</article>
  </div><!-- /.blog-post -->


<?php endwhile; else: ?>
<h4><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-bootstrap-blog' ); ?></h4>

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

    </div><!-- /.container -->

<?php get_footer();?>
