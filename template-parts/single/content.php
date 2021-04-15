<?php
/**
 * Content of the single
 *
 * @package Mercurio
 * @subpackage Mercurio
 */


if (have_posts()) {
    while (have_posts()) {
        the_post(  );
        wpb_set_post_views(get_the_ID());

        ?> 
        <main class="o-blog__primary">
            <article>
                <?php 
                get_template_part( 'template-parts/single/header');

                get_template_part( 'template-parts/single/featured-img');
                ?>
                 
                <div class="m-article__content">
                    <div class="m-content -copy">
                        <div class="-modifier"><?php the_content( ); ?></div>
                    </div><!-- .m-content -->

                    <footer>
                        <div class="m-tags">
                            <p class="-semiBold"><?php the_tags( 'En este artículo: ', ', ' ); ?></p>
                        </div><!-- .m-tags -->
                    </footer>
                </div><!-- .m-article__content -->
            </article>
        </main><!-- .o-blog__primary -->
    <?php 
    }
}