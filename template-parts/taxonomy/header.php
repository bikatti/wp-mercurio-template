<?php
/**
 * Header of the taxonomy
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>

<div class="o-archiveTop">
    <h1 class="m-archiveTop__heading">
        <span class="-colorLightin -extraBold">
        <?php
        if (is_date( )) {
            _e( single_month_title(' ', false ) );
        } else {
            _e( $args['name_taxonomy']->name );
        }        
        ?>
        </span>
    </h1><!-- .m-archiveTop__heading -->
</div><!-- .o-archiveTop -->