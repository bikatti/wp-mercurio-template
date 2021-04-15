<?php 
/**
 * Contact page view
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$args = [
    'contact-short' => '[contact-form-7 id="1281" title="Forma de contacto de revista"]'
];

get_header(  );
?>

<div class="o-content">
    <div class="o-section o-section__page -standard">
        <?php 
        get_template_part( 'template-parts/page/default/content' );

        get_template_part( 'template-parts/page/contact/form', '', $args );         
        ?>
    </div><!-- .o-section -->
</div><!-- .o-content -->

<?php 
get_footer(  );