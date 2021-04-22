<?php 
/**
 * Category view
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$contents = ['post', 'video'];
$categoryId = get_category( get_query_var( 'cat' ) );
$imgClass = 'm-crop__img -headline';

$args = [
    'taxonomy_id'   => $categoryId,
    'cropImag' => $imgClass,
    'trending' => 'category',
    'ad_1'     => 5,
    'ad_2'     => 6
];

get_header(); 

get_template_part( 'template-parts/category/menu', '', $args ); 
?>

<div class="o-content">
    <div class="o-category">
        <?php 
        get_template_part( 'template-parts/category/main/main', '', $args );
        
        get_template_part( 'template-parts/aside/aside', '', $args );
        ?>
    </div><!-- .o-category -->
</div><!-- .o-content -->

<?php 
get_footer(  );