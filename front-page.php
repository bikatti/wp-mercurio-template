<?php get_header(); ?>

<?php   $contents = array('post', 'headliner');
        global $contents;
?>
<div class="o-content">
    <?php require_once "assets/php/front-page/headline.php"; ?>
    <!-- .o-headlines -->
    <?php require_once "assets/php/front-page/features.php"; ?>
    <!-- .o-section.-noSeparator.-withBottomMargin (_section-two.scss) -->
    <?php require_once "assets/php/front-page/lastest.php"; ?>
    <!-- .o-section.-noSeparator.-withBottomMargin (_section-tree.scss) -->
    <?php require_once "assets/php/front-page/category-1.php"; ?>
    <!-- .o-section (_section.scss/_reviews.scss/_cards.scss) -->
    <?php require_once "assets/php/front-page/category-2.php"; ?>
    <!-- .o-section (_section.scss/_reviews.scss/_cards.scss) -->
    <?php require_once "assets/php/front-page/category-3.php"; ?>
    <!-- .o-section (_section.scss/_reviews.scss/_cards.scss) -->
    <?php require_once "assets/php/front-page/category-4.php"; ?>
    <!-- .o-section (_section.scss/_reviews.scss/_cards.scss) -->
    <?php require_once "assets/php/front-page/last-category.php"; ?>
    <!-- .o-section (_section-four.scss) -->
</div>

<?php get_footer(); ?>