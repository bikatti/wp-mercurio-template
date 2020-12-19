<aside class="o-blog__secondary" style="position: relative;">
    <div class="m-blog__item">
        <div class="m-trending m-trending__sidebar">
            <h4 class="m-trending__heading -bold -loose">Tendencia</h4>
            <ol class="m-trending__list">
                <?php 
                    $args = array(
                        'post_type' => $contents,
                        'posts_per_page' => 5,
                        'meta_key' => 'wpb_post_views_count',
                        'orderby'=>'meta_value_num', 
                        'order'=>'DESC', 
                        // 'meta_key'=>'post_views_count'
                    );
                    $headlines = new WP_Query($args);
                    $iter = 0;

                    if ($headlines->have_posts()) {
                        while ($headlines->have_posts()) {
                            $headlines->the_post(  );
                            if($iter === 0) {
                                $iter++;
                            ?>
                                <li class="m-trending__item -featured">
                                    <a href="<?php the_permalink( ); ?>" class="-trendingLink">
                                        <div class="m-trending__img m-crop m-crop__ratio3x2"><?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?></div>
                                        <h5 class="m-trending__title">
                                            <div class="m-trending__number"><span class="m-trending__counter -bold"></span></div>
                                            <span class="m-trending__caption -semiBold"><?php the_title(); ?></span>
                                        </h5>
                                    </a>
                                </li>
                        <?php } else {
                                ?>
                                <li class="m-trending__item">
                                    <a href="<?php the_permalink( ); ?>" class="-trendingLink">
                                        <h5 class="m-trending__title">
                                            <div class="m-trending__number"><span class="m-trending__counter -bold"></span></div>
                                            <span class="m-trending__caption -semiBold"><?php the_title(); ?></span>
                                        </h5>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                    } 
                ?>
            </ol>
        </div>
        <!-- .m-trending -->
    </div>
    <!-- .m-blog__item -->

    <?php the_ads('8'); ?>

    <div class="m-blog__favs">
        <div class="m-blog__item">
            <div class="m-favsEditor">
                <h4 class="m-favsEditor__heading -bold -loose -colorLightin">Favoritos del editor</h4>
                <!-- .m-favsEditor__heading -->
                <ul class="m-favsEditor__list">
                    <?php 
                        $args = array(
                            'post_type' => $contents,
                            'posts_per_page' => 3,
                            'numberposts'	=> 3,
                            'order'=>'DESC',
                            'meta_key'		=> 'favorito_titulares',
                            'meta_value'	=> true
                        );
                        $headlines = new WP_Query($args);
                        $imgClass = 'm-crop__img';
    
                        if ($headlines->have_posts()) {
                            while ($headlines->have_posts()) {
                                $headlines->the_post(  );
                                ?>
                                    <li class="m-favsEditor__item">
                                        <article class="m-card m-card__favs">
                                            <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                                <figure class="m-card__img">
                                                    <div class="m-crop m-crop__ratio1x1"><?php the_post_thumbnail( 'large', ['class' => $imgClass] ); ?></div>
                                                    <!-- .m-crop -->
                                                </figure>
                                                <!-- figure.m-card__img -->
                                                <header class="m-card__header">
                                                    <h3 class="m-card__heading -semiBold"><?php the_title(); ?></h3>
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
                                                </header>
                                                <!-- m-card__header -->
                                            </a>
                                            <!-- .m-card__wrap -->
                                        </article>
                                        <!-- .m-card .-favs -->
                                    </li>
                                    <!-- .m-favsEditor__item -->
                                <?php
                            }
                        }
                    ?>
                </ul>
                <!-- .m-favsEditor__list -->
            </div>
        </div>
    </div>
    <!-- .m-blog__favs -->

    <?php the_ads('9'); ?>
</aside>