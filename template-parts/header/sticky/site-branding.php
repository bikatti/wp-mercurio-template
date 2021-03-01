<?php
/**
 * Muestra el logotipo de la marca del Wordpress en el menu sticky
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$blog_info    = get_bloginfo( 'name' );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>


<a href="<?php echo home_url( ); ?>" class="m-header__brand m-header__brandFixed">
    <img src="<?php esc_attr_e( $image[0] ); ?>" alt="logotipo de <?php esc_attr_e( $blog_info ); ?>">
</a>
<!-- .m-header__brand .m-header__brandFixed -->