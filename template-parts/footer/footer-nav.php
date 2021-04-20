<?php
/**
 * Navegación con links para el footer
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<div class="m-footer__nav">
    <?php
        for ($i=1; $i <= 4 ; $i++) { 
            /* Números de la sección del footer */
            $numberKey = [
                1 => 'one',
                2 => 'two',
                3 => 'three',
                4 => 'four'
            ];
            /* Nombre de las secciones del footer */
            $nameSection = [
                1 => 'footer_first_column_text',
                2 => 'footer_second_column_text',
                3 => 'footer_thirds_column_text',
                4 => 'footer_fourth_column_text'
            ];

            /* Para saber cual ID de la sección de footer */
            $whatDropdown = 'dropdown_' . $numberKey[$i];

            if ($i === 1) {
            ?>
                <nav class="m-footer__menu -wide">
                    <div class="m-pageNav -footer -twoColumns">
                        <ul class="m-pageNav__list">
                            <li class="m-pageNav__item m-pageNav__heading -activeFo" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple="inverted">
                                <span class="m-pageNav__link -colorLightin -bold"><?php printf( get_theme_mod($nameSection[$i] ) ); ?></span>
                            </li>
                            <ul class="m-pageNav__group -footer" id="<?php esc_attr_e( $whatDropdown ); ?>">
                                <?php wp_nav_menu(
                                        array(
                                            'theme_location'  => 'footer_' . $numberKey[$i],
                                            'container'       => '',
                                            'items_wrap'      => '%3$s',
                                            'walker'          => new FooterClassLiWalker(),
                                        )
                                ); ?>
                            </ul><!-- .m-pageNav__group.-footer -->
                        </ul><!-- .m-pageNav__list -->
                    </div><!-- .m-pageNav.-footer.-twoColumns -->
                </nav><!-- .m-footer__menu.-wide -->
            <?php } elseif ($i < 4) {
                ?>
                <nav class="m-footer__menu">
                    <div class="m-pageNav -footer -oneColumns">
                        <ul class="m-pageNav__list">
                            <li class="m-pageNav__item m-pageNav__heading -activeFo" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple="inverted">
                                <span class="m-pageNav__link -colorLightin -bold"><?php printf( get_theme_mod($nameSection[$i] ) ); ?></span>
                            </li>
                            <ul class="m-pageNav__group -footer" id="<?php esc_attr_e( $whatDropdown ); ?>">
                                <?php wp_nav_menu(
                                        array(
                                            'theme_location'  => 'footer_' . $numberKey[$i],
                                            'container'       => '',
                                            'items_wrap'      => '%3$s',
                                            'walker'          => new FooterClassLiWalker(),
                                        )
                                ); ?>
                            </ul><!-- .m-pageNav__group.-footer -->
                        </ul><!-- .m-pageNav__list -->
                    </div><!-- .m-pageNav.-footer.-oneColumns -->
                </nav><!-- .m-footer__menu -->
            <?php } else {
                ?>
                <nav class="m-footer__menu">
                    <div class="m-pageNav -footer -oneColumns -cta">
                        <ul class="m-pageNav__list">
                            <li class="m-pageNav__item m-pageNav__heading -activeFo" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple="inverted">
                                <span class="m-pageNav__link -colorLightin -bold"><?php printf( get_theme_mod($nameSection[$i] ) ); ?></span>
                            </li>
                            <ul class="m-pageNav__group -footer" id="<?php esc_attr_e( $whatDropdown ); ?>">
                                <?php wp_nav_menu(
                                        array(
                                            'theme_location'  => 'footer_' . $numberKey[$i],
                                            'container'       => '',
                                            'items_wrap'      => '%3$s',
                                            'walker'          => new FooterClassButtonWalker(),
                                        )
                                ); ?>
                            </ul><!-- .m-pageNav__group.-footer -->
                        </ul><!-- .m-pageNav__list -->
                    </div><!-- .m-pageNav.-footer.-oneColumns.-cta -->
                </nav><!-- .m-footer__menu -->
            <?php
            }
        }
    ?>
</div><!-- .m-footer__nav -->