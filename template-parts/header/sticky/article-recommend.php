<?php
/**
 * Muestra el logotipo de la marca del Wordpress
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$args = array(
    'post_type' =>'post',
    'posts_per_page' => 11
);
$recommend = new WP_Query($args);
$iter = 0;
$random = rand(0,10);

if ($recommend->have_posts()) {
    while ($recommend->have_posts()) {
        $recommend->the_post(  );
        if($iter === $random) {
        ?>
            <a href="<?php the_permalink( ); ?>" class="m-header__block m-header__blockReadNext">
                <span class="m-header__readNextLabel -italic">Leer Ahora</span>
                <span class="m-header__readNextTitle -semiBold"><?php the_title(  ); ?></span>
            </a>
            <!-- .m-header__block .m-header__blockReadNext -->
    <?php $random = 100;
        }
        $iter++;
    }
} 
?>