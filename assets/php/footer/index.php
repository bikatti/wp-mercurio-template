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
                1 => 'Magazine',
                2 => 'Legal',
                3 => 'Connect With us',
                4 => 'subscriptions'
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
    <p class="m-footerNL__heading -colorLightin -bold">Únete al Newsletter</p>
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
    <p class="m-footerTip__heading -colorLightin -bold">Algún Tip?</p>
    <div class="m-footerTip__body">Queremos oir lo que quieres dicer! Envianoslo a traves de nuestra forma anonima.</div>
    <a href="#" class="m-footerTip__link -colorLightin -bold">Enviar Tip</a>
    <?php 
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <img src="<?php echo $image[0]; ?>" alt="logotipo de <?php echo esc_attr( get_bloginfo('name') ); ?>" class="m-footer__logo">
</div>

<div class="m-footer__cover">
    <img src="<?php esc_url(header_image(  )); ?>" alt="Imagen del footer" class="m-footerCover__image">
</div>