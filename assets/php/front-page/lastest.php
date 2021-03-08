<div class="o-section -noSeparator -withBottomMargin">
    <div class="m-coverage">
        <?php 
            $args = array(
                'post_type' => $contents,
                'tag_id'    => '107',
                'posts_per_page' => 5,
                'order' => 'DESC',
                'orderby' => 'date'
            );
            $term = get_term( '107', 'post_tag' );
            $headlines = new WP_Query($args);
            
            if ($headlines->have_posts()) { ?>
                <h3 class="m-coverage__title"><span class="-bold -colorLightin"><?php echo $term->name; ?></span></h3>
                <ul class="m-newswire -newsDark">
                <?php
                while ($headlines->have_posts()) {
                    $headlines->the_post(  );
                    ?>
                        <li class="m-newswire__item">
                            <article class="m-card m-card__coverage">
                                <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                    <figure class="m-card__img"><div class="m-crop m-crop__ratio3x2"><?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?></div><!-- .m-crop --></figure>
                                    <!-- figure.m-card__img -->
                                    <header class="m-card__header"><h3 class="m-card__heading -bold -colorLightin"><?php the_title(); ?></h3></header>
                                </a>
                                <!-- a.m-card__wrap -->
                            </article>
                            <!-- article.m-card__coverage -->
                        </li>
                        <!-- m-newswire__item" -->
                <?php } ?>
                </ul>
            <?php } ?>
    </div>
</div>