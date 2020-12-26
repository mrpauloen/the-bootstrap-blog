<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @since 0.1
 */

get_header(); ?>

    <div class="container">

      <div class="row">
       <div id="site-content" class="col-sm-8 blog-main" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="blog-post">
	<h2 class="blog-post-title"><?php the_title(); ?></h2>

	<?php the_content();


	wp_link_pages(

		$args = array(
		'before'		=> '<p class="pager">' . esc_html__( 'Pages:', 'the-bootstrap-blog' ),
		'after'			=> '</p>',
		'link_before'	=> '<span class="badge badge-danger">',
		'link_after'	=> '</span>',
		'separator'		=> '&nbsp;&nbsp;',
		'pagelink'		=> '%',

	));

	?>

	<!--

	<?php trackback_rdf(); ?>

	-->
<?php comments_template(); ?>
	</article><!-- /.blog-post -->

<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-bootstrap-blog' ); ?></p>

<?php endif; ?>

        </div><!-- /.blog-main -->

<?php get_sidebar(); ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

<?php get_footer();?>
