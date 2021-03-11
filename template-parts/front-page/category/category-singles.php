<?php
/**
 * Artículos de la categoría
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$argumentos = array(
    'post_type' => $contents,
    'posts_per_page' => $args['number_post'],
    'cat' => $args['category'],
    'order' => 'DESC',
    'orderby' => 'date'
);
$the_query = new WP_Query($argumentos);
?>


<div class="m-section__grid">
    <div class="m-cards__grid">
        <?php 
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post(  );
                    ?>
                        <div class="m-cards__gridItem">
                            <article class="m-card m-card__grid">
                                <a href="<?php echo esc_url(the_permalink( )); ?>" class="m-card__wrap">
                                    <figure class="m-card__img">
                                        <div class="m-crop m-crop__ratio3x2">
                                            <?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?>
                                        </div><!-- .m-crop -->
                                    </figure><!-- .m-card__img -->
                                    
                                    <header class="m-card__header">
                                        <h3 class="m-card__heading -bold">
                                            <?php the_title(); ?>
                                        </h3><!-- .m-card__heading -->

                                        <div class="m-card__tag -bold -uppercase">
                                            <span class="m-card__featuredTag -bold -uppercase">
                                                <?php the_category_child(); ?>
                                            </span><!-- .m-card__featuredTag -->
                                        </div><!-- .m-card__tag -->

                                        <p class="m-card__byLine -copy">Por <?php echo get_the_author( ); ?></p><!-- .m-card__byLine -->
                                        <p class="m-card__lead -copy"> <?php echo esc_html(get_the_excerpt()); ?> </p><!-- .m-card__lead -->
                                    </header><!-- .m-card__header -->
                                </a><!-- .m-card__wrap -->
                            </article><!-- .m-card -->
                        </div><!-- .m-cards__gridItem -->
                    <?php
                }
            } 
        ?> 
    </div><!-- .m-cards__grid -->
</div><!-- .m-section__grid -->