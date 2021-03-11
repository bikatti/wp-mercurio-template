<?php
/**
 * Condicional de selección de las reseñas
 * 
 * El value que coloque en los args en el key 'type_reviews'
 * traera el bloque especial de ese tipo de forma
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<div class="m-section__block">
    <div class="o-reviews">
        <?php
        switch ($args['type_reviews']) {
            case 'book':
                get_template_part( 'template-parts/front-page/category/review/book' );
                break;
            
            case 'several':
                get_template_part( 'template-parts/front-page/category/review/several' );
                break;
            
            default:
                # Nada 😆
                break;
        }
        ?>
    </div><!-- .o-reviews -->
</div><!-- .m-section__block -->