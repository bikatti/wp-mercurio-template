<!DOCTYPE html>
<html lang="es" id="headerSticky">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php 
        if ( is_front_page() ) {
            echo esc_attr( get_bloginfo('name') );
        } else {
            wp_title('');
            echo ' - ';
            echo esc_attr( get_bloginfo('name') );
        }
    ?></title>
    <?php wp_head(  ); ?>
</head>
<body id="theBody">
    <header class="o-header">
        <div class="m-header__wrap">
            <div class="m-header__content">
                <div class="m-header__brand">
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    ?>
                    <a href="<?php echo home_url( ); ?>">
                        <img src="<?php echo $image[0]; ?>" alt="logotipo de <?php echo esc_attr( get_bloginfo('name') ); ?>">
                    </a>
                </div>
                <div class="m-header__block -left -semiBold">
                    <a href="#" class="-linkHeader -onTop">Enviar un Tip</a>
                </div>
                <div class="m-header__block -right">
                    <div class="m-subscription__section -semiBold">
                        <div class="m-logInOrPay">
                            <div class="m-subscription__section">
                                <a href="<?php echo admin_url(); ?>" class="-logInLink -cover">Ingresar</a>
                                <a href="#" class="-btnSubs m-subs__cta">Subscribirse</a>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="m-header__nav">
                    <div class="m-header__toggle">
                        <button class="m-menuBurguer" id="burgerOpen">
                            <?php require "assets/img/icons/icon-burguer.svg"; ?>
                            <span class="a-burguer__lable -semiBold">
                                Menu
                            </span>
                        </button>
                    </div>
                    <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'top_menu',
                                'menu_class'      => 'm-header__menu -semiBold',
                                'container' => 'ul',
                                'walker' => new ClassLiWalker(),
                            )
                    ); ?>
                </nav>
            </div>
            <div class="m-header__content m-header__sticky ">
                <a href="<?php echo home_url( ); ?>" class="m-header__brand m-header__brandFixed">
                    <img src="<?php echo $image[0]; ?>" alt="logotipo de <?php echo esc_attr( get_bloginfo('name') ); ?>">
                </a>
                <!-- .m-header__brandFixed -->
                <div class="m-header__toggle m-header__toggleSticky">
                    <button class="m-menuBurguer" id="burgerOpenTwo">
                        <?php require "assets/img/icons/icon-burguer.svg"; ?>
                        <span class="a-burguer__lable -semiBold">Menu</span>
                    </button>
                </div>
                <!-- .m-header__toggleSticky -->
                <?php 
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
                        <?php $random = 100;
                            }
                            $iter++;
                        }
                    } 
                ?>
                <!-- .m-header__searchSpacer -->
            </div>
        </div>

        <div class="m-header__wrap -search -layer">
            <div class="m-header__search -semibold -expandable">
                <form role="search" method="GET" action="<?php echo home_url( ); ?>" data-st-search-form="small_search_form">
                    <div class="m-searchInputAuto">
                        <div class="m-search__form">
                            <input type="text" autocomplete="off" class="m-search__input" name="s" placeholder="Buscar" class="-visible" id="small_search_form">
                            <input type="submit" name="searchButton" value="Busqueda">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>