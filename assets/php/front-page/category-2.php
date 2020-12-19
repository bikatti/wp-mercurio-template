<div class="o-section -sec">
    <div class="o-section__header">
        <div class="m-section__header">
            <?php 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'cat' => 5,
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
                $headlines = new WP_Query($args);

                if ($headlines->have_posts()) {
                    while ($headlines->have_posts()) {
                        $headlines->the_post(  );
                        foreach((get_the_category()) as $category) {
                            if(!$category->parent) { 
                                echo '<h3 class="m-section__heading -bold -condensed">';
                                echo "$category->cat_name";
                                echo '</h3>';
                                echo '<a class="m-section__cta -semiBold -uppercase -loose"  href="'; 
                                echo get_category_link( $category );
                                echo '">Ver todo</a>';
                            }
                        }
                    }
                } 
            ?>
        </div>
    </div>
    <div class="o-section__content">
        <div class="m-section__grid">
            <div class="m-cards__grid">
                <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'cat' => 5,
                        'order' => 'DESC',
                        'orderby' => 'date'
                    );
                    $headlines = new WP_Query($args);

                    if ($headlines->have_posts()) {
                        while ($headlines->have_posts()) {
                            $headlines->the_post(  );
                            ?>
                                <div class="m-cards__gridItem">
                                    <article class="m-card m-card__grid">
                                        <a href="<?php echo esc_url(the_permalink( )); ?>" class="m-card__wrap">
                                            <figure class="m-card__img"><div class="m-crop m-crop__ratio3x2"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?></div></figure>
                                            <!-- figure.m-card__img -->
                                            <header class="m-card__header">
                                                <h3 class="m-card__heading -bold"><?php the_title(); ?></h3>
                                                <div class="m-card__tag -bold -uppercase"><span class="m-card__featuredTag -bold -uppercase"><?php the_category_child(); ?></span></div>
                                                <p class="m-card__byLine -copy">Por <?php echo get_the_author( ); ?> </p>
                                                <p class="m-card__lead -copy"> <?php echo esc_html(get_the_excerpt()); ?> </p>
                                            </header>
                                        </a>
                                    </article>
                                </div>
                                <!-- .m-cards__gridItem -->
                            <?php
                        }
                    } 
                ?> 
            </div>
            <!-- .m-cards__grid -->
        </div>
        <div class="m-section__sidebar">
            <?php the_ads('3'); ?>
            <div class="m-section__sticky -sizeGrow">
                <div class="m-sticky__item -sticky">
                    <a href="#" class="m-theList">
                        <h4 class="m-theList__headline -bold">The 100 Greatest Debut Singles of All Time</h4>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>