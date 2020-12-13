<div class="o-headlines">
    <div class="m-headline__main">
        <section class="m-mainHeader">
            <?php 
                $args = array(
                    'post_type' => $contents,
                    'posts_per_page' => 10,
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
                $headlines = new WP_Query($args);
                $iter = 0;
                $max = 1;
                
                if ($headlines->have_posts()) {
                    while ($headlines->have_posts()) {
                        $headlines->the_post(  );
                        $sticky = get_field('titulares', get_the_ID(  ));

                        if($iter == 0 && $sticky == 1 && $max++ <= 3) {
                            $iter++;
                        ?>
                            <div class="m-mainHeader__item">
                                <article class="m-card m-card__overlay -home">
                                    <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                        <figure class="m-card__img">
                                            <div class="m-crop m-crop__ratio5x6"><?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?></div>
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
                            <!-- m-mainHeader__item -->
                    <?php } elseif (!$iter == 0 && $sticky == 1 && $max++ <= 3) {
                            ?>
                            <div class="m-mainHeader__item">
                                <article class="m-card -ftHome">
                                    <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                        <figure class="m-card__img">
                                            <div class="m-crop m-crop__sizeFtHome"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?></div>
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
                            <!-- m-mainHeader__item [secondary|tertiary] -->
                    <?php
                        } else {
                            #tranqui
                        }
                    }
                } 
            ?> 
        </section>
    </div>
    <!-- .m-headline__mainHeader -->
    <div class="m-headline__list">
        <div class="m-lastestList">
            <div class="m-lastestList__header">
                <h4 class="m-lastestList__heading -bold">Últimas Noticias</h4>
            </div>

            <?php 
                $args = array(
                    'post_type' => $contents,
                    'posts_per_page' => 4,
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
                $headlines = new WP_Query($args);

                if ($headlines->have_posts()) {
                    while ($headlines->have_posts()) {
                        $headlines->the_post(  );
                        ?>

                        <div class="m-lastestList__item">
                            <article class="m-card -excerpt">
                                <a href="<?php the_permalink( ); ?>" class="m-card__wrap ">
                                    <header class="m-card__header">
                                        <h3 class="m-card__heading -copy"><?php the_title(); ?></h3>
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
                        <hr class="m-lastestList__line">
                        <!-- m-mainHeader__item -->
                    <?php }
                }
            ?>
            <a href="#" class="m-lastestList__cta"><span class="-semiBold">Más noticias</span></a>
        </div>
    </div>
    <!-- .m-headline__list -->
    <aside class="m-headline__sidebar">
        <div class="m-headline__sidebarItem">
            <div class="m-trending m-trending__hero">
                <h4 class="m-trending__heading -bold -loose">Tendencias</h4>
                <ol class="m-trending__list">
                    <?php 
                        $args = array(
                            'post_type' => $contents,
                            'posts_per_page' => 5,
                            'meta_key' => 'wpb_post_views_count',
                            'orderby'=>'meta_value_num', 
                            'order' => 'DESC'
                        );
                        $headlines = new WP_Query($args);

                        if ($headlines->have_posts()) {
                            while ($headlines->have_posts()) {
                                $headlines->the_post(  );
                                ?>

                                <li class="m-trending__item">
                                    <a href="<?php the_permalink( ); ?>" class="-trendingLink">
                                        <h5 class="m-trending__title">
                                            <div class="m-trending__number"><span class="m-trending__counter -bold"></span></div>
                                            <span class="m-trending__caption -semiBold"><?php the_title(); ?></span>
                                        </h5>
                                    </a>
                                </li>
                                <!-- m-mainHeader__item -->
                            <?php }
                        }
                    ?>
                </ol>
            </div>
        </div>
    </aside>
    <!-- .m-headline__sidebar -->
</div>