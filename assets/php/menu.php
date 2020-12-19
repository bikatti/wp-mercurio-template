<div class="o-menuOut">
    <div class="m-menuOut__close">
        <button class="m-closeMenu" id="burgerOutMenu"></button>
    </div>
    <!-- .m-menuOut__close -->
    <div class="m-menuOut__wrap">
        <div class="m-menuOut__row">
            <a href="<?php echo home_url( ); ?>" class="m-menuOut__branding">
                <img class="m-menuOut__logo" src="<?php echo get_template_directory_uri(  ); ?>/assets/img/brand/logotipo.png" alt="logo de The Rolling Stone">
            </a>
            
            <div class="m-menuOut__search">
                <form role="search" method="GET" action="<?php echo home_url( ); ?>" data-st-search-form="search_form">
                    <div class="m-searchInputAuto">
                        <div class="m-search__form">
                            <input type="text" autocomplete="off" class="m-search__input" name="s" placeholder="Buscar" class="-visible" id="small_search_form">
                            <input type="submit" name="searchButton" value="Busqueda">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- .m-menuOut__row -->
        <div class="m-menuOut__nav">
            <ul class="m-menuOutNav">
                <?php 
                    $categories = get_categories( array(
                            "hide_empty" => true,
                            // "type"      => "post",      
                            "orderby"   => "name",
                            "order"     => "ASC" 
                        ) );
                    $numberKey = [
                        1 => 'one',
                        2 => 'two',
                        3 => 'three',
                        4 => 'four',
                        5 => 'five',
                        6 => 'six',
                        7 => 'seven',
                        8 => 'eight'
                    ];
                    $close = 1;

                    foreach($categories as $category) {
                        $catMenu = get_field('category_menu', $category);
                        
                        if(!$category->parent && $catMenu == 1 && $close <= 8) :
                            
                            echo '<li class="m-menuOutNav__item" data-collapsible="collapsed">';
                            echo '<a class="m-menuOutNav__link -bold -colorLightin" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                            echo '<a class="m-menuOutNav__expander" href="#" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple data-ripple><span class="a-icon a-icon__expander"></span></a>';
                                echo '<ul class="m-menuOutNav__submenu" id="menuDrop_'. $numberKey[$close] . '" data-collapsible-panel data-collapsible-breakpoint="mobile-only">';

                                $close++;
                                $taxonomy_name = 'category';
                                $termChildren = get_term_children( $category->term_id, $taxonomy_name );
                                    foreach($termChildren as $child) {
                                        $catChild = get_term_by( 'id', $child, $taxonomy_name );
                                        echo '<li class="m-menuOutNav__item m-menuOutNav__itemSub"><a class="m-menuOutNav__link m-menuOutNav__linkSub -semiBold" href="' . get_term_link( $child, $taxonomy_name ) . '"><p>' . $catChild->name . '</p></a></li>';
                                    }
                                echo '</ul>';
                            echo '</li>';
                        endif;
                    }
                ?>
            </ul>
        </div>
        <!-- .m-menuOut__nav -->
        <div class="m-menuOut__row">
            <div class="m-menuOut__block m-menuOut__socialMedia">
                <?php dynamic_sidebar( 'social-media' );?>
            </div>
            <div class="m-menuOut__block m-menuOut__blockNewsletter">
                <div class="m-menuOut__heading -bold">Newsletters</div>
                <form class="m-form -faded" action="" method="post">
                    <div class="m-form__group">
                        <div class="m-form__field -semiBold">
                            <input type="email" name="EmailAddress" class="m-form__input" placeholder="Tu email" required>
                        </div>
                        <!-- .m-form__field -->
                        <button class="m-form__button -blackBg"><span class="-colorLightin -bold -uppercase">Enviar</span></button>
                        <!-- .m-form__button -->
                    </div>
                </form>
            </div>
        </div>
        <!-- .m-menuOut__row -->
        <div class="m-menuOut__row">
            <div class="m-menuOut__block m-menuOut__blockLink">
                <?php wp_nav_menu(
                        array(
                            'theme_location'  => 'imp_stuff',
                            'menu_class'      => 'm-menuOut__menu',
                            'container' => 'ul',
                            'walker' => new upperWalker(),
                        )
                ); ?>
            </div>
            <div class="m-menuOut__block m-menuOut__blockLegal">
                <span class="a-legalCompany -colorLightin">Nación Zeta</span>
                <?php dynamic_sidebar( 'cprt' );?>
            </div>
        </div>
        <!-- .m-menuOut__row -->
    </div>
    <!-- .m-menuOut__wrap -->
</div>