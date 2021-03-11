<?php
/**
 * Covers de la revista
 * 
 * Aquí van las noticias más importantes del momento. Se eligen por medio de unos booleans en
 * el panel de gutenberg. Vienen en orden de entrega
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

/**
 * Query para traer el artículo principal
 */
$args = array(
    'post_type' => $contents,
    'posts_per_page' => 1,
    'meta_key'		=> 'titular_principal',
    'meta_value'	=> true,
    'order' => 'DESC',
    'orderby' => 'date'
);
$headlines = new WP_Query($args);
$max = 1;

/**
 * Query para traer dos artículo importantes
 */
$args_query = array(
    'post_type' => $contents,
    'posts_per_page' => 2,
    'meta_key'		=> 'titulares_importantes',
    'meta_value'	=> true,
    'order' => 'DESC',
    'orderby' => 'date'
);
$query = new WP_Query($args_query);
?>


<div class="m-headline__main">
    <section class="m-mainHeader">
        <?php 
            // 1era parte. Artículo principal
            if ($headlines->have_posts()) {
                while ($headlines->have_posts()) {
                    $headlines->the_post(  );
                    ?>
                        <div class="m-mainHeader__item">
                            <article class="m-card m-card__overlay -home">
                                <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                    <figure class="m-card__img">
                                        <div class="m-crop m-crop__ratio5x6"><?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?><!-- .m-crop__img --></div><!-- .m-crop -->
                                    </figure><!-- .m-card__img -->
                                    <header class="m-card__header">
                                        <h3 class="m-card__heading -bold -colorLightin"><?php the_title(); ?></h3><!-- .m-card__heading -->
                                        <div class="m-card__tag -bold -uppercase"><span class="m-card__featuredTag"><?php the_category_child(); ?><!-- .m-card__featuredTag --></span></div><!-- .m-card__tag -->
                                        <p class="m-card__lead -colorLightin"> <?php echo get_the_excerpt(); ?> </p><!-- .m-card__lead -->
                                    </header><!-- .m-card__header -->
                                </a><!-- a.m-card__wrap -->
                            </article><!-- article.m-card__overlay -->
                        </div><!-- m-mainHeader__item -->
                <?php
                }
            }
            // 2da parte. Artículos importantes
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post(  );
                    ?>
                        <div class="m-mainHeader__item">
                            <article class="m-card -ftHome">
                                <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                    <figure class="m-card__img">
                                        <div class="m-crop m-crop__sizeFtHome"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?><!-- .m-crop__img --></div><!-- .m-crop -->
                                    </figure><!-- figure.m-card__img -->
                                    <header class="m-card__header">
                                        <h3 class="m-card__heading -bold"><?php the_title(); ?></h3><!-- .m-card__heading -->
                                        <div class="m-card__tag -bold -uppercase"><span class="m-card__featuredTag"><?php the_category_child(); ?></span><!-- .m-card__featuredTag --></div><!-- .m-card__tag -->
                                    </header><!-- .m-card__header -->
                                </a><!-- .m-card__wrap -->
                            </article><!-- .m-mainHeader__item -->
                        </div><!-- m-mainHeader__item [secondary|tertiary] -->
                <?php
                }
            }
        ?> 
    </section><!-- .m-mainHeader -->
</div><!-- .m-headline__mainHeader -->