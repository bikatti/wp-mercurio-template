<?php 
/**
 * Last news of the category. Order by desc
 * 
 * @package Mercurio
 * @subpackage Mercurio
 */

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if ( is_category() ) {
    $argumentos = array(
        'post_type' => $contents,
        'cat' => $args['taxonomy_id']->term_id,
        'posts_per_page' => 5,
        'paged' => $paged
    );
} elseif ( is_author() ) {
    $argumentos = array(
        'post_type' => $contents,
        'author' => $args['taxonomy_id']->ID,
        'posts_per_page' => 5,
        'paged' => $paged
    );
} else {
    $argumentos = array(
        'post_type' => $contents,
        'tag_id' => $args['taxonomy_id']->term_id,
        'posts_per_page' => 5,
        'paged' => $paged
    );
}

$the_query = new WP_Query($argumentos);


if ($the_query->have_posts()) {
?>
    <div class="m-category__item -pdTopSm">
        <ul class="m-river">
            <?php while ($the_query->have_posts()) {
                $the_query->the_post(  );
                ?>
                    <li class="m-river__item">
                        <article class="m-card m-card__domino">
                            <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="m-card__wrap ">
                                <figure class="m-card__img">
                                    <div class="m-crop m-crop__sizeDomino"><?php the_post_thumbnail( 'medium_large', ['class' => $args['cropImag'] ] ); ?></div><!-- .m-crop -->
                                </figure><!-- .m-card__img -->

                                <header class="m-card__header">

                                    <h3 class="m-card__heading -bold "><?php the_title(  ); ?></h3><!-- .m-card__heading -->

                                    <div class="m-card__tag -bold -uppercase">
                                        <span class="m-card__featuredTag"><?php the_category_child(); ?></span><!-- .m-card__featuredTag -->
                                    </div><!-- .m-card__tag -->

                                    <div class="m-card__byLine -semiBold -uppercase -loose">Por <?php the_author( ); ?></div><!-- .m-card__byLine -->
                                    
                                    <div class="m-card__lead"><?php the_excerpt(  ); ?></div><!-- .m-card__lead -->

                                </header><!-- .m-card__header -->
                            </a><!-- .m-card__wrap -->
                        </article><!-- .m-card -->
                    </li><!-- .m-river__item -->
            <?php } ?>
        </ul><!-- .m-river -->
    </div><!-- .m-category__item -->

    <?php 
    pagination_anterior_siguiente();
} ?>