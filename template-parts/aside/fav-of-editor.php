<?php 
/**
 * Aside of the page/post
 *
 * @package Mercurio
 * @subpackage Mercurio
 */


$argumentos = array(
    'post_type'      => $contents,
    'posts_per_page' => 3,
    'numberposts'	 => 3,
    'order'          => 'DESC',
    'meta_key'		 => 'favorito_titulares',
    'meta_value'	 => true
);
$headlines = new WP_Query($argumentos);
$imgClass = 'm-crop__img';
?>


<div class="m-blog__favs">
    <div class="m-blog__item">
        <div class="m-favsEditor">
            <h4 class="m-favsEditor__heading -bold -loose -colorLightin"><?php _e('Favoritos del editor'); ?></h4><!-- .m-favsEditor__heading -->
            <ul class="m-favsEditor__list">
                <?php 
                    if ($headlines->have_posts()) {
                        while ($headlines->have_posts()) {
                            $headlines->the_post(  );
                            ?>
                                <li class="m-favsEditor__item">
                                    <article class="m-card m-card__favs">
                                        <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="m-card__wrap">
                                            <figure class="m-card__img">
                                                <div class="m-crop m-crop__ratio1x1"><?php the_post_thumbnail( 'large', ['class' => $imgClass] ); ?></div><!-- .m-crop -->
                                            </figure><!-- .m-card__img -->

                                            <header class="m-card__header">
                                                <h3 class="m-card__heading -semiBold"><?php the_title(); ?></h3><!-- .m-card__heading -->
                                                <div class="m-card__tag -bold -uppercase">
                                                    <span class="m-card__featuredTag"><?php the_category_child(); ?></span>
                                                </div><!-- .m-card__tag -->
                                            </header><!-- m-card__header -->
                                        </a><!-- .m-card__wrap -->
                                    </article><!-- .m-card .-favs -->
                                </li><!-- .m-favsEditor__item -->
                            <?php
                        }
                    }
                ?>
            </ul><!-- .m-favsEditor__list -->
        </div><!-- .m-favsEditor -->
    </div><!-- m-blog__item -->
</div><!-- .m-blog__favs -->