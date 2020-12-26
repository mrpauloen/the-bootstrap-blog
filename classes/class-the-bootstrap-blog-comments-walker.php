<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'The_Bootstrap_Blog_Comments_Walker' ) ) :

/**
 * Main The Bootstrap Blog Comments Walker Class
 *
 * @since The Bootstrap Blog 1.0.0
 */

class The_Bootstrap_Blog_Comments_Walker extends Walker_Comment {

	/** CONSTRUCTOR
	 * You'll have to use this if you plan to get to the top of the comments list, as
	 * start_lvl() only goes as high as 1 deep nested comments */
	function __construct() {
		if ( have_comments() ):
	?>
	<div id="comments" class="comments-area"><ul id="comment-list" class="list-unstyled mt-3 py-1">
	<?php endif;
	}

	/** DESTRUCTOR
	 * I just using this since we needed to use the constructor to reach the top
	 * of the comments list, just seems to balance out :) */
	function __destruct() {
	 if ( have_comments() ):
	?>
		</ul></div>
	<?php endif;
	}

	/**
	 * Outputs a pingback comment.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment The comment object.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function ping( $comment, $depth, $args ) {
		$tag = ( 'div' == $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo tag_escape( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( '', $comment ); ?>>
			<div class="comment-body">
				<?php esc_html_e( 'Pingback:', 'the-bootstrap-blog' ); ?> <?php comment_author_link( $comment ); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'the-bootstrap-blog' ) ); ?>
			</div>
		<?php
	}

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		$commenter          = wp_get_current_commenter();
		$show_pending_links = ! empty( $commenter['comment_author'] );
		?>
		<<?php echo tag_escape( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent mt-3' : 'mt-3', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<footer class="comment-meta pb-1">
					<div class="comment-author vcard">
						<?php
						$comment_author_url = get_comment_author_url( $comment );
						$comment_author     = get_comment_author( $comment );
						$avatar             = get_avatar( $comment, $args['avatar_size'], '', '', $_args = array( 'class' => array(
							'rounded-circle', 'img-thumbnail',  'float-right' ) ) );
						if ( 0 !== $args['avatar_size'] ) {
							if ( empty( $comment_author_url ) ) {
								echo wp_kses_post( $avatar );
							} else {
								echo wp_kses_post( $avatar );
								printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in https://developer.wordpress.org/reference/functions/get_comment_author_url/
							}
						}

						printf(
							'<strong class="fn">%1$s</strong> <span class="screen-reader-text says">%2$s</span>',
							esc_html( $comment_author ),
							esc_html__( 'says:', 'the-bootstrap-blog' )
						);

						if ( ! empty( $comment_author_url ) ) {
							echo '</a>';
						}
						?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<small><a class="text-muted" href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>" title="<?php
									printf(
									/* translators: %1$s: Comment date, %2$s: Comment time. */
										esc_attr( '%1$s at %2$s', 'the-bootstrap-blog' ),
											get_comment_date( '', $comment ),
											get_comment_time()
									);
									?>">
								<?php printf(
										/* translators: %1$s: Comment date, %2$s: Comment time. */
											esc_html__( '%1$s at %2$s', 'the-bootstrap-blog' ),
												get_comment_date( '', $comment ),
												get_comment_time()
										);
								?>
							</time>

						</a>
						<?php edit_comment_link( esc_html__( '(Edit)', 'the-bootstrap-blog') ); ?></small>
					</div><!-- .comment-metadata -->

				</footer><!-- .comment-meta -->

				<div class="comment-content">

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p><em class="text-primary comment-awaiting-moderation">
<?php the_bootstrap_blog__icon_svg( 'exclamation-triangle', 20 ); ?>

<?php	if ( $commenter['comment_author_email'] ) {
		esc_html_e( 'Your comment is awaiting moderation.', 'the-bootstrap-blog' );
	} else {
		esc_html_e( 'Your comment is awaiting moderation and will be visible soon. Preview shown below.', 'the-bootstrap-blog' );
	}
?>
</em></p>

					<?php endif; ?>

					<?php comment_text(); ?>
				</div><!-- .comment-content -->

			</article><!-- .comment-body -->

			<?php
			if ( '1' == $comment->comment_approved || $show_pending_links ) {
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<p class="comment-reply">',
							'after'     => '</p>',
							'reply_text'  => sprintf (
								/* translators: %s: arrow-return-right svg icon */
									esc_html__( '%s Reply', 'the-bootstrap-blog' ),
										the_bootstrap_blog__get_icon_svg( 'arrow-return-right', '14')
								),
							'login_text'    => esc_html__( 'Log in to Reply', 'the-bootstrap-blog'),
							/* translators: %s: Comment author name of comment reply text. . */
        			'reply_to_text' => esc_html__( 'Re: %s', "the-bootstrap-blog" )  . '&emsp;',
						)
					)
				);
			}
			?>

		<?php
	}
}

endif;
