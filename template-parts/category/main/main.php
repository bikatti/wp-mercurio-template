<?php 
/**
 * Main part of the Category View.
 * Contain headers and last news of a category
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

?>


<main class="m-category__primary">
    <?php get_template_part( 'template-parts/category/main/headers', '', $args ); ?>

    <div class="m-category__item -pdTopXl">
        <div class="m-section__header">
            <h3 class="m-section__heading -bold -condensed"><?php _e( 'Últimas Noticias' ) ?></h3><!-- .m-section__heading -->
        </div><!-- .m-section__header -->
    </div><!-- .m-category__item -->

    <?php get_template_part( 'template-parts/category/main/last-news', '', $args ); ?>
</main><!-- .m-category__primary -->