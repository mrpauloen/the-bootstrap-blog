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
		'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'
	) );

	// This theme uses wp_nav_menu() in one location.
	// This menu has only one level.

		register_nav_menus( array (
		'top'	 => __( 'Top Menu', 	'the-bootstrap-blog'),
		'social-before-widgets'   => __( 'Social Menu (before widgets)', 'the-bootstrap-blog' ),
		'social-after-widgets'   => __( 'Social Menu (after widgets)', 'the-bootstrap-blog' ),
		'footer-menu-1'	 => __( 'Footer Mega Menu (col1)', 	'the-bootstrap-blog'),
		'footer-menu-2'	 => __( 'Footer Mega Menu (col2)', 	'the-bootstrap-blog'),
		'footer-menu-3'	 => __( 'Footer Mega Menu (col3)', 	'the-bootstrap-blog'),
		'footer-menu-4'	 => __( 'Footer Mega Menu (col4)', 	'the-bootstrap-blog'),
		'footer-menu-5'	 => __( 'Footer Mega Menu (col5)', 	'the-bootstrap-blog'),
		'footer-menu-6'	 => __( 'Footer Mega Menu (col6)', 	'the-bootstrap-blog'),
		));

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// Enable support for custom logo.
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

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', the_bootstrap_blog__get_starter_content() );
	}
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
	 * @param int $content_width Content width in pixels.
	 *
	 * @since The Bootstrap Blog 0.1
	 */
	$GLOBALS['content_width'] = apply_filters( 'the_bootstrap_blog__content_width', 690 );
}
add_action( 'template_redirect', 'the_bootstrap_blog__content_width', 0 );

	/**
 	* Custom template tags for this theme
 	*
 	* @since The Bootstrap Blog 0.1.4
 	*/

	require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';
	/**
	 * Customizer additions.
	 *
	 * @since The Bootstrap Blog 0.1
	 */
 	require trailingslashit( get_template_directory() ) . 'inc/customizer/customizer.php';

	/**
	 * Top Menu
	 *
	 * This menu is one level deep only!
	 *
	 * @since The Bootstrap Blog 0.1
	 */
	 require trailingslashit( get_template_directory() ) . 'classes/class-the-bootstrap-blog-navwalker.php';

	/**
	 * Define Comments Walker
	 *
	 * @since The Bootstrap Blog 0.1
	 */
	 require trailingslashit( get_template_directory() ) . 'classes/class-the-bootstrap-blog-comments-walker.php';

	 /**
		* Handle SVG icons **
		*
		* @since The Bootstrap Blog 0.1.4
		*/
	 require trailingslashit( get_template_directory() ) . '/classes/class-the-bootstrap-blog-svg-icons.php';
	 require trailingslashit( get_template_directory() ) . '/inc/svg-icons.php';

	/**
	 *  Enqueue scripts.
	 *
	 * @since The Bootstrap Blog 0.1.4
	 */

add_action( 'wp_enqueue_scripts', 'the_bootstrap_blog__action__enqueue_css' );
function the_bootstrap_blog__action__enqueue_css() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', false, null, 'all' );

	wp_enqueue_style( 'the-bootstrap-blog', get_stylesheet_directory_uri() . '/style.css', false, $theme_version, 'all' );

	wp_enqueue_style( 'the-bootstrap-blog-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap', false, null, 'all' );

	/**
	 * Custom Header handle
	 *
	 * Adds `background` properties to the `blog-header` class in order to makes it visible
	 * Notice! Custom Header is not an img tag
	 * @since The Bootstrap Blog 0.1
	 */

	$custom_header = get_custom_header();

	if ( get_header_image() ) {
		$custom_header_css = ".blog-header {background: url('" . esc_url( $custom_header->url ) . "');background-size:cover;background-repeat:no-repeat;}";
		wp_add_inline_style( 'the-bootstrap-blog', $custom_header_css );
	}

}
	/**
	 *  Enqueue scripts.
	 *
	 * @since The Bootstrap Blog 0.1.4
	 */

add_action( 'wp_enqueue_scripts', 'the_bootstrap_blog__action__enqueue_js' );
function the_bootstrap_blog__action__enqueue_js() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/inc/bootstrap/js/popper.min.js', array( 'jquery' ), null, true );

	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Auto expand a textarea using jQuery
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'the_bootstrap_blog_autoheight', get_stylesheet_directory_uri() . '/inc/customizer/js/the_bootstrap_blog_autoheight_textarea.js', array( 'jquery' ), $theme_version, true );
	}

	// HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/inc/bootstrap/js/html5shiv.min.js', false, null, true );
	wp_enqueue_script( 'respond',	 get_template_directory_uri() . '/inc/bootstrap/js/respond.min.js', false, null, true );

	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
  wp_script_add_data( 'respond',   'conditional', 'lt IE 9' );
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
 * @since The Bootstrap Blog 0.1.3
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
    'description' => __( 'Widgets in this area will always be shown on right sidebar', 'the-bootstrap-blog' ),
    'before_widget' => '<div id="%1$s" class="mb-3 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="font-italic">',
		'after_title'   => '</h5>',
    ) );
}

/**
 * Adds `title` attributes to blog posts paginations links
 *
 * @link https://developer.wordpress.org/reference/hooks/next_posts_link_attributes/
 *
 * @since The Bootstrap Blog 0.1
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
 * Filters the text prepended to the post title for protected posts.
 *
 * @return string
 *
 * @since The Bootstrap Blog 0.1
 */

add_filter( 'protected_title_format', 'the_bootstrap_blog__filter__protected_text_title' );
function the_bootstrap_blog__filter__protected_text_title( $prepend ) {
	if ( is_home() || is_singular() || is_archive() ){
		return  '%s';
	}
	return $prepend;
}

/**
 * Password Form Filter
 *
 * Adjust post password form to bootstrap styl
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__filter__password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $form = '<p>' . esc_html__( 'This content is protected. Please enter your password:', 'the-bootstrap-blog' ) . '</p>
<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="POST">
<div class="form-row">
<div class="col">
<label class="sr-only" for="' . esc_attr( $label ). '">' . esc_html__( 'Password:', 'the-bootstrap-blog' ) . ' </label><input name="post_password" id="' . esc_attr( $label ). '" type="password" class="form-control round mb-2 mr-sm-2 mb-sm-0" id="' . esc_attr( $label ). '" placeholder="' . esc_attr__( 'Enter password...', 'the-bootstrap-blog' ) . '" required>
</div>
<div class="col">
<button type="submit" class="btn btn-outline-primary round">' . esc_html__( 'Submit', 'the-bootstrap-blog' ) . '</button>
</div></div></form>';
    return $form;
}
add_filter( 'the_password_form', 'the_bootstrap_blog__filter__password_form' );

/**
 * Filters the HTML output of individual page number links.
 *
 * @param string $link The page number HTML output.
 * @param int    $i    Page number for paginated posts' page links.
 * @since 0The Bootsrtap Blog 0.1
 */

add_filter( 'wp_link_pages_link', 'the_bootstrap_blog__filter__wp_link_pages_link', 10, 2 );
function the_bootstrap_blog__filter__wp_link_pages_link( $link, $i ){
	global $page;

	if ( is_singular() AND $i === $page ) {
    $link = '<span class="badge badge-secondary badge-pill disabled">' . $i . '</span>';
	}
	return $link;
}

/**
 *  Hide post thumbnail if post password protected
 *
 *  @since The Bootstrap Blog 0.1.2
 */

add_filter( 'post_thumbnail_html', 'the_bootstrap_blog__filter__post_thumbnail_html', 10 );
function the_bootstrap_blog__filter__post_thumbnail_html( $html ) {

	if ( !post_password_required() ){

		if ( has_post_thumbnail() && ! is_archive() ) {
			$html = '<div class="text-center">' . $html . '</div>';
		}
		return $html;

	} else {
		return '';
	}
}

/**
 * This filter is explained in this ticket:
 * @link https://core.trac.wordpress.org/ticket/51189
 *
 * @since The Bootstrap Blog 0.1.2
 */

add_filter( 'comment_reply_link', 'the_bootstrap_blog__filter__comment_reply_link', 10, 4 );
function the_bootstrap_blog__filter__comment_reply_link( $link, $args, $comment, $post ){
	global $wp_rewrite;

	$page = get_page_of_comment( $comment->comment_ID );

// Copied from get_comment_reply_link() function
	if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
		$link = sprintf(
			'<a rel="nofollow" class="comment-reply-login small" href="%s">%s</a>',
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
			"<a rel='nofollow' class='comment-reply-link small' href='%s' %s aria-label='%s'>%s</a>",
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

/** Default excerpt length **/

function the_bootstrap_blog__default_excerpt_length(){
	return 55;
}

/**
 * Excerpt lenght Filter
 *
 * @param integer @lenght    The maximum number of words. Default 55.
 *
 * @return integer excerpt_length
 *
 * @since The Bootstrap Blog 0.1.4
 */
function the_bootstrap_blog__filter__excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	$excerpt_length_home = get_theme_mod( 'excerpt_length' );
	$excerpt_length_archive = get_theme_mod( 'archive_excerpt_length' );

	if ( $excerpt_length_home && is_home() ){
		return $excerpt_length_home;
	}
	if ( $excerpt_length_archive && is_archive() ){
		return $excerpt_length_archive;
	}
	// Remember to always return default number
	return the_bootstrap_blog__default_excerpt_length();
}
add_filter( 'excerpt_length', 'the_bootstrap_blog__filter__excerpt_length', 999 );

/**
 * Add svg key icon to password protected post excerpt.
 *
 * @param string $post_excerpt The post excerpt.
 * @return string $post_excerpt with svg icon
 * @since The Bootstrap Blog 0.1.4
 */

function the_bootstrap_blog__filter__the_excerpt_key( $post_excerpt ){

	if ( is_admin() ) {
		return $post_excerpt;
	}

	if ( post_password_required() && ! is_archive() ){
		return '<a class="float-right text-decoration-none" href="' . get_the_permalink() . '" title="Unlock">' . the_bootstrap_blog__get_icon_svg( 'key-fill', '20' ) . the_bootstrap_blog__get_icon_svg( 'shield-lock', '20' ) .
'</a>' . $post_excerpt;
	}
	return $post_excerpt;
}
add_filter( 'the_excerpt', 'the_bootstrap_blog__filter__the_excerpt_key' );

/**
 * Add the "read more" link to excerpt string filter.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 *
 * @since The BootstrapBlog 0.1.4
 */
function the_bootstrap_blog__filter__excerpt_more( $more ) {

	if ( is_search() || is_archive() ){
		return $more;
	}
	return $more . ' <a class="read-more" href="' . get_the_permalink() . '" title="' . esc_attr__( 'Permanent Link to: ', 'the-bootstrap-blog' ) . the_title_attribute( 'echo=0' ) . '">' . __( '&rarr;Read&nbsp;more', 'the-bootstrap-blog') . '</a>';
}
add_filter( 'get_the_excerpt', 'the_bootstrap_blog__filter__excerpt_more', 10 );

/**
 * Filters the archive title prefix.
 *
 * @param string $prefix   Archive title prefix.
 * @return string $prefix  Empty string on author
 *
 * @since The Bootstrap Blog 0.1.4
 */
 function the_bootstrap_blog__filter__archive_title_prefix( $prefix ) {

	if ( is_author() ){
		return '';
	}
	return $prefix;
 }
 add_filter( 'get_the_archive_title_prefix', 'the_bootstrap_blog__filter__archive_title_prefix' );

/**
 * This filters prevents to display all post on empty search result
 *
 * @param string $search	 Search SQL for WHERE clause.
 * @param WP_Query $q  The current WP_Query object.
 * @return string WHERE clause.
 *
 * @since The Bootstrap Blog 0.1.4
 */
function the_bootstrap_blog__filter__posts_search( $search, $q ) {

	$sphrase = get_search_query();
	$slen = strlen( $sphrase );
	$minlen = 2;

	if( ! is_admin() && $slen < $minlen && $q->is_search() && $q->is_main_query() ){
		$search .=" AND 0=1 ";
	}
	return $search;
}
add_filter( 'posts_search', 'the_bootstrap_blog__filter__posts_search', 10, 2 );

/**
 * Filters the default gallery shortcode output.
 * Slightly modification of gallery shortcode to match the Bootstrap grid
 *
 * @since The Bootstrap Blog 0.1.4
 */

function the_bootstrap_blog__filter__gallery_output( $output, $attr, $instance ) {

	global $post, $wp_locale;

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'dl',
		'icontag'    => $html5 ? 'div'        : 'dt',
		'captiontag' => $html5 ? 'figcaption' : 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery' );

	$id = intval( $atts['id'] );

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
		}
		return $output;
	}

	$itemtag = tag_escape( $atts['itemtag'] );
	$captiontag = tag_escape( $atts['captiontag'] );
	$icontag = tag_escape( $atts['icontag'] );
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) ) {
		$itemtag = 'dl';
	}
	if ( ! isset( $valid_tags[ $captiontag ] ) ) {
		$captiontag = 'dd';
	}
	if ( ! isset( $valid_tags[ $icontag ] ) ) {
		$icontag = 'dt';
	}

	$columns = intval( $atts['columns'] );
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = '';

	/**
	 * Filter whether to print default gallery styles.
	 *
	 * @since 3.1.0
	 *
	 * @param bool $print Whether to print default gallery styles.
	 *                    Defaults to false if the theme supports HTML5 galleries.
	 *                    Otherwise, defaults to true.
	 */
	if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			/* see gallery_shortcode() in wp-includes/media.php */
		</style>\n\t\t";
	}

	$size_class = sanitize_html_class( $atts['size'] );
	$gallery_div = "<div id='$selector' class='row gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

	/**
	 * Filter the default gallery shortcode CSS styles.
	 *
	 * @since 2.5.0
	 *
	 * @param string $gallery_style Default CSS styles and opening HTML div container
	 *                              for the gallery shortcode output.
	 */
	$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
		if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
			$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
		} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
			$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
		} else {
			$image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
		}
		$image_meta  = wp_get_attachment_metadata( $id );

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
		}
		$output .= "<{$itemtag} class='gallery-item card border-0 text-center col-6 col-sm-6 col-md-4'>";
		$output .= "
			<{$icontag} class='gallery-icon card-img-top {$orientation}'>
				$image_output
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='card-body text-center smal wp-caption-text gallery-caption' id='$selector-$id'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
			$output .= '<br style="clear: both" />';
		}
	}

	if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
		$output .= "
			<br style='clear: both' />";
	}

	$output .= "
		</div>\n";

	return $output;

}
add_filter( 'post_gallery', 'the_bootstrap_blog__filter__gallery_output', 10, 3);
