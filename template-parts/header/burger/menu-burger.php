<?php
/**
 * Contenido del Header en el menu de arriba
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<div class="o-content__menu" id="menuContent">

    <div class="o-menuOut">
        <?php get_template_part( 'template-parts/header/burger/close-menu' ); ?>

        <div class="m-menuOut__wrap">

            <div class="m-menuOut__row">

                <?php get_template_part( 'template-parts/header/burger/site-branding' ); ?>

            </div><!-- .m-menuOut__row -->

            <?php get_template_part( 'template-parts/header/burger/site-nav' ); ?>


            <?php get_template_part( 'template-parts/header/burger/form-newsletter' ); ?>

            <?php get_template_part( 'template-parts/header/burger/menu-footer' ); ?>

        </div>
        <!-- .m-menuOut__wrap -->
    </div>

</div>
<!-- .o-content__menu -->