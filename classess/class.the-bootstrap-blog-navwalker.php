<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


if ( ! class_exists( 'The_Bootstrap_Blog_Walker' ) ) :

	/**
	 * Main The Bootstrap Blog Menu Walker Class
	 *
	 * ** Define Bootstrap Menu **
	 *
	 * ** This theme has only one menu level!
	 *
	 * @since The Bootstrap Blog 0.1
	 */
	class The_Bootstrap_Blog_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '';
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= "\n";

        $classes = array();
        if( !empty( $item->classes ) ) {
            $classes = (array) $item->classes;
        }

        $active_class = '';

		if( in_array('current-menu-item', $classes) ) {
            $active_class = ' active';
        } else if( in_array('current-menu-parent', $classes) ) {
            $active_class = ' parent';
        } else if( in_array('current-menu-ancestor', $classes) ) {
            $active_class = ' ancestor';
        } else if( in_array('current_page_item', $classes) ) {
            $active_class = ' page';
        } else if( in_array('current_page_parent', $classes) ) {
            $active_class = ' page-parent';
        } else if( in_array('current_page_ancestor', $classes) ) {
            $active_class = ' page-ancestor';
        }

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $output .= '<a class="nav-link' . $active_class . '"'. $attributes .'>' . $item->title . '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '';
    }


	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback() {

?><nav class="nav">

<?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
<a class="nav-link active" href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Add menu', 'the-bootstrap-blog' ); ?></a>

<?php } else { ?>
<a class="nav-link active" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'the-bootstrap-blog' );?></a>
<?php } ?>
</nav>
<?php
	}

}

endif;
