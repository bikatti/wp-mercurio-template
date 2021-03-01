<?php
/**
 * Enviar tip y Copyright footer
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>


<div class="m-footer__tip">
    <!-- <div class="m-footerTip__heading m-firm__logo">
        <a href="https://monlogo.co" target="_blank">
            <img src="<?php // echo get_template_directory_uri( ). '/assets/img/monlogo/imagotipo_white.png' ?>" alt="Logotipo de Monlogo">
        </a>
    </div> .m-footerTip__heading.m-firm__logo -->
    <!-- <p class="m-footerTip__heading -colorLightin -bold">¿Sugerencías?</p> -->
    <div class="m-footerTip__body"><?php echo '© '. date('Y') . ' Monlogo, una división de servicios de Prointelecto C.A.'; ?><br> Soportado por una plataforma digital Monmedios</div><!-- .m-footerTip__body -->
    <!-- <a href="#" class="m-footerTip__link -colorLightin -bold">Enviar</a> -->
    <img src="<?php echo $image[0]; ?>" alt="logotipo de <?php echo esc_attr( get_bloginfo('name') ); ?>" class="m-footer__logo"><!-- .m-footer__logo -->
</div><!-- .m-footer__tip -->