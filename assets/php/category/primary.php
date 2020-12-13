<main class="m-category__primary">
    <div class="m-category__item">
        <section class="m-3Pack">
            <?php
                $imgClass = 'm-crop__img -headline';
                $category = get_category( get_query_var( 'cat' ) );
                $args = array(
                    'cat' => $category->term_id,
                    'posts_per_page' => 3,
                );
                $the_query = new WP_Query($args);
                $iter = 0;
                $max = 1;

                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post(  );
                        $sticky = get_field('titulares', get_the_ID(  ));
                        
                        if($iter == 0 && $sticky == 1 && $max++ <= 3) {
                            $iter++;
                        ?>
                            <div class="m-3Pack__item">
                                <article class="m-card m-card__overlay -home">
                                    <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                        <figure class="m-card__img">
                                            <div class="m-crop m-crop__ratio1x1"><?php the_post_thumbnail( 'large', ['class' => $imgClass] ); ?></div>
                                            <!-- .m-crop -->
                                        </figure>
                                        <!-- figure.m-card__img -->
                                        <header class="m-card__header">
                                            <h3 class="m-card__heading -bold -colorLightin"><?php the_title(); ?></h3>
                                            <div class="m-card__tag -bold -uppercase">
                                                <span class="m-card__featuredTag"><?php 
                                                        foreach((get_the_category()) as $category) {
                                                            if($category->parent) { 
                                                            // check if this category has a parent
                                                            echo $category->cat_name; 
                                                            }
                                                        }
                                                ?></span>
                                            </div>
                                            <p class="m-card__lead -colorLightin"> <?php echo get_the_excerpt(); ?> </p>
                                        </header>
                                    </a>
                                    <!-- a.m-card__wrap -->
                                </article>
                                <!-- article.m-card__overlay -->
                            </div>
                            <!-- m-3Pack__item -->
                    <?php } elseif (!$iter == 0 && $sticky == 1 && $max++ <= 3) { ?>
                            <div class="m-3Pack__item">
                                <article class="m-card -ftHome">
                                    <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                        <figure class="m-card__img">
                                            <div class="m-crop m-crop__sizeFt"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?></div>
                                        </figure>
                                        <!-- figure.m-card__img -->
                                        <header class="m-card__header">
                                            <h3 class="m-card__heading -bold"><?php the_title(); ?></h3>
                                            <div class="m-card__tag -bold -uppercase">
                                                <span class="m-card__featuredTag">
                                                    <?php 
                                                        foreach((get_the_category()) as $category) {
                                                            if($category->parent) { 
                                                                // check if this category has a parent
                                                                echo $category->cat_name; 
                                                            }
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                        </header>
                                    </a>
                                </article>
                            </div>
                            <!-- m-3Pack__item [secondary|tertiary] -->
                    <?php } else {
                            # code...
                        }
                    }
                } 
            ?> 
        </section>
    </div>
    <!-- .m-category__item -->

    <div class="m-category__item -pdTopXl">
        <div class="m-section__header">
            <h3 class="m-section__heading -bold -condensed">Últimas Noticias</h3>
        </div>
    </div>
    <!-- .m-category__item -->

    <?php $category = get_category( get_query_var( 'cat' ) );
        // $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'cat' => $category->term_id,
            'posts_per_page' => 6,
            // 'paged' => $paged
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
                                            <div class="m-crop m-crop__sizeDomino"><?php the_post_thumbnail( 'medium_large', ['class' => $imgClass] ); ?></div>
                                        </figure>
                                        <header class="m-card__header">
                                            <h3 class="m-card__heading -bold "><?php the_title(  ); ?></h3>
                                            <div class="m-card__tag -bold -uppercase">
                                                <span class="m-card__featuredTag">
                                                    <?php 
                                                        foreach((get_the_category()) as $category) {
                                                            if($category->parent) { 
                                                                // check if this category has a parent
                                                                echo $category->cat_name; 
                                                            }
                                                        }
                                                    ?>
                                                </span>
                                            </div>
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

            <div class="m-category__item -pdTopLg">
                <div class="m-pagination">
                    <?php echo 'Aquí el next' ?>
                </div>
            </div>
            <!-- .m-category__item -->
    <?php } else {?>
            <h1>No hay contenido</h1>
    <?php }?>
</main>