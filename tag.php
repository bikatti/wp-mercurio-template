<?php
/**
 * Tag view
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$tag = get_queried_object();

$contents = ['post', 'video'];
$imgClass = 'm-crop__img -headline';

$args = [
    'taxonomy_id'   => $tag,
    'cropImag' => $imgClass,
    'trending' => '',
    'ad_1'     => 11,
    'ad_2'     => 12,
    'name_taxonomy' => $tag
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
get_footer(  );