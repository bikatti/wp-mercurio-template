<?php
/**
 * Content of date
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

?>


<main class="m-category__primary -subcat">
    <div class="m-category__item -pdTopXl">
        <div class="m-section__header">&nbsp;</div><!-- .m-section__header -->
    </div><!-- .m-category__item -->

    <?php
    if (have_posts()) {
    ?>
        <div class="m-category__item -pdTopSm">
            <ul class="m-river">
                <?php while (have_posts()) {
                    the_post(  );
                    ?>
                        <li class="m-river__item">
                            <article class="m-card m-card__domino">
                                <a href="<?php echo esc_url( the_permalink( ) ); ?>" class="m-card__wrap ">
                                    <figure class="m-card__img">
                                        <div class="m-crop m-crop__sizeDomino"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?></div><!-- .m-crop -->
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

        <div class="m-category__item -pdTopLg">
            <div class="m-pagination">
                <?php posts_nav_link( ' ', 'Anterior', 'Siguiente' ); ?>
            </div><!-- .m-pagination -->
        </div><!-- .m-category__item -->
    <?php } ?>
</main><!-- .m-category__primary -->