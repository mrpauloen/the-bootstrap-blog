<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @since The Bootstrap Blog 0.1
 */

get_header(); ?>

    <div class="container">

      <div class="row">
       <div id="site-content" class="col-sm-8 blog-main" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>

	<h2 class="blog-post-title"><?php the_bootstrap_blog__padlock(); the_title(); ?> <?php the_bootstrap_blog__sticky_pin(); ?></h2>

<?php // Get condition once so there is no repetitions
$password_required = post_password_required();

if ( ! $password_required ){ ?>
<p class="blog-post-meta"><time class="entry-date updated"><?php the_date('F j, Y'); ?></time> <?php the_bootstrap_blog__author_meta();?></p>
<?php } ?>

<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid mb-3 ')); ?>

<?php

	the_content();

	wp_link_pages(

		$args = array(
		'before'		=> '<p class="pager mt-3">' . esc_html__( 'Pages:', 'the-bootstrap-blog' ),
		'after'			=> '</p>',
		'link_before'	=> '<span class="badge badge-danger badge-pill">',
		'link_after'	=> '</span>',
		'separator'		=> '&nbsp;&nbsp;',
		'pagelink'		=> '%',

	));

	?>

	<!--

	<?php trackback_rdf(); ?>

	-->

<?php comments_template(); ?>

<?php if ( ! $password_required ) { ?>
<div class="mt-4"><?php esc_html_e( 'Category:', 'the-bootstrap-blog' ); ?> <?php the_category( ' | ' ); ?><br/>
<?php the_tags( __( 'Tags: ', 'the-bootstrap-blog' ), ', ', '<br />' ); ?></div>


<nav class="blog-pagination mt-4 mb-4">

<?php previous_post_link( '%link', esc_html__( 'Previous post', 'the-bootstrap-blog') ); ?>

<?php next_post_link( '%link', esc_html__( 'Next post', 'the-bootstrap-blog') ); ?>

</nav>
<?php } ?>
	</article><!-- /.blog-post -->


<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-bootstrap-blog' ); ?></p>

<?php endif; ?>

        </div><!-- /.blog-main -->

<?php get_sidebar(); ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

<?php get_footer(); ?>
