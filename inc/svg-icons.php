<?php
/**
 * SVG icons related functions
 *
 * @since The Bootstrap Blog 0.1.4
 */

/**
 * Display the SVG code for a given icon.
 */
function the_bootstrap_blog__icon_svg( $icon, $size = 24 ) {
	echo the_bootstrap_blog__get_svg( $group = 'ui', $icon, $size );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in the_bootstrap_blog__get_svg().
}
/**
 * Gets the SVG code for a given icon.
 */
function the_bootstrap_blog__get_icon_svg( $icon, $size = 24 ) {
	return the_bootstrap_blog__get_svg( $group = 'ui', $icon, $size );
}

/**
 * Gets the SVG code for a given icon.
 */
function the_bootstrap_blog__get_svg( $group, $icon, $size = 24 ) {

	// Make sure that only our allowed tags and attributes are included.
	$svg = wp_kses(
		The_Bootstrap_Blog__SVG_Icons::get_svg( $group, $icon, $size ),
		array(
			'svg'     => array(
				'class'       => true,
				'xmlns'       => true,
				'width'       => true,
				'height'      => true,
				'viewbox'     => true,
				'aria-hidden' => true,
				'role'        => true,
				'fill'        => true,
				'focusable'   => true,
			),
			'path'    => array(
				'fill'      => true,
				'fill-rule' => true,
				'd'         => true,
				'transform' => true,
			),
			'polygon' => array(
				'fill'      => true,
				'fill-rule' => true,
				'points'    => true,
				'transform' => true,
				'focusable' => true,
			),
		)
	);

	if ( ! $svg ) {
		return false;
	}
	return $svg;
}

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 */
function the_bootstrap_blog__get_social_link_svg( $uri, $size = 24 ) {
	return The_Bootstrap_Blog__SVG_Icons::get_social_link_svg( $uri, $size );
}
/**
 * Detects the social network from a URL and returns true.
 */
function the_bootstrap_blog__check_social_link( $uri ) {
	return The_Bootstrap_Blog__SVG_Icons::check_social_link( $uri );
}

/**
 * Display SVG icons in social links or if there is supported URL.
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of the menu. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string The menu item output with social icon.
 *
 * @since The Bootstrap Blog 0.1.4
 */
function the_bootstrap_blog__nav_menu_social_icons( $item_output, $item, $depth, $args ) {

	$locations = array( 'social-before-widgets', 'social-after-widgets' );

	// Change SVG icon inside social links menu if there is supported URL.
	if ( in_array( $args->theme_location, $locations, true ) ) {
		$svg = the_bootstrap_blog__get_social_link_svg( $item->url, 40 );
		if ( empty( $svg ) ) {
			$svg = the_bootstrap_blog__get_icon_svg( 'link', 40 );
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	} elseif (  the_bootstrap_blog__check_social_link( $item->url ) ) {
		// Add SVG icon before any menu item if there is supported URL.
		$svg = the_bootstrap_blog__get_social_link_svg( $item->url, 20 );
		$item_output =  $svg . $item_output;
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'the_bootstrap_blog__nav_menu_social_icons', 10, 4 );

function the_bootstrap_blog__filter__nav_menu_link_attributes( $atts, $item, $args ) {
	$locations = array( 'social-before-widgets', 'social-after-widgets' );
	if ( in_array( $args->theme_location, $locations, true ) ) {
    $atts['class'] = 'text-dark';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'the_bootstrap_blog__filter__nav_menu_link_attributes', 10, 3 );
