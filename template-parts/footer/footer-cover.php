<?php
/**
 * Portada de publicidad 🥰 en el footer
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$args = array(
    'post_type' => 'publicidad',
    'posts_per_page' => 1,
    'meta_key'		=> 'posicion_ad',
    'meta_value'	=> 5,
    'order' => 'DESC',
    'orderby' => 'date'
);

$the_query = new WP_Query($args);
?>


<div class="m-footer__cover">
<?php
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post(  );

            $url = get_field('url_ad');
            $image = get_field('imagen_ad');

            echo '<a href="' . esc_url($url) . '" class="m-ad__link m-ad__3x2 m-ad__boxed" target="_blank">';
                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="m-footerCover__image">';
            echo '</a><!-- .m-ad__link.m-ad__3x2.m-ad__boxed -->';
        }
    }
?>
</div><!-- .m-footer__cover -->