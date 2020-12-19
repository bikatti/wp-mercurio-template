<div class="o-sectionTop">
    <?php
        $categoryId = get_category( get_query_var( 'cat' ) );

        $categories = get_categories( array(
            'child_of'     => $categoryId->term_id,
            'hide_empty'   => true
        ) );
        ?>
        <h1 class="m-sectionTop__heading"><span class="-colorLightin -extraBold"><?php echo $categoryId->name; ?></span></h1>
        <!-- .m-sectionTop__heading -->
        <nav class="m-sectionTop__menu">
            <div class="m-pageNav -header">
                <ul class="m-pageNav__list">
                    <li class="m-pageNav__item -active" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple>
                        <a class="m-pageNav__link -colorLightin" href="<?php echo esc_url(get_category_link($categoryId->term_id) ); ?>">All</a>
                    </li>
                    <ul class="m-pageNav__group " id="dropSubMenu_one">
                        <?php
                            $close = 1;
                            foreach ($categories as $category) {
                                $catMenu = get_field('submenu_catpage', $category);
                                
                                if($category->parent && $catMenu == 1 && $close <= 4) {
                                    $close++;
                                    ?>
                                    <li class="m-pageNav__item" data-ripple>
                                        <a class="m-pageNav__link -colorLightin" href="<?php echo esc_url(get_category_link($category->term_id) );  ?>"> <?php echo esc_html("$category->name"); ?></a>
                                    </li>
                            <?php }
                                str_replace('Deporte ','Deporte', '');
                            }
                        ?>
                    </ul>
                </ul>
                <div class="-lineMenuIndicador" style="transform: translateX(25px);"></div>
            </div>
        </nav>
</div>