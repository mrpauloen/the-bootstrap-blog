<?php
/**
 * The main Home Page template file
 *
 * The template file home.php is used to render the blog posts index,
 * whether it is being used as the front page or on separate static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @since The Bootstrap Blog 0.1
 */

get_header(); ?>

    <div class="container">

      <div class="row">
       <div id="site-content" class="col-sm-8 blog-main" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php // Get the condition once so there is no repetitions
$password_required = post_password_required();

$class = array( 'blog-post' );
if ( $password_required ) array_push( $class, 'border', 'pt-3', 'px-3' );
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

	<h2 class="h2"><?php the_bootstrap_blog__padlock(); the_title(); the_bootstrap_blog__sticky_pin(); ?></h2>

<?php if ( ! $password_required ){ ?>
<p class="blog-post-meta"><time class="entry-date updated" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('F j, Y'); ?></time> <?php the_bootstrap_blog__author_meta(); ?></p>
<?php } ?>

	<?php  the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid mb-3 '));

    the_excerpt();

     	wp_link_pages(

    		$args = array(
    		'before'		=> '<p class="pager">' . esc_html__( 'Pages:', 'the-bootstrap-blog' ),
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
	</article><!-- /.blog-post -->

<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-bootstrap-blog' ); ?></p>

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

<?php get_footer();
