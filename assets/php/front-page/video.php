<div class="o-section -sec -dark">
    <div class="o-section__header">
        <div class="m-section__header"><h3 class="m-section__heading -bold -condensed -colorLightin">Videos</h3></div>
    </div>
    <div class="o-section__content">
        <div class="m-videoCarousel">
            <?php 
                $args = array(
                    'post_type' => 'video',
                    'posts_per_page' => 1,
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post(  );

                        $iframe = get_field('video_url');

                        preg_match('/src="(.+?)"/', $iframe, $matches);
                        $src = $matches[1];

                        $params = array(
                            'controls'  => 0,
                            'hd'        => 1,
                            'autohide'  => 1
                        );
                        $new_src = add_query_arg($params, $src);
                        $iframe = str_replace($src, $new_src, $iframe);

                        $attributes = 'frameborder="0"';
                        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                            ?>
                                <div class="m-videoCarousel__main">
                                    <article class="m-card m-card__video">
                                        <div class="m-card__wrap">
                                            <figure class="m-card__img">
                                                <div class="m-crop m-crop__video m-crop__ratioVideo"><div><?php echo $iframe; ?></div></div>
                                                <!-- .m-crop -->
                                            </figure>
                                            <header class="m-card__header">
                                                <h3 class="m-card__heading -bold -colorLightin"><a href="<?php the_permalink( ); ?>" class="-colorLightin"><?php the_title(); ?></a></h3>
                                                <div class="m-card__tag -bold -uppercase"><span class="m-card__featuredTag -bold -uppercase -loose -colorLightin"><?php the_category_child(); ?></span></div>
                                                <p class="m-card__lead -copy -colorLightin"> <?php echo get_the_excerpt(); ?> </p>
                                            </header>
                                        </div>
                                        <!-- .m-videoCarousel__wrap -->
                                    </article>
                                </div>
                                <!-- .m-m-videoCarousel__main -->
                            
                            <?php 
                    }
                }
            ?>
                </div>
            </div>
        </div>
    </div>
</div>