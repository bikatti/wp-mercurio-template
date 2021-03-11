<?php
/**
 * Artículo destacados
 * 
 * En el mobile puedes hacer scrolling para otras partes
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<article class="m-features__item m-slider__item" data-slider-item>
    <a href="<?php echo esc_url( the_permalink( )); ?>" class="m-featuresItem__wrap">
        <figure class="m-featuresItem__img">
            <div class="m-crop m-crop__ratio11x14">
                <?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?><!-- .m-crop__img -->
            </div><!-- .m-crop -->
        </figure><!-- .m-featuresItem__img -->
        <header class="m-featuresItem__header">
            <h3 class="m-featuresItem__heading -bold -colorLightin">
                <?php the_title(); ?>
            </h3><!-- .m-featuresItem__heading -->
        </header><!-- .m-featuresItem__header -->
    </a><!-- .m-featuresItem__wrap -->
</article><!-- .m-features__item -->