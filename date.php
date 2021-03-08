<?php get_header(  ); ?>

<div class="o-archiveTop">
    <h1 class="m-archiveTop__heading"><span class="-colorLightin -extraBold"><?php echo single_month_title(' ', false ); ?></span></h1>
    <!-- .m-archiveTop__heading -->
</div>

<div class="o-content">
    <div class="o-category">
        <main class="m-category__primary">
            <div class="m-category__item -pdTopXl">
                <div class="m-section__header">&nbsp;</div>
            </div>
            <!-- .m-category__item -->

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
                                            <a href="<?php the_permalink( ); ?>" class="m-card__wrap ">
                                                <figure class="m-card__img"><div class="m-crop m-crop__sizeDomino"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?></div></figure>
                                                <header class="m-card__header">
                                                    <h3 class="m-card__heading -bold "><?php the_title(  ); ?></h3>
                                                    <div class="m-card__tag -bold -uppercase"><span class="m-card__featuredTag"><?php the_category_child(); ?></span></div>
                                                    <div class="m-card__byLine -semiBold -uppercase -loose">Por <?php the_author( ); ?></div>
                                                    <div class="m-card__lead"><?php the_excerpt(  ); ?></div>
                                                </header>
                                            </a>
                                        </article>
                                    </li>
                                    <!-- .m-river__item -->
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- .m-category__item -->

                    <!-- .m-category__item -->
                    <div class="m-category__item -pdTopLg">
                        <div class="m-pagination">
                            <?php posts_nav_link( ' ', 'Anterior', 'Siguiente' ); ?>
                        </div>
                    </div>
            <?php } ?>
        </main>
        <!-- .m-category__primary -->
        <?php require_once "assets/php/aside.php"; ?>
        <!-- .m-category__secondary -->
    </div>
</div>

<?php get_footer(  ); ?>