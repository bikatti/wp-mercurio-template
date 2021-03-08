<?php
/**
 * Contenido para navegar en categoría/subcategoría en el menu burger
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$categories = get_categories( array(
    "hide_empty" => true,  
    "orderby"   => "name",
    "order"     => "ASC" 
) );

$numberKey = [
1 => 'one',
2 => 'two',
3 => 'three',
4 => 'four',
5 => 'five',
6 => 'six',
7 => 'seven',
8 => 'eight'
];

$close = 1;

?>


<div class="m-menuOut__nav">
    <ul class="m-menuOutNav">
        <?php 
            foreach($categories as $category) {
                $catMenu = get_field('category_menu', $category);
                
                if(!$category->parent && $catMenu == 1 && $close <= 8) {
                    
                    echo '<li class="m-menuOutNav__item" data-collapsible="collapsed">';
                    echo '<a class="m-menuOutNav__link -bold -colorLightin" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a><!-- .m-menuOutNav__link.-bold.-colorLightin -->';
                    echo '<a class="m-menuOutNav__expander" href="#" data-bs-toggle data-bs-target aria-expanded="false" aria-controls data-ripple data-ripple><span class="a-icon a-icon__expander"></span><!-- .a-icon.a-icon__expander --></a><!-- .m-menuOutNav__expander -->';
                        echo '<ul class="m-menuOutNav__submenu" id="menuDrop_'. $numberKey[$close] . '" data-collapsible-panel data-collapsible-breakpoint="mobile-only">';

                        $close++;
                        $taxonomy_name = 'category';
                        $termChildren = get_term_children( $category->term_id, $taxonomy_name );
                            foreach($termChildren as $child) {
                                $catChild = get_term_by( 'id', $child, $taxonomy_name );
                                echo '<li class="m-menuOutNav__item m-menuOutNav__itemSub"><a class="m-menuOutNav__link m-menuOutNav__linkSub -semiBold" href="' . get_term_link( $child, $taxonomy_name ) . '"><p>' . $catChild->name . '</p></a><!-- .m-menuOutNav__link.m-menuOutNav__linkSub.-semiBold --></li><!-- .m-menuOutNav__item.m-menuOutNav__itemSub -->';
                            }
                        echo '</ul><!-- .m-menuOutNav__link.-bold.-colorLightin -->';
                    echo '</li><!-- .m-menuOutNav__item -->';
                }
            }
        ?>
    </ul><!-- .m-menuOutNav -->
</div><!-- .m-menuOut__nav -->