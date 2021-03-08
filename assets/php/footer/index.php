<div class="m-footer__nav">
    <?php
        for ($i=1; $i <= 4 ; $i++) { 
            $numberKey = [
                1 => 'one',
                2 => 'two',
                3 => 'three',
                4 => 'four'
            ];
            $nameSection = [
                1 => 'Categorías',
                2 => 'Editorial',
                3 => 'Síguenos',
                4 => 'Enlace de interés'
            ];

            if ($i === 1) {
            ?>
                <nav class="m-footer__menu -wide">
                    <div class="m-pageNav -footer -twoColumns">
                        <ul class="m-pageNav__list">
                            <li class="m-pageNav__item m-pageNav__heading -activeFo" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple="inverted"><span class="m-pageNav__link -colorLightin -bold"><?php echo $nameSection[$i]; ?></span></li>
                            <ul class="m-pageNav__group -footer" id="<?php echo 'dropdown_' . $numberKey[$i]; ?>">
                                <?php wp_nav_menu(
                                        array(
                                            'theme_location'  => 'footer_' . $numberKey[$i],
                                            'container'       => '',
                                            'items_wrap'      => '%3$s',
                                            'walker'          => new FooterClassLiWalker(),
                                        )
                                ); ?>
                            </ul>
                        </ul>
                    </div>
                </nav>
            <?php } elseif ($i < 4) {
                ?>
                <nav class="m-footer__menu">
                    <div class="m-pageNav -footer -oneColumns">
                        <ul class="m-pageNav__list">
                            <li class="m-pageNav__item m-pageNav__heading -activeFo" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple="inverted"><span class="m-pageNav__link -colorLightin -bold"><?php echo $nameSection[$i]; ?></span></li>
                            <ul class="m-pageNav__group -footer" id="<?php echo 'dropdown_' . $numberKey[$i]; ?>">
                                <?php wp_nav_menu(
                                        array(
                                            'theme_location'  => 'footer_' . $numberKey[$i],
                                            'container'       => '',
                                            'items_wrap'      => '%3$s',
                                            'walker'          => new FooterClassLiWalker(),
                                        )
                                ); ?>
                            </ul>
                        </ul>
                    </div>
                </nav>
            <?php } else {
                ?>
                <nav class="m-footer__menu">
                    <div class="m-pageNav -footer -oneColumns -cta">
                        <ul class="m-pageNav__list">
                            <li class="m-pageNav__item m-pageNav__heading -activeFo" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple="inverted"><span class="m-pageNav__link -colorLightin -bold"><?php echo $nameSection[$i]; ?></span></li>
                            <ul class="m-pageNav__group -footer" id="<?php echo 'dropdown_' . $numberKey[$i]; ?>">
                                <?php wp_nav_menu(
                                        array(
                                            'theme_location'  => 'footer_' . $numberKey[$i],
                                            'container'       => '',
                                            'items_wrap'      => '%3$s',
                                            'walker'          => new FooterClassButtonWalker(),
                                        )
                                ); ?>
                            </ul>
                        </ul>
                    </div>
                </nav>
            <?php
            }
        }
    ?>
</div>

<div class="m-footer__newsletter">
    <p class="m-footerNL__heading -colorLightin -bold">Suscribete al Newsletter</p>
    <div class="m-footerNL__form">
        <form class="m-form -footer" action="" method="post">
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

<div class="m-footer__tip">
    <div class="m-footerTip__heading m-firm__logo">
        <a href="https://monlogo.co" target="_blank">
            <img src="<?php echo get_template_directory_uri( ). '/assets/img/monlogo/imagotipo_white.png' ?>" alt="Logotipo de Monlogo">
        </a>
    </div>
    <!-- <p class="m-footerTip__heading -colorLightin -bold">¿Sugerencías?</p> -->
    <div class="m-footerTip__body">Desarrollado por Monlogo © Todos los derechos reservados por Monlogo</div>
    <!-- <a href="#" class="m-footerTip__link -colorLightin -bold">Enviar</a> -->
    <?php 
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <img src="<?php echo $image[0]; ?>" alt="logotipo de <?php echo esc_attr( get_bloginfo('name') ); ?>" class="m-footer__logo">
</div>

<div class="m-footer__cover">
<?php
    $args = array(
        'post_type' => 'publicidad',
        'posts_per_page' => 1,
        'meta_key'		=> 'posicion_ad',
        'meta_value'	=> 5,
        'order' => 'DESC',
        'orderby' => 'date'
    );
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post(  );

            $url = get_field('url_ad');
            $image = get_field('imagen_ad');

            echo '<a href="' . esc_url($url) . '" class="m-ad__link m-ad__3x2 m-ad__boxed" target="_blank">';
                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="m-footerCover__image">';
            echo '</a>';
        }
    }
?>
</div>