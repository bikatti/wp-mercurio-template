<?php
/**
 * Categoría
 * 
 * Muestra las últimas noticias de esa categoría,
 * una publicidad, a veces un bloque de reseña
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$argumentos = array(
    'post_type' => $contents,
    'posts_per_page' => 1,
    'cat' => $args['category'],
    'order' => 'DESC',
    'orderby' => 'date'
);
$the_query = new WP_Query($argumentos);
?>


<div class="m-section__header">
    <?php 
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post(  );
                foreach((get_the_category()) as $category) {
                    if(!$category->parent) {
                        echo '<h3 class="m-section__heading -bold -condensed">';
                        echo $category->cat_name;
                        echo '</h3><!-- .m-section__heading -->';
                        echo '<a class="m-section__cta -semiBold -uppercase -loose"  href="'; 
                        echo get_category_link( $category );
                        echo '">Ver todo</a><!-- .m-section__cta -->';
                    }
                }
            }
        } 
    ?>
</div><!-- .m-section__header -->