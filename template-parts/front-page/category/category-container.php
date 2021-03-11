<?php
/**
 * Categoría
 * 
 * Muestra las últimas noticias de esa categoría,
 * una publicidad, a veces un bloque de reseña
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

?>


<div class="o-section -sec">
    <div class="o-section__header">
        <?php get_template_part( 'template-parts/front-page/category/category-header', null, $args ); ?>
    </div>
    <div class="o-section__content">
        <?php get_template_part( 'template-parts/front-page/category/category-singles', null, $args ); ?>

        <?php get_template_part( 'template-parts/front-page/category/category-aside', null, $args ); ?>
        
        <?php get_template_part( 'template-parts/front-page/category/category-reviews', null, $args ); ?>
    </div>
</div>