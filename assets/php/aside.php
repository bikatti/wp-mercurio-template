<aside class="o-blog__secondary" style="position: relative;">
    <div class="m-blog__item">
        <div class="m-trending m-trending__sidebar">
            <h4 class="m-trending__heading -bold -loose">Tendencia</h4>
            <ol class="m-trending__list">
                <?php 
                    $args = array(
                        'post_type' => ['post','headliner'],
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
                            $iter++;
                        }
                    } 
                ?>
            </ol>
        </div>
    </div>
</aside>