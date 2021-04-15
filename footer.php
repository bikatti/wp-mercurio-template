<?php 
/**
 * The template for displaying the footer
 *r.
 *
 * @package WordPress
 * @subpackage Monmedios
 */

/**
 * Burger menu is disabled by default, but it is activated
 * by an addEventListener of a javascript function
 */
get_template_part( 'template-parts/header/burger/menu-burger' ); 

/**
 * The Footer
 */
get_template_part( 'template-parts/footer/site-footer' );

wp_footer(  ); 

?>


    </body>
</html>