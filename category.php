<?php 
/**
 * Muestra el buscador en el Header
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$contents = ['post', 'video'];
$categoryId = get_category( get_query_var( 'cat' ) );
$imgClass = 'm-crop__img -headline';
$args = [
    'cat_id'   => $categoryId,
    'cropImag' => $imgClass,
    'trending' => 'category',
    'ad_1'     => 6,
    'ad_2'     => 7
];

get_header(); 

get_template_part( 'template-parts/category/menu', '', $args ); 
?>

<div class="o-content">
    <div class="o-category">
        <?php get_template_part( 'template-parts/category/main/main', '', $args ); ?>
        
        <<?php get_template_part( 'template-parts/aside/aside', '', $args ); ?>
    </div><!-- .o-category -->
</div><!-- .o-content -->

<?php get_footer(  ); ?>