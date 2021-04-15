<?php
/**
 * The Single
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$contents = ['post', 'video'];
$imgClass = 'm-crop__img -headline';

$args = [
    'cropImag' => $imgClass,
    'trending' => '',
    'ad_1'     => 8,
    'ad_2'     => 9,
];

get_header(); 
?>

<div class="o-article">
    <div class="o-blog -containerBlog">
        <?php 
        get_template_part( 'template-parts/single/content', '', $args );
        
        get_template_part( 'template-parts/aside/aside', '', $args );
        ?>
    </div><!-- .o-blog -->
</div><!-- .o-article -->

<?php
get_footer();