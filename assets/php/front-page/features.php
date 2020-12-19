<div class="o-section -noSeparator -withBottomMargin">
    <div class="m-features">
        <?php 
            $args = array(
                'post_type' => $contents,
                'posts_per_page' => 8,
                'meta_key'		=> 'seccion_destacada',
                'meta_value'	=> true,
                'order' => 'DESC',
                'orderby' => 'date'
            );
            $headlines = new WP_Query($args);
            $iter = 0;
            
            if ($headlines->have_posts()) {
                while ($headlines->have_posts()) {
                    $headlines->the_post(  );
                    $sticky = get_field('seccion_destacada', get_the_ID());

                    if($iter == 0) {
                        $iter++;
                    ?>
                        <article class="m-features__main">
                            <a href="<?php the_permalink( ); ?>" class="m-featuresMain__wrap">
                                <figure class="m-featuresMain__img">
                                    <div class="m-crop m-crop__sizeFtMain"><?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?></div>
                                    <!-- .m-crop -->
                                </figure>
                                <span class="m-features__tag -bold -colorLightin">Destacado</span>
                                <!-- figure.m-featuresMain__img -->
                                <header class="m-featuresMain__header">
                                    <h3 class="m-featuresMain__heading -bold -colorLightin"><?php the_title(); ?></h3>
                                    <p class="m-featuresMain__lead -colorLightin"> <?php echo get_the_excerpt(); ?> </p>
                                </header>
                            </a>
                            <!-- a.m-featuresMain__wrap -->
                        </article>
                        <!-- .m-features__main -->
                    
        
        <div class="m-features__slider m-slider">
            <a href="" class="m-slider__nav -navLeft -isHidden" data-slider-nav="prev"></a>
            <a href="" class="m-slider__nav -navRight" data-slider-nav="next"></a>
            <div class="m-slider__track" data-slider-track style="transform: translateX(0px);">
                    <?php } else { ?>
                            <article class="m-features__item m-slider__item"" data-slider-item>
                                <a href="<?php the_permalink( ); ?>" class="m-featuresItem__wrap">
                                    <figure class="m-featuresItem__img">
                                        <div class="m-crop m-crop__ratio11x14"><?php the_post_thumbnail( 'large', ['class' => 'm-crop__img -headline'] ); ?></div>
                                        <!-- .m-crop -->
                                    </figure>
                                    <!-- figure.m-featuresItem__img -->
                                    <header class="m-featuresItem__header">
                                        <h3 class="m-featuresItem__heading -bold -colorLightin"><?php the_title(); ?></h3>
                                    </header>
                                </a>
                                <!-- a.m-featuresItem__wrap -->
                            </article>
                            <!-- .m-features__item -->
                    <?php
                        } 
                    }
                } 
            ?> 
            </div>
        </div>
    </div>
</div>