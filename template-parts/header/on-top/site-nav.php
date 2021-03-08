<?php
/**
 * Menu sticky
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>

<nav class="m-header__nav">

    <div class="m-header__toggle">
        <button class="m-menuBurguer" id="burgerOpen">

            <svg class="a-icon__burguer" id="svgIconBurguer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M-6160,15V12h18v3Zm1.5-6a1.5,1.5,0,0,1-1.5-1.5,1.5,1.5,0,0,1,1.5-1.5h15a1.5,1.5,0,0,1,1.5,1.5,1.5,1.5,0,0,1-1.5,1.5Zm-1.5-6V0h18V3Z" transform="translate(6160.001)"/>
            </svg><!-- .a-icon__burguer#svgIconBurguer -->

            <span class="a-burguer__lable -semiBold">Menu</span><!-- .a-burguer__lable.-semiBold -->

        </button><!-- .m-menuBurguer#burgerOpen -->
    </div><!-- .m-header__toggle -->

    <?php wp_nav_menu(
            array(
                'theme_location'  => 'top_menu',
                'menu_class'      => 'm-header__menu -semiBold',
                'container' => 'ul',
                'walker' => new ClassLiWalker(),
            )
    ); ?>
    <!-- .m-header__menu.-semiBold -->

</nav><!-- .m-header__nav -->