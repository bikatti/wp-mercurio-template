<?php
/**
 * Artículo destacados principal
 * 
 * Este se pone cuando es el último artículo destacado en orden
 * de llegada
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<article class="m-features__main">
    <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="m-featuresMain__wrap">
        <figure class="m-featuresMain__img">
            <div class="m-crop m-crop__sizeFtMain">
                <?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?><!-- .m-crop__img -->
            </div><!-- .m-crop -->
        </figure><!-- .m-featuresMain__img -->
        <span class="m-features__tag -bold -colorLightin">Destacado</span><!-- .m-features__tag -->
        <header class="m-featuresMain__header">
            <h3 class="m-featuresMain__heading -bold -colorLightin">
                <?php the_title(); ?>
            </h3><!-- .m-featuresMain__heading -->
            <p class="m-featuresMain__lead -colorLightin">
                <?php echo get_the_excerpt(); ?>
            </p><!-- .m-featuresMain__lead -->
        </header><!-- .m-featuresMain__header -->
    </a><!-- a.m-featuresMain__wrap -->
</article><!-- .m-features__main -->