<?php
/**
 * Publicidad y Up Arrow
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<div class="m-section__sidebar">
    <?php the_ads($args['ad']); ?>
    <div class="m-section__sticky -sizeGrow">
        <div class="m-sticky__item -sticky">
            <a href="#" class="m-theList">
                <h4 class="m-theList__headline -bold"><?php _e($args['up_arrow']) ?></h4><!-- .m-theList__headline -->
            </a><!-- .m-theList -->
        </div><!-- .m-sticky__item -->
    </div><!-- .m-section__sticky -->
</div><!-- .m-section__sidebar -->