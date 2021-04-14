<?php 
/**
 * Muestra el buscador en el Header
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$contents = ['post', 'video'];

get_header(); 

get_template_part( 
    'template-parts/category/menu', 
    '', 
    $args = [
        'version' => 1
    ]
); 
?>

<div class="o-content">
    <div class="o-category">
        <?php require_once "assets/php/category/primary.php"; ?>
        <!-- .m-category__primary -->
        <?php require_once "assets/php/category/secondary.php"; ?>
        <!-- .m-category__secondary -->
    </div>
</div>

<?php get_footer(  ); ?>