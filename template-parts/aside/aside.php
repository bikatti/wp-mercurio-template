<?php 
/**
 * Aside of the page/post
 *
 * @package Mercurio
 * @subpackage Mercurio
 */


if ($args['trending'] == 'category') {
    ?>
    <aside class="m-category__secondary">
        <?php 
        get_template_part( 'template-parts/aside/trending/trending-default' );

        the_ads($args['ad_1']);

        get_template_part( 'template-parts/aside/fav-of-editor' );

        the_ads($args['ad_2']);
        ?>
    </aside>
    <?php
} else {
    ?>
    <aside class="o-blog__secondary" style="position: relative;">
        <?php 
        get_template_part( 'template-parts/aside/trending/trending-outline' );

        the_ads($args['ad_1']);

        get_template_part( 'template-parts/aside/fav-of-editor' );

        the_ads($args['ad_2']);
        ?>
    </aside>
    <?php
}

?>