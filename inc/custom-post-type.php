<?php
/**
 * Registers news custom post type for Mercurio theme
 *
 * @param      mercurio
 * @package    mercurio
 */

function publicidad_init() {
    $name = 'Publicidad';

    $labels = array(
        'name'              => _x( $name, 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'     => _x( $name, 'post type general name', 'your-plugin-textdomain' ),
        'menu_name'         => _x( $name, 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'    => _x( $name, 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'           => _x( 'Añadir nuevo', $name, 'your-plugin-textdomain' ),
        'add_new_item'      => __( 'Añadir nueva ' . $name, 'your-plugin-textdomain' ),
        'new_item'          => __( 'Nueva ' . $name, 'your-plugin-textdomain' ),
        'edit_item'         => __( 'Editar ' . $name, 'your-plugin-textdomain' ),
        'view_item'         => __( 'Ver ' . $name, 'your-plugin-textdomain' ),
        'all_items'         => __( 'Todos las ' . $name, 'your-plugin-textdomain' ),
        'search_items'      => __( 'Buscar ' . $name, 'your-plugin-textdomain' ),
        'parent_item_colon' => __( $name . ' padre', 'your-plugin-textdomain' ),
        'not_found'         => __( 'No hemos encontrado ninguna ' . $name, 'your-plugin-textdomain' ),
        'not_found_in_trash'=> __( 'No hemos encontrado ninguna ' . $name . ' en la papelera', 'your-plugin-textdomain' ),
    );

    $args = array(
        'label'            => 'publicidad',
        'description'       => __('Description', 'Aquí podrás postear las entradas que sea más importantes para que salgan en la cabecera principal.'),
        'labels'            => $labels,
        'public'            => true,
        // Significa que lo pude llamar un Loop
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'publicidad' ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-format-image',
        'can_export'        => true,
        'show_in_rest'      => true,
        'supports'          => array( 'title', 'editor', 'author', 'revisions' )
    );

    register_post_type( 'publicidad', $args );
}
add_action( 'init', 'publicidad_init' );

function video_init() {
    $name = 'Video';

    $labels = array(
        'name'              => _x( $name, 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'     => _x( $name, 'post type general name', 'your-plugin-textdomain' ),
        'menu_name'         => _x( $name, 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'    => _x( $name, 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'           => _x( 'Añadir nuevo', $name, 'your-plugin-textdomain' ),
        'add_new_item'      => __( 'Añadir nueva ' . $name, 'your-plugin-textdomain' ),
        'new_item'          => __( 'Nueva ' . $name, 'your-plugin-textdomain' ),
        'edit_item'         => __( 'Editar ' . $name, 'your-plugin-textdomain' ),
        'view_item'         => __( 'Ver ' . $name, 'your-plugin-textdomain' ),
        'all_items'         => __( 'Todos las ' . $name, 'your-plugin-textdomain' ),
        'search_items'      => __( 'Buscar ' . $name, 'your-plugin-textdomain' ),
        'parent_item_colon' => __( $name . ' padre', 'your-plugin-textdomain' ),
        'not_found'         => __( 'No hemos encontrado ninguna ' . $name, 'your-plugin-textdomain' ),
        'not_found_in_trash'=> __( 'No hemos encontrado ninguna ' . $name . ' en la papelera', 'your-plugin-textdomain' ),
    );

    $args = array(
        'label'            => 'video',
        'description'       => __('Description', 'Aquí podrás postear las entradas que sea más importantes para que salgan en la cabecera principal.'),
        'labels'            => $labels,
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        // 'rewrite'           => array( 'slug' => 'video'),
        'capability_type'   => 'post',
        'has_archive'       => 'category',
        'hierarchical'      => false,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-video-alt3',
        'can_export'        => true,
        'show_in_rest'      => true,
        'taxonomies'        => array('post_tag','category'),
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail','revisions','excerpt', 'custom-fields', 'revisions')
    );

    register_post_type( 'video', $args );
}
add_action( 'init', 'video_init' );

// --- Change dashboard Posts to News ---
function change_post_type() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $name = 'Artículo';

    $labels->name               = _x( $name, 'post type general name', 'your-plugin-textdomain' );
    $labels->singular_name      = _x( $name, 'post type general name', 'your-plugin-textdomain' );
    $labels->menu_name          = _x( $name, 'admin menu', 'your-plugin-textdomain' );
    $labels->name_admin_bar     = _x( $name, 'add new on admin bar', 'your-plugin-textdomain' );
    $labels->add_new            = _x( 'Añadir nuevo', $name, 'your-plugin-textdomain' );
    $labels->add_new_item       = __( 'Añadir Nuev0 ' . $name, 'your-plugin-textdomain' );
    $labels->new_item           = __( 'Nuevo ' . $name, 'your-plugin-textdomain' );
    $labels->edit_item          = __( 'Editar ' . $name, 'your-plugin-textdomain' );
    $labels->view_item          = __( 'Ver ' . $name, 'your-plugin-textdomain' );
    $labels->all_items          = __( 'Todos los ' . $name, 'your-plugin-textdomain' );
    $labels->search_items       = __( 'Buscar ' . $name, 'your-plugin-textdomain' );
    $labels->not_found          = _n( 'No se encontro el ' . $name, 'No hemos encontrado ningún ' . $name, 'numero-objeto', 'texto-dominio' );
    $labels->not_found_in_trash = _n( 'No se encontro el ' . $name . ' en Papelera', 'No hemos encontrado ningún ' . $name . ' en Papelera', 'numero-objeto', 'texto-dominio' );
}
add_action( 'init', 'change_post_type' );

// --- Remove Commets of Post Type 'Post' ---
function comments_remove_post_type_support() {
    remove_post_type_support( 'post', 'comments' );
}
add_action( 'init', 'comments_remove_post_type_support' );