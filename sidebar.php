<?php
/**
 * The template for displaying sidebars
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#displaying-sidebars-in-your-theme
 *
 * @subpackage The Bootstrap Blog
 * @since 0.1
 */
?><div class="col-sm-3 offset-sm-1 blog-sidebar mb-3">

<?php if ( is_active_sidebar('sidebar') ) : dynamic_sidebar('sidebar'); endif;?>

</div><!-- /.blog-sidebar -->
