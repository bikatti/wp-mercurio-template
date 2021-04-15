<?php
/**
 * Content of a page
 *
 * @package Mercurio
 * @subpackage Mercurio
 */


if (have_posts()) {
    while(have_posts()) {
        the_post(  );
        ?>
        <div class="m-content m-content__withoutSidebar -copy ">
            <h1><?php the_title( ); ?></h1>
            <?php the_content( ); ?>
        </div>
        <?php
    }
} else {
    ?>
        <p><?php _e('Esta página no tiene contenido'); ?></p>
    <?php
}