<?php
/**
 * This is Bootstrap to WordPress theme called: The Bootstrap Blog.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * The bootstrap Blog have.
 *
 * @uses load_theme_textdomain() for translation/localization support.
 * @uses add_editor_style() to add Visual Editor stylesheets.
 * @uses add_theme_support() to add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() to add support for a navigation menu.
 * @uses set_post_thumbnail_size() to set a custom post thumbnail size.
 *
 *
 * @subpackage The bootstrap Blog
 * @since The bootstrap Blog 0.1
 */

add_action( 'after_setup_theme', 'the_bootstrap_blog__action__theme_setup' );
function the_bootstrap_blog__action__theme_setup() {
	/*
	 * Makes The Bootstrap Blog available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on The Bootstrap Blog, use a find and
	 * replace to change 'the-bootstrap-blog' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'the-bootstrap-blog' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'caption'
	) );

	// This theme uses wp_nav_menu() in one location.
	// This menu has only one level.

		register_nav_menus( array (
		'top'	 => __( 'Top Menu', 	'the-bootstrap-blog')
		));

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support for custom logo.
	 *
	 */

	 $defaults = array(
		'header-text'       => false,
		'random-default'		=> false,
		'width'					=> 1300,
		'height'				=> 200,
		'flex-height'			=> false,
		'flex-width'			=> false,
		'uploads'				=> true,

	);
	add_theme_support( 'custom-header', $defaults );
	add_theme_support( 'custom-background', $args = array());

	/**
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( 'inc/bootstrap/css/editor-style.css' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_bootstrap_blog__content_width() {

	/**
	 * Filter The Bootstrap Blog content width of the theme.
	 *
	 * @since The Bootstrap Blog 0.1
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'the_bootstrap_blog__content_width', 690 );
}
add_action( 'template_redirect', 'the_bootstrap_blog__content_width', 0 );


	/*
	 * Customizer additions.
	 *
	 * @since The Bootstrap Blog 0.1
	 */

 require trailingslashit( get_template_directory() ) . 'inc/customizer/customizer.php';

	/*
	 * ** Define Bootstrap Menu **
	 *
	 * ** This theme has only one menu level!
	 *
	 * @since The Bootstrap Blog 0.1
	 **/

require trailingslashit( get_template_directory() ) . 'classess/class.the-bootstrap-blog-navwalker.php';
	/*
	 * ** Define Comments Walker **
	 *
	 * ** This theme has only one menu level!
	 *
	 * @since The Bootstrap Blog 0.1
	 **/

require trailingslashit( get_template_directory() ) . 'classess/class.the-bootstrap-blog-comments-walker.php';

	/*
	 *  Enqueue scripts and styles.
	 *
	 * @since The Bootstrap Blog 0.1
	 */

add_action( 'wp_enqueue_scripts', 'the_bootstrap_blog__action__enqueue_js_and_css' );
function the_bootstrap_blog__action__enqueue_js_and_css() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/inc/bootstrap/js/popper.min.js', array( 'jquery' ), null, true );

	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true );

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', false, null, 'all' );

	wp_enqueue_style( 'the-bootstrap-blog', get_stylesheet_directory_uri() . '/style.css', false, $theme_version, 'all' );
	wp_enqueue_style( 'the-bootstrap-blog-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap', false, null, 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Auto expand a textarea using jQuery
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'the_bootstrap_blog_autoheight', get_stylesheet_directory_uri() . '/inc/customizer/js/the_bootstrap_blog_autoheight_textarea.js', array( 'jquery' ), $theme_version, true );
	}

	/**
	*
	* HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
	*
	**/

	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/inc/bootstrap/js/html5shiv.min.js',   false, null, true );
	wp_enqueue_script( 'respond',	 get_template_directory_uri() . '/inc/bootstrap/js/respond.min.js',	false, null, true );

	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
    wp_script_add_data( 'respond',   'conditional', 'lt IE 9' );


	/*
	 * Custom Header handle
	 *
	 * Adds `background` properties to the `blog-header` class in order to makes it visible
	 * Notice! Custom Header is not an img tag
	 * @since The Bootstrap Blog 0.1
	 */

	$custom_header = get_custom_header();

	if ( get_header_image() ) {
		$custom_header_css = ".blog-header {background: url('" . esc_url( $custom_header->url ) . "');background-size:cover;background-repeat: no-repeat;}";
		wp_add_inline_style( 'the-bootstrap-blog', $custom_header_css );
	}

}

if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */

add_action( 'wp_body_open', 'the_bootstrap_blog__action__skip_link', 5 );
function the_bootstrap_blog__action__skip_link() {
	echo '<a class="skip-link screen-reader-text alert alert-danger" href="#site-content">' . esc_html__( 'Skip to the content', 'the-bootstrap-blog' ) . ' &curarr;</a>';
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'the_bootstrap_blog__action__widgets_init' );
function the_bootstrap_blog__action__widgets_init() {
    register_sidebar( array(
    'name' => __( 'Main Sidebar', 'the-bootstrap-blog' ),
    'id' => 'sidebar',
    'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'the-bootstrap-blog' ),
    'before_widget' => '<div id="%1$s" class="mb-3 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="font-italic">',
		'after_title'   => '</h4>',
    ) );
}

/**
 * Adds `title` attributes to blog posts paginations links
 *
 * @link https://developer.wordpress.org/reference/hooks/next_posts_link_attributes/
 *
 *  @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__filter__next_posts_link_attributes() {
    return 'title="' . esc_attr__( 'Older pages', 'the-bootstrap-blog' ) . '" class="btn btn-outline-primary"';
}
function the_bootstrap_blog__filter__previous_posts_link_attributes() {
    return 'title="' . esc_attr__( 'Newer pages', 'the-bootstrap-blog' ) . '" class="btn btn-outline-secondary"';
}
add_filter('next_posts_link_attributes',	 'the_bootstrap_blog__filter__next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'the_bootstrap_blog__filter__previous_posts_link_attributes');

/**
 * Adds bootstrap classes to blog posts paginations links
 *
 * @link https://developer.wordpress.org/reference/hooks/next_posts_link_attributes/
 *
 * @since The Bootstrap Blog 0.1
 */
function the_bootstrap_blog__filter__previous_post_link( $output ) {
    $class = 'class="btn btn-outline-primary"';
    return str_replace('<a href=', '<a '.$class.' href=', $output );
}

function the_bootstrap_blog__filter__next_post_link( $output ) {
    $class = 'class="btn btn-outline-secondary"';
    return str_replace('<a href=', '<a '.$class.' href=', $output);
}
add_filter('previous_post_link', 'the_bootstrap_blog__filter__previous_post_link');
add_filter('next_post_link', 'the_bootstrap_blog__filter__next_post_link');

/**
 * This function add img-fluid class within the_content included post_thumbnails.
 * If you want to have responsive images outside the_content you have to add this class manually.
 *
 *  Responsive images:
 * 	1) add img-fluid class since Bootstrap v.4
 * 	2) remove dimensions
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__filter__post_thumbnail_responsive_images( $content ){

	$pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
	$replacement = '<img$1class="$2 img-fluid"$3>';
	$content = preg_replace( $pattern, $replacement, $content );
	return $content;
}
add_filter( 'the_content',	'the_bootstrap_blog__filter__post_thumbnail_responsive_images' );

/**
 * This function removes dimensions from post_thumbnails.
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__filter__post_thumbnail_remove_width_and_height( $html )
{
    $html = preg_replace( '/ (width|height)="[^"]+"/', '', $html );
    return $html;
}
add_filter( 'the_content',	'the_bootstrap_blog__filter__post_thumbnail_remove_width_and_height', 10 );

/**
 * Filters the comment edit link anchor tag.
 * Add custom class attribute to link markup.
 *
 * @param string $link       Anchor tag for the edit link.
 * @param int    $comment_id Comment ID.
 * @param string $text       Anchor text.
 *
 * @return string $link     HTML edit comment markup link
 *
 * @since 0.1
 */

function the_bootstrap_blog__filter__edit_comment_link( $link, $comment_id, $text ) {

	$link = '<a class="text-secondary" href="' . esc_url( get_edit_comment_link( $comment_id ) ) . '">' . $text . '</a>';
    return $link;
}
add_filter( 'edit_comment_link', 'the_bootstrap_blog__filter__edit_comment_link', 10, 3 );

/**
 * Cancel comment reply link filter
 *
 * Adds extra classes to cancel comment reply link
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__filter__cancel_comment_reply_link( $formatted_link, $link, $text ) {

	$style = isset( $_GET['replytocom'] ) ? '' : ' style="display:none;"';
	$link  = esc_html( remove_query_arg( array( 'replytocom', 'unapproved', 'moderation-hash' ) ) ) . '#respond';

	$formatted_link = '<a class="float-right" rel="nofollow"  id="cancel-comment-reply-link" href="' . esc_url ( $link ) . '"' .  $style  . '><small>' . esc_html( $text ) . '</small></a>';
    return $formatted_link;
}
add_filter( 'cancel_comment_reply_link', 'the_bootstrap_blog__filter__cancel_comment_reply_link', 10, 3 );

/**
 * Adds `svg` image padlock to the 'Protected' post in post title
 *
 * @since The Bootstrap Blog 0.1
 */

add_filter( 'protected_title_format', 'the_bootstrap_blog__filter__protected_text_title' );
function the_bootstrap_blog__filter__protected_text_title() {

	$height = ( is_archive() ) ? '20' : '32';

return '<svg height="' . esc_attr ( $height ) . '" viewBox="0 0 12 16" version="1.1" width="' . esc_attr ( $height ) . '" aria-hidden="true"><path fill-rule="evenodd" d="M4 13H3v-1h1v1zm8-6v7c0 .55-.45 1-1 1H1c-.55 0-1-.45-1-1V7c0-.55.45-1 1-1h1V4c0-2.2 1.8-4 4-4s4 1.8 4 4v2h1c.55 0 1 .45 1 1zM3.8 6h4.41V4c0-1.22-.98-2.2-2.2-2.2-1.22 0-2.2.98-2.2 2.2v2H3.8zM11 7H2v7h9V7zM4 8H3v1h1V8zm0 2H3v1h1v-1z"></path></svg> %s';
}

/**
 * Password Form Filter
 *
 * Adjust post password form to the bootstrap theme
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__filter__password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $form = '<p>' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'the-bootstrap-blog' ) . '</p>
<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="POST">
<div class="form-row">
<div class="col">
<label class="sr-only" for="' . esc_attr( $label ). '">' . esc_html__( 'Password:', 'the-bootstrap-blog' ) . ' </label><input name="post_password" id="' . esc_attr( $label ). '" type="password" class="form-control round mb-2 mr-sm-2 mb-sm-0" id="' . esc_attr( $label ). '" placeholder="' . esc_attr__( 'Enter password...', 'the-bootstrap-blog' ) . '" required>
</div>
<div class="col">
<button type="submit" class="bg-warning btn btn-primary round">' . esc_html__( 'Submit', 'the-bootstrap-blog' ) . '</button>
</div></div></form><hr/>';
    return $form;
}
add_filter( 'the_password_form', 'the_bootstrap_blog__filter__password_form' );

/**
 * Add question mark after [...]" (appended to automatically generated excerpts)
 *
 * @return string $more with question mark
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__filter__new_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	} else {
		return  $more . '?';
	}
}
add_filter( 'excerpt_more', 'the_bootstrap_blog__filter__new_excerpt_more' );

/**
 * Filters the HTML output of individual page number links.
 * 
 * @param string $link The page number HTML output.
 * @param int    $i    Page number for paginated posts' page links.
 * @since 0.1
 */

add_filter( 'wp_link_pages_link', 'the_bootstrap_blog__filter__wp_link_pages_link', 10, 2 );
function the_bootstrap_blog__filter__wp_link_pages_link( $link, $i ){
	global $page;

	if ( !is_archive() AND $i === $page ) {
    $link = '<span class="badge badge-secondary disabled">' . $i . '</span>';
	}

	return $link;
}

/**
 *  Hide post thumbnail if post password protected
 *
 *  @since The Bootstrap Blog 0.1.2
 */

add_filter( 'post_thumbnail_html', 'the_bootstrap_blog__filter__post_thumbnail_html', 10, 5 );
function the_bootstrap_blog__filter__post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

	if ( !post_password_required() ){

		if ( has_post_thumbnail() && ! is_archive() ) $html = '<div class="text-center">' . $html . '</div>';
		return $html;

	} else {
		return '';
	}
}

/**
 * This filter is explained in ticket:
 * @link https://core.trac.wordpress.org/ticket/51189
 *
 * @since The Bootstrap Blog 0.1.2
 */

add_filter( 'comment_reply_link', 'the_bootstrap_blog__filter_comment_reply_link', 10, 4 );
function the_bootstrap_blog__filter_comment_reply_link( $link, $args, $comment, $post ){
	global $wp_rewrite;

	$page = get_page_of_comment( $comment->comment_ID );

// Copied from get_comment_reply_link() function
	if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
		$link = sprintf(
			'<a rel="nofollow" class="comment-reply-login" href="%s">%s</a>',
			esc_url( wp_login_url( get_permalink() ) ),
			$args['login_text']
		);
	} else {
		$data_attributes = array(
			'commentid'      => $comment->comment_ID,
			'postid'         => $post->ID,
			'belowelement'   => $args['add_below'] . '-' . $comment->comment_ID,
			'respondelement' => $args['respond_id'],
			'replyto'        => sprintf( $args['reply_to_text'], $comment->comment_author ),
		);

		$data_attribute_string = '';

		foreach ( $data_attributes as $name => $value ) {
			$data_attribute_string .= " data-${name}=\"" . esc_attr( $value ) . '"';
		}

		$data_attribute_string = trim( $data_attribute_string );

		$link = sprintf(
			"<a rel='nofollow' class='comment-reply-link' href='%s' %s aria-label='%s'>%s</a>",
			esc_url(
				add_query_arg(
					array(
						'replytocom'      => $comment->comment_ID,
						'unapproved'      => false,
						'moderation-hash' => false,
					),
					get_permalink( $post->ID ) . $wp_rewrite->comments_pagination_base . '-' . $page . '/'
				)
			) . '#' . $args['respond_id'],
			$data_attribute_string,
			esc_attr( sprintf( $args['reply_to_text'], $comment->comment_author ) ),
			$args['reply_text']
		);
	}
	 return $args['before'] . $link . $args['after'];
}

/**
 * Custom Site Title
 *
 * This function changes the way you see (in header section)
 * your site tile (or blog name), depends on different pages
 * See line: 36 in header.php file
 *
 * @since The Bootstrap Blog
 */

function the_bootstrap_blog__site_title(){

	// if there is attachment page display: Attachment
	if ( is_attachment() ) {

		$site_title =  __( 'Attachment', 'the-bootstrap-blog');
	}

	elseif ( is_404() ) {
		$site_title =  __( '404', 'the-bootstrap-blog');
	}
		// if there is author page display: Author + author name
		elseif ( is_author()   ) {

			$site_title =  __( 'Author', 'the-bootstrap-blog');
		}
			// if there is archive display: Archive
			elseif ( is_archive()  ) {

				$site_title =  __( 'Archive', 'the-bootstrap-blog');
			}
				// in other any cases display hyperlinked blog name
					else {

						$site_title =  get_bloginfo( 'name' );
					}
	echo esc_html( $site_title );
}

/**
 * Sticky Post handle
 *
 * Adds `svg` pin to the sticky post title
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__sticky_pin(){

	if ( is_sticky() ) :

	$url =  get_template_directory_uri() . '/images/pin.svg';

?><img class="float-right post-sticky-icon m-2" src="<?php echo esc_url( $url ); ?>" alt="<?php esc_attr_e( 'Sticky', 'the-bootstrap-blog' );?>">
<?php endif;
}

/**
 * Sticky Post classes
 *
 * The sticky post should be distinctly recognizable in some way in comparison to normal posts.
 * You can style the `sticky` class if you are using the @post_class() function to generate your post classes,
 * but since we use bootstrap framework, we need to only
 * adds extra classes to the sticky post title instead of create new styles.
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__sticky_class(){

	if ( is_sticky() ) {

		echo esc_attr ( 'p-3 mb-2 bg-dark text-white' );
	}
}

/**
 * Author meta
 *
 * Display either author’s link or author’s name.
 * @link https://developer.wordpress.org/reference/functions/the_author_link/
 *
 * @since The Bootstrap Blog 0.1.3
 */
function the_bootstrap_blog__author_meta(){

	printf (
		/* translators: %s: Either author’s link or author’s name. */
		esc_html__('by %s', 'the-bootstrap-blog'), get_the_author_link() );
}
