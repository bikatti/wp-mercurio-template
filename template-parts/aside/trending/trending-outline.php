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
    'order'=>'DESC'
);
$headlines = new WP_Query($argumentos);
$iter = 0;

?>


<div class="m-blog__item">
    <div class="m-trending m-trending__sidebar">
        <h4 class="m-trending__heading -bold -loose">
            <?php echo get_option( 'mercurio_trending_text', __( 'Tendencia', 'nd_dosth' ) ); ?>
        </h4><!-- .m-trending__heading -->
        <ol class="m-trending__list">
            <?php 
                if ($headlines->have_posts()) {
                    while ($headlines->have_posts()) {
                        $headlines->the_post(  );
                        if($iter === 0) {
                            $iter++;
                        ?>
                            <li class="m-trending__item -featured">
                                <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="-trendingLink">
                                    <div class="m-trending__img m-crop m-crop__ratio3x2"><?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?></div><!-- .m-trending__img -->
                                    <h5 class="m-trending__title">
                                        <div class="m-trending__number">
                                            <span class="m-trending__counter -bold"></span>
                                        </div><!-- .m-trending__number -->
                                        <span class="m-trending__caption -semiBold"><?php the_title(); ?></span><!-- .m-trending__caption -->
                                    </h5><!-- .m-trending__title -->
                                </a><!-- .-trendingLink -->
                            </li><!-- .m-trending__item -->
                    <?php } else {
                            ?>
                            <li class="m-trending__item">
                                <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="-trendingLink">
                                    <h5 class="m-trending__title">
                                        <div class="m-trending__number">
                                            <span class="m-trending__counter -bold"></span>
                                        </div><!-- .m-trending__number -->
                                        <span class="m-trending__caption -semiBold"><?php the_title(); ?></span><!-- .m-trending__caption -->
                                    </h5><!-- .m-trending__title -->
                                </a><!-- .-trendingLink -->
                            </li><!-- .m-trending__item -->
                            <?php
                        }
                    }
                } 
            ?>
        </ol><!-- .m-trending__list -->
    </div><!-- .m-trending -->
</div><!-- .m-blog__item -->