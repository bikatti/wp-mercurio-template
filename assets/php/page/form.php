<div class="m-content m-content__withoutSidebar -copy -up">
<?php
    if ( isset($_GET['sent']) ){
        if ($_GET['sent'] == '1') {
            ?>
                <div class="m-alert m-alert__success" role="alert"> Mensaje fue enviado correctamente</div>
            <?php
        }
        else {
            ?>
                <div class="m-alert m-alert__warning" role="alert"> Mensaje no se pudo enviar correctamente </div>
            <?php
        }
    }
?>
</div>

<div class="m-content m-content__withoutSidebar -copy ">
    <form class="m-form__contact" method="post" action="<?php echo admin_url( 'admin-post.php' ) ?>" >
        <div class="m-form__row -twoCol">
            <div class="m-form__col">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Tu nombre" required>
            </div>

            <div class="m-form__col">
                <label for="name">Apellido:</label>
                <input type="text" name="lastname" id="lastname" placeholder="Introduce tu apellido" required>
            </div>
        </div>

        <div class="m-form__row">
            <label for="email">Correo Electronico:</label>
            <input type="email" name="email" id="email"  placeholder="Dejanos tu email" required>
        </div>

        <div class="m-form__row">
            <label for="message">Mensaje:</label>
            <textarea name="message" id="message" cols="30" rows="10"  placeholder="Dejanos tu mensaje aquí" required></textarea>
        </div>

        <div class="m-form__row">
            <input type="hidden" name="action" value="process_form">
            <input type="submit" name="submit" class="a-btn a-btn__block a-btn__bg -btnRed -bold" value="Enviar">
        </div>
    </form>
</div>