<?php
/**
 * Headliners de la revista
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<div class="o-headlines <?php if ($args['version'] == 1) esc_attr_e('-version1') ; ?>">
    <?php get_template_part( 'template-parts/front-page/headliners/covers' ); ?>
    <?php get_template_part( 'template-parts/front-page/headliners/the-list' ); ?>

    <aside class="m-headline__sidebar">
        <?php 
        get_template_part( 'template-parts/aside/trending-default' );

        // Publidad de la revista
        the_ads('1');
        ?>
    </aside><!-- .m-headline__sidebar -->
</div><!-- .o-headlines -->