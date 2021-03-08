<main class="m-category__primary">
    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
    
    <?php 
        $image = get_field('imagen_users', 'user_' . $curauth->ID);
        if( !empty( $image ) ) { ?>
            <section class="m-authorBio">
                <figure class="m-authorBio__profile"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="m-authorBio__thumb" /></figure>
                
                <div class="m-authorBio__meta">
                    <h1 class="m-authorBio__heading -bold"><?php echo $curauth->nickname; ?></h1>
                    <!-- .m-authorBio__heading -->
                    <?php if ( $curauth->user_description ) { ?>
                        <div id="m-authorBio__desWrap">
                            <p class="m-authorBio__des"><?php echo $curauth->user_description; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </section>
        <?php } else {
            ?>
                <div class="m-authorBio__meta">
                    <h1 class="m-authorBio__heading -bold"><?php echo $curauth->nickname; ?></h1>
                    <!-- .m-authorBio__heading -->
                    <?php if ( $curauth->user_description ) { ?>
                        <div id="m-authorBio__desWrap">
                            <p class="m-authorBio__des"><?php echo $curauth->user_description; ?></p>
                        </div>
                    <?php } ?>
                </div>
        <?php } ?>

    <div class="m-category__item -pdTopXl">
        <div class="m-section__header">&nbsp;</div>
    </div>
    <!-- .m-category__item -->

    <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => $contents,
            'author' => $curauth->ID,
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

            <?php pagination_anterior_siguiente(); ?>
            <!-- .m-category__item -->
    <?php } else {?>
            <h1>No hay contenido</h1>
    <?php }?>
</main>