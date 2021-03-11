<?php
/**
 * Lista de los últimos 4 artículos de la revista
 * 
 * Una lista de los últimos artículos que se han publicado en la revista. Con un link 
 * para ir a los artículos del mes.
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

/**
 * Query de la lista
 */
$args = array(
    'post_type' => $contents,
    'posts_per_page' => 4,
    'order' => 'DESC',
    'orderby' => 'date'
);
$the_query = new WP_Query($args);
?>


<div class="m-headline__list">
    <div class="m-lastestList">
        <div class="m-lastestList__header">
            <h4 class="m-lastestList__heading -bold">Últimas Noticias</h4><!-- .m-lastestList__heading -->
        </div><!-- .m-lastestList__header -->

        <?php 
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post(  );
                    ?>
                    <div class="m-lastestList__item">
                        <article class="m-card -excerpt">
                            <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                <figure class="m-card__img">
                                    <div class="m-crop m-crop__ratio3x2">
                                        <?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?><!-- .m-crop__img -->
                                    </div><!-- .m-crop -->
                                </figure><!-- .m-card__img -->

                                <header class="m-card__header">
                                    <h3 class="m-card__heading -copy">
                                        <?php the_title(); ?>
                                    </h3><!-- .m-card__heading -->
                                    <div class="m-card__tag -bold -uppercase">
                                        <span class="m-card__featuredTag">
                                            <?php the_category_child(); ?>
                                        </span><!-- .m-card__featuredTag -->
                                    </div><!-- .m-card__tag -->
                                </header><!-- .m-card__header -->
                            </a><!-- .m-card__wrap -->
                        </article><!-- .m-card -->
                    </div><!-- .m-lastestList__item -->
                    <?php // En el último artículo de la lista no debe mostrar este <hr /> ?>
                    <hr class="m-lastestList__line" /><!-- .m-mainHeader__item -->
                <?php }
            }
        ?>
        <a href="<?php echo get_month_link('', ''); ?>" class="m-lastestList__cta"><span class="-semiBold">Más noticias</span></a><!-- .m-lastestList__cta -->
    </div><!-- .m-lastestList -->
</div><!-- .m-headline__list -->