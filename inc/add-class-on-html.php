<?php
/**
 * Add classes on function of Wordpress
 *
 * @param      mercurio
 * @package    mercurio
 */


function add_class_the_tags( $html ) {
    $html = str_replace('<a','<a class="-tagLink"', $html);
    return $html;
}
add_filter('the_tags','add_class_the_tags');

function add_class_the_category( $html ) {
    $html = str_replace('<a','<a class="-categoryLink"', $html);
    return $html;
}
add_filter('the_category','add_class_the_category');

function add_class_the_author_link( $html ) {
    $html = str_replace('<a','<a class="-byLink -uppercase -bold"', $html);
    return $html;
}
add_filter('the_author_posts_link','add_class_the_author_link');

function n_posts_link_attributes() {
    return 'class="a-btn a-pagination__btn -semiBold -uppercase -right"';
}
add_filter('next_posts_link_attributes', 'n_posts_link_attributes');

function p_posts_link_attributes() {
    return 'class="a-btn a-pagination__btn -semiBold -uppercase"';
}
add_filter('previous_posts_link_attributes', 'p_posts_link_attributes');