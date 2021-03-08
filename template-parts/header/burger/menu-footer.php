<?php
/**
 * Contenido del final del menu burger. últimos links y copyright
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<div class="m-menuOut__row">

    <div class="m-menuOut__block m-menuOut__blockLink">
        <?php wp_nav_menu(
                array(
                    'theme_location'  => 'imp_stuff',
                    'menu_class'      => 'm-menuOut__menu',
                    'container' => 'ul',
                    'walker' => new upperWalker(),
                )
        ); ?><!-- .m-menuOut__menu -->
    </div><!-- .m-menuOut__block.m-menuOut__blockLink -->

    <div class="m-menuOut__block m-menuOut__blockLegal">
        <a href="https://monmedios.com" class="a-legalCompany -colorLightin">Monmedios</a><!-- .a-legalCompany.-colorLightin -->
        <?php // dynamic_sidebar( 'cprt' );?>
    </div><!-- .m-menuOut__block.m-menuOut__blockLegal -->

</div><!-- .m-menuOut__row -->