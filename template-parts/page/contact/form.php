<?php 
/**
 * Form of a Contact page
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

?>


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
    <?php echo do_shortcode($args['contact-short']) ?>
</div>