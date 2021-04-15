<?php
/**
 * Header of Single
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<header class="m-article__header">
    <div class="m-article__headerBlock m-article__breadcrumbs -semiBold -uppercase">
        <div class="m-breadcrumbs"><?php the_breadcrumb(); ?></div><!-- .m-breadcrumbs -->
    </div><!-- .m-article__breadcrumbs -->

    <time class="m-article__headerBlock m-article__time -semiBold -uppercase" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"> <?php the_date( 'F d, Y g:iA', '', '' ); ?> </time><!-- .m-article__time -->
    <h1 class="m-article__headerRow m-article__title -bold -condensed"><?php the_title( );?></h1><!-- m-article__title -->
    <h2 class="m-article__headerRow m-article__excerpt -semiBoldCondensed -semiBold"><?php the_excerpt(  ); ?></h2><!-- .m-article__excerpt -->
    
    <div class="m-article__headerBlock m-article__byLine">
        <div class="m-byLine">
            <div class="m-byLine__authors">
                <em class="m-byLine__by">Por</em><!-- .m-byLine__by -->
                <div class="m-byLine__author"><?php the_author_posts_link(); ?></div><!-- .m-byLine__author -->
            </div><!-- .m-byLine__authors -->
        </div><!-- .m-byLine -->
    </div><!-- .m-article__headerBlock -->
</header><!-- .m-article__header -->