<?php
/**
 * Muestra el logotipo de la marca del Wordpress en el menu de arriba
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$blog_info      = get_bloginfo( 'name' );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image          = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<div class="m-header__brand">

    <a href="<?php echo esc_url( home_url( ) ); ?>">
        <img src="<?php esc_attr_e( $image[0] ); ?>" alt="logotipo de <?php echo esc_attr( $blog_info ); ?>">
    </a>

</div><!-- .m-header__brand -->