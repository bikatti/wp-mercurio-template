<?php 
/**
 * Date view
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

get_header(  );

get_template_part( 'template-parts/taxonomy/header', '', $args );
?>

<div class="o-content">
    <div class="o-category">
        <?php
        get_template_part( 'template-parts/date/content', '', $args );
        
        get_template_part( 'template-parts/aside/aside', '', $args );
        ?>
    </div>
</div>

<?php 
get_footer(  );
