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
                    <li class="m-pageNav__item -active" data-ripple>
                        <a href="<?php echo "$categoryId->slug"; ?>" class="m-pageNav__link -colorLightin">All</a>
                    </li>
                <?php
                    $close = 1;
                    foreach ($categories as $category) {
                        $catMenu = get_field('submenu_catpage', $category);
                        
                        if($category->parent && $catMenu == 1 && $close <= 4) :
                            $close++;
                    ?>
                            <li class="m-pageNav__item" data-ripple>
                                <a href="<?php echo "$category->slug"; ?>" class="m-pageNav__link -colorLightin"><?php echo "$category->name"; ?></a>
                            </li>
                    <?php
                        endif;
                    }
                ?>
                </ul>
                <div class="-lineMenuIndicador" style="transform: translateX(25px);"></div>
            </div>
        </nav>
</div>
