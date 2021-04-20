<?php
/**
 * Walker Nav Menu custom structured html 
 *
 * @param      mercurio
 * @package    mercurio
 */


class ClassLiWalker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
         global $wp_query;
         $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
  
         $class_names = $value = '';
  
         $classes = empty( $item->classes ) ? array() : (array) $item->classes;
  
         $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
         $class_names = ' class="' . esc_attr( $class_names ) . '"';
  
         $output .= $indent . '<li class="a-menuItem" id="menu-item-'. $item->ID . '" >';
  
         $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
         $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
         $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
         $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
  
         $prepend = '';
         $append = '';
         $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
  
         if($depth != 0) {
                   $description = $append = $prepend = "";
         }
  
        $item_output = $args->before;
        $item_output .= '<a'. $attributes . 'class="-menuLink"' .'>';
        $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
        $item_output .= $description.$args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        if ($item->menu_order == 1) {
            $classes[] = 'first';
        }
    }
}

class FooterClassLiWalker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= $indent . '<li class="m-pageNav__item" data-ripple="inverted" >';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $prepend = '';
        $append = '';
        $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

        if($depth != 0) {
            $description = $append = $prepend = "";
        }

        $item_output = $args->before;
        $item_output .= '<a '. $attributes . 'class="m-pageNav__link -semiBold -colorLightin"' .'>';
        $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
        $item_output .= $description.$args->link_after;
        $item_output .= $args->after;
        $item_output .= '</a>';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        if ($item->menu_order == 1) {
            $classes[] = 'first';
        }
    }
}

class FooterClassButtonWalker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= $indent . '<li class="m-pageNav__item" data-ripple="inverted" >';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $prepend = '';
        $append = '';
        $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

        if($depth != 0) {
            $description = $append = $prepend = "";
        }

        $item_output = $args->before;
        $item_output .= '<a '. $attributes . 'class="m-pageNav__link m-pageNav__cta -uppercase -bold -colorLightin">';
        $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
        $item_output .= $description.$args->link_after;
        $item_output .= $args->after;
        $item_output .= '</a>';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        if ($item->menu_order == 1) {
            $classes[] = 'first';
        }
    }
}

class upperWalker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= $indent . '<li class="m-menuOut__menuItem" data-ripple="inverted" >';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $prepend = '';
        $append = '';
        $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

        if($depth != 0) {
            $description = $append = $prepend = "";
        }

        $item_output = $args->before;
        $item_output .= '<a '. $attributes . 'class="-menuOut -colorLightin -uppercase"' .'>';
        $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
        $item_output .= $description.$args->link_after;
        $item_output .= $args->after;
        $item_output .= '</a>';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        if ($item->menu_order == 1) {
            $classes[] = 'first';
        }
    }
}