<?php
/**
 * Forma de newsletter en el footer
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<div class="m-footer__newsletter">
    <p class="m-footerNL__heading -colorLightin -bold">Suscribete al Newsletter</p><!-- .m-footerNL__heading.-colorLightin.-bold -->
    <div class="m-footerNL__form">
        <form class="m-form -footer" action="" method="post">
            <div class="m-form__group">

                <div class="m-form__field -semiBold">
                    <input type="email" name="EmailAddress" class="m-form__input" placeholder="Tu email" required><!-- .m-form__input -->
                </div><!-- .m-form__field -->

                <button class="m-form__button -blackBg"><span class="-colorLightin -bold -uppercase">Enviar</span></button><!-- .m-form__button -->

            </div><!-- .m-form__group -->
        </form><!-- .m-form.-footer -->
    </div><!-- .m-footerNL__form -->
</div><!-- .m-footer__newsletter -->