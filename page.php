<?php 
/**
 * Page view
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

get_header(  );
?>

<div class="o-content">
    <div class="o-section o-section__page -standard">
        <?php get_template_part( 'template-parts/page/default/content', '', $args ); ?>
    </div><!-- .o-section -->
</div><!-- .o-content -->

<?php 
get_footer(  );