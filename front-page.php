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
    <?php require_once "assets/php/front-page/headline.php"; ?>
    <!-- .o-headlines -->
    <?php require_once "assets/php/front-page/features.php"; ?>
    <!-- .o-section.-noSeparator.-withBottomMargin (_section-two.scss) -->
    <?php require_once "assets/php/front-page/category-book.php"; ?>
    <!-- .o-section (_section.scss/_reviews.scss/_cards.scss) -->
    <?php require_once "assets/php/front-page/lastest.php"; ?>
    <!-- .o-section.-noSeparator.-withBottomMargin (_section-tree.scss) -->
    <?php // require_once "assets/php/front-page/category-author.php"; ?>
    <!-- .o-section (_section.scss/_reviews.scss/_cards.scss) -->
    <?php // require_once "assets/php/front-page/category-3.php"; ?>
    <!-- .o-section (_section.scss/_reviews.scss/_cards.scss) -->
    <?php // require_once "assets/php/front-page/video.php"; ?>
    <!-- .o-section -->
    <?php require_once "assets/php/front-page/category-4.php"; ?>
    <!-- .o-section (_section.scss/_reviews.scss/_cards.scss) -->
    <?php require_once "assets/php/front-page/last-category.php"; ?>
    <!-- .o-section (_section-four.scss) -->
</div>

<?php get_footer(); ?>