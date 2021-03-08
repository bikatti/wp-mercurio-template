<?php
/**
 * El sitio del header.
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

?>

<header class="o-header">
    <div class="m-header__wrap">

        <?php get_template_part( 'template-parts/header/on-top/header-content' ); ?>
        <?php get_template_part( 'template-parts/header/sticky/nav-sticky' ); ?>

    </div><!-- .m-header__wrap -->

    <?php get_template_part( 'template-parts/header/site-search' ); ?>

</header><!-- .o-header -->