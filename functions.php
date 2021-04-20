<?php
/**
 * Functions and definitions
 *
 * @param      mercurio
 * @package    mercurio
 */


function init_template() {
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-logo' );
    add_theme_support('editor-styles');

    register_nav_menus( 
        array(
            'top_menu' => 'Menú Principal',
            'sub_menu'     => __( 'Segundo menú (menu burguer)' ),
            'footer_one'   => __( '1er parte del Footer' ),
            'footer_two'   => __( '2da parte del Footer' ),
            'footer_three' => __( '3era parte del Footer' ),
            'footer_four'  => __( '4ta parte del Footer' ),
            'editor_picks' => __( 'Favs del editor' ),
            'imp_stuff'    => __( 'Páginas estaticas' )
        )
    );
}
add_action('after_setup_theme', 'init_template');


function assets() {
    $ver = '1.3.27';
    wp_register_style( 'rubik', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', '', $ver , 'all' );
    wp_register_style( 'Frank Ruhl Libre', 'https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&display=swap', '', $ver, 'all' );

    wp_register_style( 'front-page', get_template_directory_uri( ).'/assets/css/front-page.css', '', $ver, 'all' );
    wp_register_style( 'category', get_template_directory_uri( ).'/assets/css/categories.css', '', $ver, 'all' );
    wp_register_style( 'single', get_template_directory_uri( ).'/assets/css/single.css', '', $ver, 'all' );
    wp_register_style( 'search', get_template_directory_uri( ).'/assets/css/search.css', '', $ver, 'all' );

    wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css','','5.0.0', 'all');
    if ( is_front_page() || is_home() || is_404()) {
        wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array(  'bootstrap', 'rubik', 'Frank Ruhl Libre', 'front-page'), $ver, 'all' );
    }
    if ( is_archive() ) {
        wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array(  'bootstrap', 'rubik', 'Frank Ruhl Libre', 'category' ), $ver, 'all' );
    }
    if ( is_singular() ) {
        wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array(  'bootstrap', 'rubik', 'Frank Ruhl Libre', 'single'), $ver, 'all' );
    }
    if ( is_search() ) {
        wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array(  'bootstrap', 'rubik', 'Frank Ruhl Libre', 'search' ), $ver, 'all' );
    }

    wp_enqueue_script( 'jscustom', get_template_directory_uri( ).'/assets/js/custom.js', '', $ver, true );
    wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js', '', '5.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'assets' );


function site_block_editor_js() {
    $ver = '1.3.26';
    wp_register_style( 'rubik', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', '', $ver , 'all' );
    wp_register_style( 'Frank Ruhl Libre', 'https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&display=swap', '', $ver, 'all' );
    
    wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array( 'rubik', 'Frank Ruhl Libre'), $ver, 'all' );
    wp_enqueue_script( 'header', get_template_directory_uri( ).'/assets/js/addHeader.js', '', $ver, true );
}
add_action( 'enqueue_block_editor_assets', 'site_block_editor_js' );

/**
 * Classes
 */
require get_template_directory() . '/classes/class-mercurio-walker-nav-menu.php';

/**
 * Inc
 */
require get_template_directory() . '/inc/change-structured-wp.php';

require get_template_directory() . '/inc/custom-wp-admin.php';

require get_template_directory() . '/inc/custom-post-type.php';

require get_template_directory() . '/inc/add-class-on-html.php';

require get_template_directory() . '/inc/popular-post.php';

require get_template_directory() . '/inc/custom-function.php';

require get_template_directory() . '/inc/search-autocomplete.php';

require get_template_directory() . '/inc/widget.php';

require get_template_directory() . '/inc/customizer.php';

// require get_template_directory() . '/inc/color-scheme-customizer.php';