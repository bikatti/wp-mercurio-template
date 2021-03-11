<?php
/**
 * Bloque de reseñas de libros
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$argumentos = array(
    'post_type' => $contents,
    'posts_per_page' => 4,
    'meta_key'		=> 'nombre_rv',
    'order' => 'DESC',
    'orderby' => 'date'
);
$the_query = new WP_Query($argumentos);
?>


<h3 class="m-reviews__label">
    <span class="a-reviews__labelHead -bold">Reseñas</span><!-- .a-reviews__labelHead -->
    <span class="a-reviews__labelTail -bold">Varias</span><!-- .a-reviews__labelTail -->
</h3><!-- .m-reviews__label -->

<ul class="m-reviews__list">
    <?php 
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post(  );
                $campos_album = get_post_custom( $post_id );
                $image = get_field('portada_rv');
                ?>
                <li class="m-reviews__item">
                    <article class="m-reviewsCard">
                        <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="m-reviewsCard__wrap">
                        
                            <figure class="m-reviewsCard__img">
                                <div class="m-reviewsCard__crop m-crop m-crop__ratio1x1">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="m-crop__img"><!-- .m-crop__img -->
                                </div><!-- .m-reviewsCard__crop -->
                            </figure><!-- .m-reviewsCard__img -->

                            <header class="m-reviewsCard__header">
                                <div class="m-reviewsCard__rating"></div><!-- .m-reviewsCard__rating -->
                                <h4 class="m-reviewsCard__headline -copy">
                                    <?php echo $campos_album['nombre_rv'][0]; ?>
                                </h4><!-- .m-reviewsCard__headline -->
                                <p class="m-reviewsCard__lead -copy">
                                    <?php echo get_the_excerpt(); ?>
                                </p><!-- .m-reviewsCard__lead -->
                                <div class="m-reviewsCard__cta">
                                    <span class="-semiBold -uppercase">Leer más</span>
                                </div><!-- .m-reviewsCard__cta -->
                            </header><!-- .m-reviewsCard__header -->

                        </a><!-- .m-reviewsCard__wrap -->
                    </article><!-- .m-reviewsCard -->
                </li><!-- .m-reviews__item -->
            <?php
            }
        } 
    ?>
</ul><!-- .m-reviews__list -->