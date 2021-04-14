<?php
/**
 * Tendencia, lista de los 5 artículos más visitados
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

/**
 * Query de 5 artículos más vistos
 */
$argumentos = array(
    'post_type' => $contents,
    'posts_per_page' => 5,
    'meta_key' => 'wpb_post_views_count',
    'orderby'=>'meta_value_num', 
    'order' => 'DESC'
);
$the_query = new WP_Query($argumentos);
?>


<div class="m-headline__sidebarItem">
    <div class="m-trending m-trending__hero">
        <h4 class="m-trending__heading -bold -loose">Tendencias</h4><!-- .m-trending__heading -->
        <ol class="m-trending__list">
            <?php 
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post(  );
                        ?>
                        <li class="m-trending__item">
                            <a href="<?php the_permalink( ); ?>" class="-trendingLink">
                                <h5 class="m-trending__title">
                                    <div class="m-trending__number"><span class="m-trending__counter -bold"></span></div><!-- .m-trending__number -->
                                    <span class="m-trending__caption -semiBold"><?php the_title(); ?></span><!-- .m-trending__caption -->
                                </h5><!-- .m-trending__title -->
                            </a><!-- .-trendingLink -->
                        </li><!-- .m-trending__item-->
                    <?php }
                }
            ?>
        </ol><!-- .m-trending__list -->
    </div><!-- .m-trending.m-trending__herom -->
</div><!-- .m-headline__sidebarItem -->

