<aside class="m-category__secondary">
    <div class="m-headline__sidebarItem">
        <div class="m-trending m-trending__hero">
            <h4 class="m-trending__heading -bold -loose">Tendencias</h4>
            <ol class="m-trending__list">
                <?php 
                    $args = array(
                        'post_type' => ['post','headliner'],
                        'posts_per_page' => 5,
                        'meta_key' => 'wpb_post_views_count',
                        'orderby'=>'meta_value_num', 
                        'order' => 'DESC',
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
                            <!-- .m-trending__item -->
                        <?php }
                    }
                ?>
            </ol>
        </div>
    </div>
</aside>