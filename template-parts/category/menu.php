<?php 
/**
 * Menu of category page
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$categories = get_categories( [
    'child_of'     => $args['taxonomy_id']->term_id,
    'hide_empty'   => true
    ]
);
?>


<div class="o-sectionTop">
    <h1 class="m-sectionTop__heading">
        <span class="-colorLightin -extraBold"><?php _e($args['taxonomy_id']->name); ?></span>
    </h1><!-- .m-sectionTop__heading -->

    <nav class="m-sectionTop__menu">
        <div class="m-pageNav -header">
            <ul class="m-pageNav__list">
                <li class="m-pageNav__item -active" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple>
                    <a class="m-pageNav__link -colorLightin" href="<?php echo esc_url(get_category_link($args['taxonomy_id']->term_id) ); ?>"><?php _e( 'Todos', 'text_domain'); ?></a><!-- .m-pageNav__link  -->
                </li><!-- .m-pageNav__item -->

                <ul class="m-pageNav__group " id="dropSubMenu_one">
                    <?php
                        $close = 1;
                        foreach ($categories as $category) {
                            $catMenu = get_field('submenu_catpage', $category);
                            
                            if($category->parent && $catMenu == 1 && $close <= 4) {
                                $close++;
                                ?>
                                <li class="m-pageNav__item" data-ripple>
                                    <a class="m-pageNav__link -colorLightin" href="<?php echo esc_url(get_category_link($category->term_id) );  ?>"><?php _e( $category->name, 'text_domain' ); ?></a><!-- .m-pageNav__link  -->
                                </li><!-- .m-pageNav__item -->
                        <?php }
                        }
                    ?>
                </ul><!-- .m-pageNav__group -->
            </ul><!-- .m-pageNav__list -->

            <div class="-lineMenuIndicador" style="transform: translateX(25px);"></div><!-- .-lineMenuIndicador -->
        </div><!-- .m-pageNav -->
    </nav><!-- .m-sectionTop__menu -->
</div><!-- .o-sectionTop -->