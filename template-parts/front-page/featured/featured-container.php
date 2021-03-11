<?php
/**
 * Artículos destacados
 * 
 * Aquí van las noticias más importantes del momento. Se eligen por medio de unos booleans en
 * el panel de gutenberg. Vienen en orden de entrega
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

/**
 * Query de artículos destacados
 */
$args = array(
    'post_type' => $contents,
    'posts_per_page' => 8,
    'meta_key'		=> 'seccion_destacada',
    'meta_value'	=> true,
    'order' => 'DESC',
    'orderby' => 'date'
);
$the_query = new WP_Query($args);
$iter = 0;
?>


<div class="o-section -noSeparator -withBottomMargin">
    <div class="m-features">
        <?php 
            
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post(  );
                    $sticky = get_field('seccion_destacada', get_the_ID());

                    if($iter == 0) {
                        $iter++;
                    ?>
                        
                        <?php get_template_part( 'template-parts/front-page/featured/main-featured' ); ?>
        
        <div class="m-features__slider m-slider">
            <div class="m-slider__track" data-slider-track style="transform: translateX(0px);">
                    <?php } else { ?>
                        <?php get_template_part( 'template-parts/front-page/featured/scrolling-featured' ); ?>
                    <?php
                        } 
                    }
                } 
            ?> 
            </div><!-- .m-slider__track -->
        </div><!-- .m-features__slider -->
    </div><!-- .m-features -->
</div><!-- .o-section -->