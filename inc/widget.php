<?php
/**
 * Wigdets
 *
 * @param      mercurio
 * @package    mercurio
 */


function sidebar() {
    register_sidebar(
        array(
            'name' => 'Social Media',
            'id' => 'social-media',
            'description' => 'Zona de Social Media',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget'  => '',
        )
    );
}
add_action('widgets_init', 'sidebar');

function copyright() {
    register_sidebar(
        array(
            'name' => 'Copyrigth',
            'id' => 'cprt',
            'description' => 'Copyright del contenido de la página web',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget'  => '',
        )
    );
}
add_action('widgets_init', 'copyright');