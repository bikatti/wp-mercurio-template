<?php
/**
 * Bloque oscuro de últimos artículos de un Tag
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$argumentos = array(
    'post_type' => $contents,
    'tag_id'    => $args['tag'],
    'posts_per_page' => 5,
    'order' => 'DESC',
    'orderby' => 'date'
);
$term = get_term( $args['tag'], 'post_tag' );
$the_query = new WP_Query($argumentos);
?>


<div class="o-section -noSeparator -withBottomMargin">
    <div class="m-coverage">
        <?php 
            if ($the_query->have_posts()) { ?>
                <h3 class="m-coverage__title">
                    <span class="-bold -colorLightin">
                        <?php echo $term->name; ?>
                    </span>
                </h3><!-- .m-coverage__title -->

                <ul class="m-newswire -newsDark">
                <?php
                while ($the_query->have_posts()) {
                    $the_query->the_post(  );
                    ?>
                        <li class="m-newswire__item">
                            <article class="m-card m-card__coverage">
                                <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="m-card__wrap">

                                    <figure class="m-card__img">
                                        <div class="m-crop m-crop__ratio3x2">
                                            <?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?><!-- .m-crop__img -->
                                        </div><!-- .m-crop -->
                                    </figure><!-- .m-card__img -->

                                    <header class="m-card__header">
                                        <h3 class="m-card__heading -bold -colorLightin">
                                            <?php the_title(); ?>
                                        </h3><!-- .m-card__heading -->
                                    </header><!-- .m-card__header -->

                                </a><!-- .m-card__wrap -->
                            </article><!-- .m-card__coverage -->
                        </li><!-- m-newswire__item" -->
                <?php } ?>
                </ul><!-- .m-newswire -->
            <?php } ?>
    </div><!-- .m-coverage -->
</div><!-- .o-section -->