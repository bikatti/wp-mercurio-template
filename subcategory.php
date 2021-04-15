<?php
/**
 * Aside
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$subcategory = get_queried_object();

$contents = ['post', 'video'];
$imgClass = 'm-crop__img -headline';
$getCategory = get_category( get_query_var( 'cat' ) );

if($getCategory->parent) {
    $categoryName = $getCategory;
    global $categoryName;
}

$args = [
    'cat_id'   => $subcategory,
    'cropImag' => $imgClass,
    'trending' => '',
    'ad_1'     => 8,
    'ad_2'     => 9,
    'name_taxonomy' => $categoryName
];

get_header();

get_template_part( 'template-parts/taxonomy/header', '', $args );
?>

<div class="o-content">
    <div class="o-category">
        <?php get_template_part( 'template-parts/taxonomy/content', '', $args ); ?>
        
        <?php get_template_part( 'template-parts/aside/aside', '', $args ); ?>
    </div>
</div>

<?php get_footer(  ); ?>