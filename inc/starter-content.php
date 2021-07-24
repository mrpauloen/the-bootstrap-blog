<?php
/**
 * The Bootstrap Blog Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `the_bootstrap_blog_starter_content` filter before returning.
 *
 * @return array A filtered array of args for the starter_content.
 *
 * @since The Bootstrap Blog 0.1.4
 */
function the_bootstrap_blog__get_starter_content() {

	$starter_content = array(

		'options' => array(
			'blogdescription' => _x( 'This is the Tagline... a short description of your website.', 'Theme starter content', 'the-bootstrap-blog' ),
		),

		'widgets' => array(
			'sidebar' => array(
				'search' => array(
					'title' => '',
					),
				'meta',
				'text_about' => array(
					'title' => 'Follow us',
					'text' => '',
				),
				),
		),

		'posts' => array(
			'home' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Home', 'Theme starter content', 'the-bootstrap-blog' ),
			),
			'about' => array(
				'post_type' => 'page',
				'post_title' => _x( 'About', 'Theme starter content', 'the-bootstrap-blog' ),
			),
			'contact' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Contact', 'Theme starter content', 'the-bootstrap-blog' ),
			),
			'blog' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Blog', 'Theme starter content', 'the-bootstrap-blog' ),
				'post_content' => _x( 'Blog content.', 'Theme starter content', 'the-bootstrap-blog' ),
			),
			'news' => array(
				'post_type' => 'page',
				'post_title' => _x( 'News', 'Theme starter content', 'the-bootstrap-blog' ),
				'post_content' => _x( 'News content.', 'Theme starter content', 'the-bootstrap-blog' ),
			),
			'page1' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Support', 'Theme starter content', 'the-bootstrap-blog' ),
				'post_content' => _x( 'Support content', 'Theme starter content', 'the-bootstrap-blog' ),
			),
			'page2' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Developers', 'Theme starter content', 'the-bootstrap-blog' ),
				'post_content' => _x( 'Developers content.', 'Theme starter content', 'the-bootstrap-blog' ),
			),
			'page3' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Templates', 'Theme starter content', 'the-bootstrap-blog' ),
				'post_content' => _x( 'Templates content.', 'Theme starter content', 'the-bootstrap-blog' ),
			),

		),

		'nav_menus' => array(
			'top' => array(
				'name' => _x( 'Top Menu', 'Theme starter content', 'the-bootstrap-blog' ),
				'items' => array(
					'link_home',
					'page_about',
					'page_contact',
				),
			),
			'social-after-widgets' => array(
				'name' => _x( 'Social Menu', 'Theme starter content', 'the-bootstrap-blog' ),
					'items' => array(
						'link_facebook',
						'link_twitter',
						'link_instagram',
						'link_github' => array(
							'url' => 'https://github.com',
							),
						'link_youtube' => array(
							'url' => 'https://youtube.com',
							),
						'link_other' => array(
							'title' => _x( 'Other', 'Theme starter content', 'the-bootstrap-blog' ),
							'url' => '#',
							'description' => _x( 'Short description', 'Theme starter content', 'the-bootstrap-blog' ),
							),
						),
					),
			'footer-menu-1' => array(
				'name' => _x( 'Footer Mega Menu 1', 'Theme starter content', 'the-bootstrap-blog' ),
				'items' => array(
					'page_about'	=> array(
						'title' => _x( 'About', 'Theme starter content', 'the-bootstrap-blog' ),
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{about}}',
									),
					'page_blog'	=> array(
						'title' => _x( 'Blog', 'Theme starter content', 'the-bootstrap-blog' ),
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{blog}}',
					),
					'link_page1' => array(
						'title' => _x( 'Privacy', 'Theme starter content', 'the-bootstrap-blog' ),
						'url' => '#',
					),
				),
			),
			'footer-menu-2' => array(
				'name' => _x( 'Footer Mega Menu 2', 'Theme starter content', 'the-bootstrap-blog' ),
				'items' => array(
					'page_news',
					'page_contact',
					'link_page1' => array(
						'title' => _x( 'Donate', 'Theme starter content', 'the-bootstrap-blog' ),
						'url' => '#',
					),
				),
			),
			'footer-menu-3' => array(
				'name' => _x( 'Footer Mega Menu 3', 'Theme starter content', 'the-bootstrap-blog' ),
				'items' => array(
					'page_page1' => array(
						'title' =>  _x( 'Support', 'Theme starter content', 'the-bootstrap-blog' ),
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{page1}}',
					),
					'page_page2' => array(
						'title' =>  _x( 'Developers', 'Theme starter content', 'the-bootstrap-blog' ),
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{page2}}',
					),
					'link_page3' => array(
						'title' => _x( 'Get Involved', 'Theme starter content', 'the-bootstrap-blog' ),
						'url' => '#',
					),
				),
			),
			'footer-menu-4' => array(
				'name' => _x( 'Footer Mega Menu 4', 'Theme starter content', 'the-bootstrap-blog' ),
				'items' => array(
					'link_page1' => array(
						'title' => _x( 'Plugins', 'Theme starter content', 'the-bootstrap-blog' ),
						'url' => '#',
								),
					'link_page2' => array(
						'title' => _x( 'Themes', 'Theme starter content', 'the-bootstrap-blog' ),
							'url' => '#',
					),
					'link_page3' => array(
						'title' => _x( 'Templates', 'Theme starter content', 'the-bootstrap-blog' ),
							'url' => '#',
					),
				),
			),
			'footer-menu-5' => array(
				'name' => _x( 'Footer Mega Menu 5', 'Theme starter content', 'the-bootstrap-blog' ),
				'items' => array(
					'link_page1' => array(
						'title' => _x( 'BuddyPress', 'Theme starter content', 'the-bootstrap-blog' ),
						'url' => '#',
					),
					'link_page2' => array(
						'title' => _x( 'bbPress', 'Theme starter content', 'the-bootstrap-blog' ),
						'url' => '#',
					),
					'link_page3' => array(
						'title' => _x( 'Bulletin', 'Theme starter content', 'the-bootstrap-blog' ),
						'url' => '#',
					),
				),
			),
			'footer-menu-6' => array(
				'name' => _x( 'Footer Mega Menu 6', 'Theme starter content', 'the-bootstrap-blog' ),
				'items' => array(
					'link_twitter' => array(
						'title'=> _x( '@WordPress', 'Theme starter content', 'the-bootstrap-blog' ),
					),
					'link_github' => array(
						'title'=> _x( 'WordPress', 'Theme starter content', 'the-bootstrap-blog' ),
					),
				),
			),
		),
	);

	/**
	 * Filters The Bootstrap Blog array of starter content.
	 *
	 * @since The Bootstrap Blog 0.1.4
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'the_bootstrap_blog_starter_content', $starter_content );

}
