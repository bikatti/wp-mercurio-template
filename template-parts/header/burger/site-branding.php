<?php
/**
 * Muestra el logotipo de la marca del Wordpress en el menu burger
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$blog_info      = get_bloginfo( 'name' );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image          = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<a href="<?php echo home_url( ); ?>" class="m-menuOut__branding">
    <img class="m-menuOut__logo" src="<?php esc_attr_e( $image[0] ); ?>" alt="logotipo de <?php esc_attr_e( get_bloginfo('name') ); ?>"><!-- .m-menuOut__logo -->
</a><!-- .m-menuOut__branding -->
