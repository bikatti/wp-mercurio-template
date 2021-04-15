<?php
/**
 * Author view
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$contents = ['post', 'video'];
$imgClass = 'm-crop__img -headline';

$args = [
    'taxonomy_id'   => $author,
    'cropImag' => $imgClass,
    'trending' => '',
    'ad_1'     => 8,
    'ad_2'     => 9,
];

get_header();
?>

<div class="o-content">
    <div class="o-category">
        <?php 
        get_template_part( 'template-parts/author/content', '', $args );
        
        get_template_part( 'template-parts/aside/aside', '', $args );
        ?>
    </div><!-- .o-category -->
</div><!-- .o-content -->

<?php 
get_footer(  );