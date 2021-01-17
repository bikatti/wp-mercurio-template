<?php get_header(); 
      $contents = ['post', 'video'];
?>

<?php require_once "assets/php/tag/header.php"; ?>
<!-- .o-sectionTop -->

<div class="o-content">
    <div class="o-category">
        <?php require_once "assets/php/tag/primary.php"; ?>
        <!-- .m-category__primary -->
        <?php require_once "assets/php/aside.php"; ?>
        <!-- .m-category__secondary -->
    </div>
</div>

<?php get_footer(  ); ?>