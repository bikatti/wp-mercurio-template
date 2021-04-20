<?php
/**
 * Change structured wordpress
 *
 * @param      mercurio
 * @package    mercurio
 */


// Remove Sticky option on Post
function noSticky( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        $query->set( 'ignore_sticky_posts', 1 );
    }
}
add_filter( 'pre_get_posts', 'noSticky' );

// Create the subcategory view
function wpd_subcategory_template( $template ) {
    $cat = get_queried_object();
    if( 0 < $cat->category_parent ) {
        $template = locate_template( 'subcategory.php' );
    }
    return $template;
}
add_filter( 'category_template', 'wpd_subcategory_template' );