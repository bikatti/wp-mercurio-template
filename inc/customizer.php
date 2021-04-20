<?php
/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    mercurio
 */


function customize_texts_theme( $wp_customize ) {
    $wp_customize->add_panel( 'text_theme_options', 
    [
        'priority'       => 100,
        'title'            => __( 'Personalización de textos', 'nd_dosth' ),
        'description'      => __( 'Inputs para personalizar textos de la revista digital', 'nd_dosth' ),
    ]);
 
    $wp_customize->add_section( 'mercurio_text_options', 
    [
        'title'         => __( 'Bloque de portada', 'nd_dosth' ),
        'priority'      => 1,
        'panel'         => 'text_theme_options'
    ]);
 
    $wp_customize->add_setting( 'mercurio_last_news_text',
    [
        'default'           => __( 'Texto...', 'nd_dosth' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control( 'mercurio_last_news_text', 
    [
        'type'        => 'text',
        'priority'    => 10,
        'section'     => 'mercurio_text_options',
        'label'       => 'Sección de últimas noticias',
        'description' => 'Título de la sección de últimas noticias, coloque lo que crea que entenderá mejor su lector',
    ]);

    // Setting for Read More text.
    $wp_customize->add_setting( 'mercurio_trending_text',
    [
        'type'              => 'option',
        'default'           => __( 'Texto...', 'nd_dosth' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);

    // Control for Read More text
    $wp_customize->add_control( 'mercurio_trending_text', 
    [
        'type'        => 'text',
        'priority'    => 10,
        'section'     => 'mercurio_text_options',
        'label'       => 'Sección de tendencia',
        'description' => 'Título de la sección de los artículos más vistos',
    ]);
}
add_action('customize_register','customize_texts_theme');


function footer_customize_texts_theme( $wp_customize ) { 
    $wp_customize->add_section( 'mercurio_footer_text_options', 
    [
        'title'         => __( 'Bloque de footer', 'nd_dosth' ),
        'priority'      => 1,
        'panel'         => 'text_theme_options'
    ]);

    // --- 1era columna ---
    $wp_customize->add_setting( 'footer_first_column_text',
    [
        'default'           => __( 'Texto...', 'nd_dosth' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);

    // --- 1era columna ---
    $wp_customize->add_control( 'footer_first_column_text', 
    [
        'type'        => 'text',
        'priority'    => 10,
        'section'     => 'mercurio_footer_text_options',
        'label'       => '1era columna Footer',
        'description' => 'Texto del título de 1era la columna',
    ]);

    // --- 2da columna ---
    $wp_customize->add_setting( 'footer_second_column_text',
    [
        'default'           => __( 'Texto...', 'nd_dosth' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);

    // --- 2da columna ---
    $wp_customize->add_control( 'footer_second_column_text', 
    [
        'type'        => 'text',
        'priority'    => 10,
        'section'     => 'mercurio_footer_text_options',
        'label'       => '2da columna Footer',
        'description' => 'Texto del título de 2da la columna',
    ]);

    // --- 3era columna ---
    $wp_customize->add_setting( 'footer_thirds_column_text',
    [
        'default'           => __( 'Texto...', 'nd_dosth' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);

    // --- 3era columna ---
    $wp_customize->add_control( 'footer_thirds_column_text', 
    [
        'type'        => 'text',
        'priority'    => 10,
        'section'     => 'mercurio_footer_text_options',
        'label'       => '3era columna Footer',
        'description' => 'Texto del título de 3era la columna',
    ]);

    // --- 4ta columna ---
    $wp_customize->add_setting( 'footer_fourth_column_text',
    [
        'default'           => __( 'Texto...', 'nd_dosth' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);

    // --- 4ta columna ---
    $wp_customize->add_control( 'footer_fourth_column_text', 
    [
        'type'        => 'text',
        'priority'    => 10,
        'section'     => 'mercurio_footer_text_options',
        'label'       => '4ta columna Footer',
        'description' => 'Texto del título de 4ta la columna',
    ]);
}
add_action('customize_register','footer_customize_texts_theme');