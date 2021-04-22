<?php
/**
 * Subcategory View
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
    'taxonomy_id'   => $subcategory,
    'cropImag'      => $imgClass,
    'trending'      => '',
    'ad_1'          => 7,
    'ad_2'          => 8,
    'name_taxonomy' => $categoryName
];

get_header();

get_template_part( 'template-parts/taxonomy/header', '', $args );
?>

<div class="o-content">
    <div class="o-category">
        <?php 
        get_template_part( 'template-parts/taxonomy/content', '', $args );
        
        get_template_part( 'template-parts/aside/aside', '', $args ); 
        ?>
    </div><!-- .o-category -->
</div><!-- .o-content -->

<?php 
get_footer( );