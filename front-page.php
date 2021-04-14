<?php
/**
 * Muestra el buscador en el Header
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$contents = ['post', 'video'];


$stickyBox = 'Información actual variada, educativa y contenido acto para todo público';
global $contents;

get_header();
?>


<div class="o-content">
    <?php get_template_part( 
        'template-parts/front-page/headliners/headline-grid', 
        '', 
        $args = [
            'version' => 1
        ] 
    ); ?>

    <?php get_template_part( 'template-parts/front-page/featured/featured-container' ); ?>

    <?php get_template_part( 
        'template-parts/front-page/category/category-container',
         null,
         $args = [
             'category' => 80,
             'number_post' => 3,
             'ad' => 2,
             'up_arrow' => $stickyBox,
             'type_reviews' => 'book'
             ] 
        ); ?>

    <?php get_template_part( 
        'template-parts/front-page/lastest/tag',
        null,
        $args = [
            'tag' => 107
        ]); ?>

    <?php get_template_part( 
        'template-parts/front-page/category/category-container',
         null,
         $args = [
             'category' => 39,
             'number_post' => 3,
             'ad' => 4,
             'up_arrow' => $stickyBox,
             'type_reviews' => 'several'
             ] 
        ); ?>
</div>

<?php get_footer(); ?>