<?php
/**
 * The Bootstrap Blog Theme Customizer functionality
 *
 * @since The Bootstrap Blog 0.1
 */

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
						/* translators: %s: Theme Support Forum URLs*/
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

				<h3><?php esc_html_e( 'Contribute', 'the-bootstrap-blog' ); ?></h3>
				<p><?php esc_html_e( 'Are you familiar with github? Great! Use it as an extended support for reporting any bugs, keep track of tasks, propose enhancements or contributing to project.', 'the-bootstrap-blog' );
					?></a></p>
					<p><?php

					printf(
						wp_kses(
							/* translators: %s: Theme github URL */
							__( '<a href="%s" target="_blank">Contribute</a>', 'the-bootstrap-blog' ),
							array(
								'a' => array(
									'href' => array(),
									'target' => array(),
								),
							)
						),
						 esc_url( 'https://github.com/mrpauloen/the-bootstrap-blog-dev' ) );

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

				<h3><?php esc_html_e( 'Upgrade', 'the-bootstrap-blog' ); ?></h3>
				<p><?php

					printf(
						wp_kses(
							/* translators: %s: Theme Author Funpage URL */
							__( 'If you are interested in making any major changes or looking for paid help, please send a message to: <a href="%s" target="_blank">this fanpage</a>.', 'the-bootstrap-blog' ),
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

	/**
	 *
	 * Option One - Custom Footer
	 *
	 * @since The Bootstrap Blog 0.1.4
	 */

		$wp_customize->add_section(
			'custom_footer_section',
			array(
				'title'      => __( 'Custom footer', 'the-bootstrap-blog' ),
				'description'	=> sprintf(
					/* translators: 1 allowed HTML tags, 2: predefined tags */
					__( 'Footer text is displayed by default. Change it using input field bellow. If nothing specified, default text will be used instead. You may use some HTML tags and attributes: <code>%1$s</code><br>As well as some predefined tags: <code>%2$s</code>',  'the-bootstrap-blog' ),
					 esc_html( '<a href="" title=""> <b> <del datetime=""> <em> <i> <q cite=""> <s> <strike> <strong>' ),
					 esc_html( '{sitetitle} {sitedescription} {year}' )),
				'description_hidden' => true,

		) );

		/**
		 * Display Footer Text
		 *
		 * @return boolean True on success, false on failure.
		 */

		$wp_customize->add_setting(
			// $id
			'display_footer_text',
			// $args
			array(
				'default'			=> true,
				'type'				=> 'theme_mod',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'the_bootstrap_blog__sanitize_checkbox'
			)
		);

		/**
		 * Custom Footer Text
		 *
		 * @return string 		Value set for the option	 *
		 */

		$wp_customize->add_setting(
			'custom_footer_text',
			array(
				'default'        => the_bootstrap_blog__default_footer_text(),
				'capability'     => 'edit_theme_options',
				'type'           => 'theme_mod',
				'sanitize_callback' => 'the_bootstrap_blog__sanitize_footer_text'
			)
		);

		$wp_customize->add_control(
			// $id
			'display_footer_text_control',
			// $args
			array(
				'label'			=> __( 'Display footer text', 'the-bootstrap-blog' ),
				'settings'		=> 'display_footer_text',
				'section'		=> 'custom_footer_section',
				'type'			=> 'checkbox'
		)
		);

		$wp_customize->add_control(
			'custom_footer_control',
			array(
				'label'  	  	=> __( 'Text in footer:', 'the-bootstrap-blog' ),
				'section'		=> 'custom_footer_section',
				'settings'		 => 'custom_footer_text',
				'type'    		 => 'text',
				'input_attrs'	 => array(
					'placeholder' => the_bootstrap_blog__default_footer_text(),
				),
			)
		);
		/******************************************
		 *                                        *
		 *      Option Two - Excerpt Lenght       *
		 *                                        *
		 ******************************************
		 */

		$wp_customize->add_section(
			'excerpt_length_section',
			array(
				'title'      => __( 'Excerpt lenght', 'the-bootstrap-blog' ),
				'description'	=> sprintf(
						wp_kses(
							/* translators: %1$s: the_excerpt (word); %2$s !--more-- (tag); %3$s: url to codex; %4$s: url to codex */
							__( 'Use this option to control the excerpt lenght on the home and archive page. The default excerpt length is 55 words. This setting works only when a post themplate use <code>%1$s</code> template tag and the excerpt is created automatically (excerpt meta box on the post editor screen is empty) but no longer than the <code>%2$s</code> tag (if it\'s used). See: <a href="%3$s" target="_blank">Excerpt</a> or <a href="%4$s" target="_blank">Customizing_the_Read_More</a> in codex.', 'the-bootstrap-blog' ),
							array(
								'a' => array(
									'href' => array(),
									'target' => array(),
								),
							)
						),
						esc_html__( 'the_excerpt', 'the-bootstrap-blog' ),
						esc_html__( '&lt;!--more--&gt;', 'the-bootstrap-blog'  ),
						esc_url('https://wordpress.org/support/article/excerpt/' ),
						esc_url('https://codex.wordpress.org/Customizing_the_Read_More' ) ),
				'description_hidden' => true,

		) );

		/*
		 * Excerpt lenght
		 *
		 * Return Values:
		 * (int)
		 * A non-negative integer.
		 *
		 **/

		$wp_customize->add_setting(
			'excerpt_length',
			array(
				'default' => the_bootstrap_blog__default_excerpt_length(),
				'capability'     => 'edit_theme_options',
				'type'           => 'theme_mod',
				'sanitize_callback' => 'the_bootstrap_blog__sanitize_numbers',
			)
		);

		$wp_customize->add_control(
	    'excerpt_length_control',
			array(
				'label' => __( 'Use the slider or enter a number:', 'the-bootstrap-blog' ),
				'settings' => 'excerpt_length',
				'section' => 'excerpt_length_section',
				'type' => 'range',
				'input_attrs' => array(
					'min' => 1,
					'max' => 200,
					'step' => 1,
				),
			)
		);

		$wp_customize->add_control(
	    '_excerpt_length_control',
			array(
				'description' => __( 'Available slider range: 1 to 200', 'the-bootstrap-blog' ),
				'settings' => 'excerpt_length',
				'section' => 'excerpt_length_section',
				'type' => 'number',
				'input_attrs' => array(
					'min' => 1,
					'max' => 200,
					'step' => 1,
				),
			)
		);
		/*
		 * Archive Excerpt lenght
		 *
		 * Return Values:
		 * (int)
		 * A non-negative integer.
		 *
		 **/

		$wp_customize->add_setting(
			'archive_excerpt_length',
			array(
				'default' => the_bootstrap_blog__default_excerpt_length(),
				'capability'     => 'edit_theme_options',
				'type'           => 'theme_mod',
				'sanitize_callback' => 'the_bootstrap_blog__sanitize_numbers',
			)
		);

		$wp_customize->add_control(
	    'archive_excerpt_length_control',
			array(
				'label' => __( 'Archive excerpt lenght:', 'the-bootstrap-blog' ),
				'settings' => 'archive_excerpt_length',
				'section' => 'excerpt_length_section',
				'type' => 'range',
				'input_attrs' => array(
					'min' => 1,
					'max' => 200,
					'step' => 1,
				),
			)
		);

		$wp_customize->add_control(
	    '_archive_excerpt_length_control',
			array(
				'description' => __( 'Available slider range: 1 to 200', 'the-bootstrap-blog' ),
				'settings' => 'archive_excerpt_length',
				'section' => 'excerpt_length_section',
				'type' => 'number',
				'input_attrs' => array(
					'min' => 1,
					'max' => 200,
					'step' => 1,
				),
			)
		);

}
add_action( 'customize_register', 'the_bootstrap_blog__theme_customize', 11 );

function the_bootstrap_blog__allowed_footer_html(){

	$allowed_html = array(
		'a' => array(
			'href' => array(),
		),
		'br' => array(),
		'del' => array (
			'datetime' => array(),
		),
		'em' => array(),
		'i' => array(),
		'q' => array(
			'cite' => array(),
		),
		's' => array(),
		'strike' => array(),
		'strong' => array(),
	);

	return $allowed_html;

}

/**
 * Sanitizations functions
 */

 function the_bootstrap_blog__sanitize_footer_text( $text ){

 	$text = wp_kses( $text, the_bootstrap_blog__allowed_footer_html() );
 	return  $text;
 }

function the_bootstrap_blog__sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/*  Sanitizenumers for customizer */
function the_bootstrap_blog__sanitize_numbers( $number ) {
	// number check.
	return absint( $number );
}
