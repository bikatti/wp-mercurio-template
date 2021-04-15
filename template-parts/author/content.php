<?php
/**
 * Content of author
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

?>

<main class="m-category__primary"> 
    <?php get_template_part( 'template-parts/author/header', '', $args ); ?>

    <div class="m-category__item -pdTopXl">
        <div class="m-section__header">&nbsp;</div><!-- .m-section__header -->
    </div><!-- .m-category__item -->

    <?php get_template_part( 'template-parts/taxonomy/last-news', '', $args ); ?>
</main><!-- .m-category__primary -->