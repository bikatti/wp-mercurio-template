<main class="m-category__primary -subcat">
    <div class="m-category__item -pdTopXl">
        <div class="m-section__header"></div>
    </div>
    <!-- .m-category__item -->

    <?php 
        $subcategory = get_queried_object();
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => $contents,
            'cat' => $subcategory->term_id,
            'posts_per_page' => 5,
            'paged' => $paged
        );
        $the_query = new WP_Query($args);


        if ($the_query->have_posts()) {
        ?>
            <div class="m-category__item -pdTopSm">
                <ul class="m-river">
                    <?php while ($the_query->have_posts()) {
                        $the_query->the_post(  );
                        ?>
                            <li class="m-river__item">
                                <article class="m-card m-card__domino">
                                    <a href="<?php the_permalink( ); ?>" class="m-card__wrap ">
                                        <figure class="m-card__img">
                                            <div class="m-crop m-crop__sizeDomino"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?></div>
                                        </figure>
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

            <?php pagination_anterior_siguiente(); ?>
            <!-- .m-category__item -->
    <?php }?>
</main>