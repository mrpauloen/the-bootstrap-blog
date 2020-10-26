<?php
/**
 * The Bootstrap Blog Theme Customizer functionality
 *
 * 
 * @subpackage The Bootstrap Blog
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function the_bootstrap_blog__theme_customize( $wp_customize ) {

	/*
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}

		/* Read Me Section
		 *
		 * @since: The Bootstrap Blog 0.1
		 */

		class The_Bootstrap_Blog_Read_Me extends WP_Customize_Control {
		public function render_content() {
			?>
			<div class="the-bootstrap-blog-read-me">

				<h3><?php

					printf(
						wp_kses(
							/* translators: %s: Theme URI */
							__( 'Thank you for using the <a href="%s" target="_blank">The Bootstrap Blog</a> theme.', 'the-bootstrap-blog' ),
							array(
								'a' => array(
									'href' => array(),
									'target' => array(),
								),
							)
						),
						 esc_url( 'https://wordpress.org/themes/the-bootstrap-blog/' )
					);
					?></h3>
				<hr/>

				<h3><?php esc_html_e( 'Support', 'the-bootstrap-blog' ); ?></h3>
				<p><?php esc_html_e( 'If there is something you don\'t understand, please use the support forum.', 'the-bootstrap-blog' ); ?></p>
				<p><?php

				printf(
					wp_kses(
						/* translators: %s: Theme Support Forum URL s*/
						__( '<a href="%s" target="_blank">Support Forum</a>', 'the-bootstrap-blog' ),
						array(
							'a' => array(
								'href' => array(),
								'target' => array(),
							),
						)
					),
					 esc_url( 'https://wordpress.org/support/theme/the-bootstrap-blog' ) );
				 ?></p>

				<hr/>

				<h3><?php esc_html_e( 'Review', 'the-bootstrap-blog' ); ?></h3>
				<p><?php esc_html_e( 'If you are satisfied with the theme, we would greatly appreciate if you would review it.', 'the-bootstrap-blog' ); ?></p>
				<p><?php

				printf(
					wp_kses(
						/* translators: %s: Theme Reviewing URL */
						__( '<a href="%s" target="_blank">Review This Theme</a>', 'the-bootstrap-blog' ),
						array(
							'a' => array(
								'href' => array(),
								'target' => array(),
							),
						)
					),
					 esc_url( 'https://wordpress.org/support/view/theme-reviews/the-bootstrap-blog?filter=5' ) );

				?></p>

				<hr/>

				<h3><?php esc_html_e( 'Author', 'the-bootstrap-blog' ); ?></h3>
				<p><?php

					printf(
						wp_kses(
							/* translators: %s: Theme Author Contact URL */
							__( 'If you are interested in making any major changes or looking for paid help, please e-mail us on: <a href="%s" target="_blank">this site</a>.', 'the-bootstrap-blog' ),
							array(
								'a' => array(
									'href' => array(),
									'target' => array(),
								),
							)
						),
						 esc_url( 'https://www.facebook.com/WPSolucje/' ) );
					?></a></p>

				<hr/>

				<h3><?php esc_html_e( 'Components', 'the-bootstrap-blog' ); ?></h3>
				<p><?php

					printf(
						wp_kses(
							/* translators: %s: official Bootstrap 4 Documentation URL */
							__( 'If you want to beautify your theme using the ready-made CSS, HTML and JS components, go to the official <a href="%s" target=_blank">Bootstrap 4 Documentation</a> site.', 'the-bootstrap-blog' ),
							array(
								'a' => array(
									'href' => array(),
									'target' => array(),
								),
							)
						),
						 esc_url( 'https://getbootstrap.com/docs/4.0/getting-started/introduction/' ) );
					?>

				<hr/>

				<h3><?php esc_html_e( 'Some improvements comming soon! :)', 'the-bootstrap-blog' ); ?></h3>

			</div>
			<?php
		}
	}

	/******************************************
	 *                                        *
	 *      READ ME FIRST section             *
	 *                                        *
	 ******************************************
	 */
	$wp_customize->add_section( 'the_bootstrap_blog_read_me', array(
		'title'    => __( 'Read Me First', 'the-bootstrap-blog' ),
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'the_bootstrap_blog_read_me_text', array(
		'default'           => '',
		'sanitize_callback' => 'the_bootstrap_blog__sanitize_checkbox',
	) );
	$wp_customize->add_control( new The_Bootstrap_Blog_Read_Me( $wp_customize, 'the_bootstrap_blog_read_me_text', array(
		'section'  => 'the_bootstrap_blog_read_me',
		'priority' => 1,
	) ) );

}
add_action( 'customize_register', 'the_bootstrap_blog__theme_customize', 11 );
