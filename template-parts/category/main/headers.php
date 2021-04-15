<?php 
/**
 * Headers posts of the category. Order by desc
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$argumentos = array(
    'post_type'      => $contents,
    'cat'            => $args['taxonomy_id']->term_id,
    'meta_key' 	    => 'titulares_de_categorias',
    'meta_value'	 => true,
    'posts_per_page' => 3,
    'order'          => 'DESC',
    'orderby'        => 'date'
);
$the_query = new WP_Query($argumentos);
$iter = 0;
?>

<div class="m-category__item">
    <section class="m-3Pack">
        <?php
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post(  );
                    
                    if($iter == 0) {
                        $iter++;
                    ?>
                        <div class="m-3Pack__item">
                            <article class="m-card m-card__overlay -home">
                                <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="m-card__wrap">
                                    <figure class="m-card__img">
                                        <div class="m-crop m-crop__ratio1x1"><?php the_post_thumbnail( 'large', ['class' => $args['cropImag'] ] ); ?></div><!-- .m-crop -->
                                    </figure><!-- .m-card__img -->

                                    <header class="m-card__header">
                                        <h3 class="m-card__heading -bold -colorLightin"><?php the_title(); ?></h3><!-- .m-card__heading -->

                                        <div class="m-card__tag -bold -uppercase">
                                            <span class="m-card__featuredTag"><?php the_category_child(); ?></span><!-- .m-card__featuredTag -->
                                        </div><!-- .m-card__tag -->

                                        <p class="m-card__lead -colorLightin"><?php _e( get_the_excerpt() ); ?></p><!-- .m-card__lead -->
                                    </header><!-- .m-card__header -->
                                </a><!-- .m-card__wrap -->
                            </article><!-- .m-card -->
                        </div><!-- .m-3Pack__item -->
                <?php } else {
                    ?>
                        <div class="m-3Pack__item">
                            <article class="m-card -ftHome">
                                <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="m-card__wrap">

                                    <figure class="m-card__img">
                                        <div class="m-crop m-crop__sizeFt"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?></div><!-- .m-crop -->
                                    </figure><!-- .m-card__img -->
                                    
                                    <header class="m-card__header">
                                        <h3 class="m-card__heading -bold"><?php the_title(); ?></h3><!-- .m-card__heading -->

                                        <div class="m-card__tag -bold -uppercase">
                                            <span class="m-card__featuredTag"><?php the_category_child(); ?></span><!-- .m-card__featuredTag -->
                                        </div><!-- .m-card__tag -->
                                    </header><!-- .m-card__header -->

                                </a><!-- .m-card__wrap -->
                            </article><!-- .m-card -->
                        </div><!-- m-3Pack__item [secondary|tertiary] -->
                <?php } 
                }
            } 
        ?> 
    </section><!-- .m-3Pack -->
</div><!-- .m-category__item -->