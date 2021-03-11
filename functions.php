<?php

function init_template() {
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );

    register_nav_menus( 
        array(
            'top_menu' => 'Menú Principal'
        )
    );
}

add_action('after_setup_theme', 'init_template');

add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo' );
add_theme_support('editor-styles');
// add_editor_style( 'editor-style.css' );

function noSticky( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        $query->set( 'ignore_sticky_posts', 1 );
    }
}

add_filter( 'pre_get_posts', 'noSticky' );

function assets() {
    $ver = '1.3.23';
    wp_register_style( 'rubik', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', '', $ver , 'all' );
    wp_register_style( 'Frank Ruhl Libre', 'https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&display=swap', '', $ver, 'all' );

    wp_register_style( 'front-page', get_template_directory_uri( ).'/assets/css/front-page.css', '', $ver, 'all' );
    wp_register_style( 'category', get_template_directory_uri( ).'/assets/css/categories.css', '', $ver, 'all' );
    wp_register_style( 'single', get_template_directory_uri( ).'/assets/css/single.css', '', $ver, 'all' );
    wp_register_style( 'search', get_template_directory_uri( ).'/assets/css/search.css', '', $ver, 'all' );
    wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css','','5.0.0', 'all');
    if ( is_front_page() || is_home() || is_404()) {
        wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array(  'bootstrap', 'rubik', 'Frank Ruhl Libre', 'front-page'), $ver, 'all' );
    }
    if ( is_archive() ) {
        wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array(  'bootstrap', 'rubik', 'Frank Ruhl Libre', 'category' ), $ver, 'all' );
    }
    if ( is_singular() ) {
        wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array(  'bootstrap', 'rubik', 'Frank Ruhl Libre', 'single'), $ver, 'all' );
    }
    if ( is_search() ) {
        wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array(  'bootstrap', 'rubik', 'Frank Ruhl Libre', 'search' ), $ver, 'all' );
    }

    wp_enqueue_script( 'jscustom', get_template_directory_uri( ).'/assets/js/custom.js', '', $ver, true );
    wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js', '', '5.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'assets' );

function site_block_editor_js() {
    $ver = '1.3.23';
    wp_register_style( 'rubik', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', '', $ver , 'all' );
    wp_register_style( 'Frank Ruhl Libre', 'https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&display=swap', '', $ver, 'all' );
    
    wp_enqueue_style( 'style', get_stylesheet_uri(  ) , array( 'rubik', 'Frank Ruhl Libre'), $ver, 'all' );
    wp_enqueue_script( 'header', get_template_directory_uri( ).'/assets/js/addHeader.js', '', $ver, true );
}
add_action( 'enqueue_block_editor_assets', 'site_block_editor_js' );

// Logo de Login
function login_logo() { 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo $image[0]; ?>);
            height: 60px;
            width: 100%;
            background-size: 100%;
            background-repeat: no-repeat;
            /* padding-bottom: 10px; */
        }

        #login form, .login form {
            background: none;
            padding: 0;
            border: none;
            box-shadow: none;
        }

        #login {
            margin: 50px auto !important;
            border-radius: 4px;
            box-shadow: 0 3px 9px rgb(0 0 0 / 14%);
            padding: 20px !important;
            background: #fff;
        }

        .login #backtoblog, .login #nav {
            text-align: center;
        }

        .login {
            display: flex;
            justify-content: center;
            height: auto;
        }

        @media screen and (max-width: 550px) {
            #login {
                margin: 25px 20px !important;
            }
        }
    </style>
<?php }


add_action( 'login_enqueue_scripts', 'login_logo' );

function login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );
 
function login_logo_url_title() {
    return 'Mercurio Revista Digital';
}
add_filter( 'login_headertitle', 'login_logo_url_title' );

// Para que se cargue cuando al inicio de la página
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

// Sección
function publicidad_init() {
    $name = 'Publicidad';

    $labels = array(
        'name'              => _x( $name, 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'     => _x( $name, 'post type general name', 'your-plugin-textdomain' ),
        'menu_name'         => _x( $name, 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'    => _x( $name, 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'           => _x( 'Añadir nuevo', $name, 'your-plugin-textdomain' ),
        'add_new_item'      => __( 'Añadir nueva ' . $name, 'your-plugin-textdomain' ),
        'new_item'          => __( 'Nueva ' . $name, 'your-plugin-textdomain' ),
        'edit_item'         => __( 'Editar ' . $name, 'your-plugin-textdomain' ),
        'view_item'         => __( 'Ver ' . $name, 'your-plugin-textdomain' ),
        'all_items'         => __( 'Todos las ' . $name, 'your-plugin-textdomain' ),
        'search_items'      => __( 'Buscar ' . $name, 'your-plugin-textdomain' ),
        'parent_item_colon' => __( $name . ' padre', 'your-plugin-textdomain' ),
        'not_found'         => __( 'No hemos encontrado ninguna ' . $name, 'your-plugin-textdomain' ),
        'not_found_in_trash'=> __( 'No hemos encontrado ninguna ' . $name . ' en la papelera', 'your-plugin-textdomain' ),
    );

    $args = array(
        'label'            => 'publicidad',
        'description'       => __('Description', 'Aquí podrás postear las entradas que sea más importantes para que salgan en la cabecera principal.'),
        'labels'            => $labels,
        'public'            => true,
        // Significa que lo pude llamar un Loop
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'publicidad' ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-format-image',
        'can_export'        => true,
        'show_in_rest'      => true,
        'supports'          => array( 'title', 'editor', 'author', 'revisions' )
    );

    register_post_type( 'publicidad', $args );
}
add_action( 'init', 'publicidad_init' );

function video_init() {
    $name = 'Video';

    $labels = array(
        'name'              => _x( $name, 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'     => _x( $name, 'post type general name', 'your-plugin-textdomain' ),
        'menu_name'         => _x( $name, 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'    => _x( $name, 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'           => _x( 'Añadir nuevo', $name, 'your-plugin-textdomain' ),
        'add_new_item'      => __( 'Añadir nueva ' . $name, 'your-plugin-textdomain' ),
        'new_item'          => __( 'Nueva ' . $name, 'your-plugin-textdomain' ),
        'edit_item'         => __( 'Editar ' . $name, 'your-plugin-textdomain' ),
        'view_item'         => __( 'Ver ' . $name, 'your-plugin-textdomain' ),
        'all_items'         => __( 'Todos las ' . $name, 'your-plugin-textdomain' ),
        'search_items'      => __( 'Buscar ' . $name, 'your-plugin-textdomain' ),
        'parent_item_colon' => __( $name . ' padre', 'your-plugin-textdomain' ),
        'not_found'         => __( 'No hemos encontrado ninguna ' . $name, 'your-plugin-textdomain' ),
        'not_found_in_trash'=> __( 'No hemos encontrado ninguna ' . $name . ' en la papelera', 'your-plugin-textdomain' ),
    );

    $args = array(
        'label'            => 'video',
        'description'       => __('Description', 'Aquí podrás postear las entradas que sea más importantes para que salgan en la cabecera principal.'),
        'labels'            => $labels,
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        // 'rewrite'           => array( 'slug' => 'video'),
        'capability_type'   => 'post',
        'has_archive'       => 'category',
        'hierarchical'      => false,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-video-alt3',
        'can_export'        => true,
        'show_in_rest'      => true,
        'taxonomies'        => array('post_tag','category'),
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail','revisions','excerpt', 'custom-fields', 'revisions')
    );

    register_post_type( 'video', $args );
}
add_action( 'init', 'video_init' );

// Change dashboard Posts to News
function change_post_type() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $name = 'Artículo';

    $labels->name               = _x( $name, 'post type general name', 'your-plugin-textdomain' );
    $labels->singular_name      = _x( $name, 'post type general name', 'your-plugin-textdomain' );
    $labels->menu_name          = _x( $name, 'admin menu', 'your-plugin-textdomain' );
    $labels->name_admin_bar     = _x( $name, 'add new on admin bar', 'your-plugin-textdomain' );
    $labels->add_new            = _x( 'Añadir nuevo', $name, 'your-plugin-textdomain' );
    $labels->add_new_item       = __( 'Añadir Nuev0 ' . $name, 'your-plugin-textdomain' );
    $labels->new_item           = __( 'Nuevo ' . $name, 'your-plugin-textdomain' );
    $labels->edit_item          = __( 'Editar ' . $name, 'your-plugin-textdomain' );
    $labels->view_item          = __( 'Ver ' . $name, 'your-plugin-textdomain' );
    $labels->all_items          = __( 'Todos los ' . $name, 'your-plugin-textdomain' );
    $labels->search_items       = __( 'Buscar ' . $name, 'your-plugin-textdomain' );
    $labels->not_found          = _n( 'No se encontro el ' . $name, 'No hemos encontrado ningún ' . $name, 'numero-objeto', 'texto-dominio' );
    $labels->not_found_in_trash = _n( 'No se encontro el ' . $name . ' en Papelera', 'No hemos encontrado ningún ' . $name . ' en Papelera', 'numero-objeto', 'texto-dominio' );
}
add_action( 'init', 'change_post_type' );

function comments_remove_post_type_support() {
    remove_post_type_support( 'post', 'comments' );
}
add_action( 'init', 'comments_remove_post_type_support' );

// Añadiendo clases personalizadas
function add_class_the_tags($html) {
    $html = str_replace('<a','<a class="-tagLink"', $html);
    return $html;
}
add_filter('the_tags','add_class_the_tags');

function add_class_the_category($html) {
    $html = str_replace('<a','<a class="-categoryLink"', $html);
    return $html;
}
add_filter('the_category','add_class_the_category');

function add_class_the_author_link($html) {
    $html = str_replace('<a','<a class="-byLink -uppercase -bold"', $html);
    return $html;
}
add_filter('the_author_posts_link','add_class_the_author_link');

// function replace_category_name($html) {
//     $html = str_replace('<a m-pageNav__link','<a class="-byLink -uppercase -bold"', $html);
//     return $html;
// }

// Function del breadcrumbs
function the_breadcrumb() {
	if (!is_home()) {
        $closeCat = 0;
        $close = 0;
		echo '<a class="-categoryLink" href="';
		echo get_option('home');
		echo '"> Inicio </a> ';
		if (is_category() || is_single()) {
			foreach((get_the_category()) as $category) {
                if(!$category->parent && $closeCat == 0) { 
                    echo '<a class="-categoryLink"  href="' . get_category_link( $category ) . '"> ' . $category->cat_name . '</a>';
                    $closeCat++;
                }
            }
            foreach((get_the_category()) as $category) {
                if($category->parent && $close == 0) { 
                    echo '<a class="-categoryLink"  href="'; 
                    echo get_category_link( $category );
                    echo '"> ';
                    echo $category->cat_name;
                    echo '</a>';
                    $close++;
                }
            }
		} elseif (is_page()) {
			echo the_title();
        }
	}
}

// Custom menu
function wpb_custom_new_menu() {
    register_nav_menus(
      array(
            'sub_menu' => __( 'Segundo menú (menu burguer)' ),
            'footer_one' => __( '1er parte del Footer' ),
            'footer_two' => __( '2da parte del Footer' ),
            'footer_three' => __( '3era parte del Footer' ),
            'footer_four' => __( '4ta parte del Footer' ),
            'editor_picks' => __( 'Favs del editor' ),
            'imp_stuff' => __( 'Páginas estaticas' )
      )
    );
}
add_action( 'init', 'wpb_custom_new_menu' );

function wpd_subcategory_template( $template ) {
    $cat = get_queried_object();
    if( 0 < $cat->category_parent ) {
        $template = locate_template( 'subcategory.php' );
    }
    return $template;
}
add_filter( 'category_template', 'wpd_subcategory_template' );

// Popular Posts by Views
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// Search AJAX JS
add_action('wp_enqueue_scripts', function() {
	wp_enqueue_script('autocomplete-search', get_stylesheet_directory_uri() . '/assets/js/autocomplete.js', 
		['jquery', 'jquery-ui-autocomplete'], null, true);
	wp_localize_script('autocomplete-search', 'AutocompleteSearch', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'ajax_nonce' => wp_create_nonce('autocompleteSearchNonce')
	]);
 
	$wp_scripts = wp_scripts();
	wp_enqueue_style('jquery-ui-css',
        '//ajax.googleapis.com/ajax/libs/jqueryui/' . $wp_scripts->registered['jquery-ui-autocomplete']->ver . '/themes/smoothness/jquery-ui.css',
        false, null, false
   	);
});
 
add_action('wp_ajax_nopriv_autocompleteSearch', 'awp_autocomplete_search');
add_action('wp_ajax_autocompleteSearch', 'awp_autocomplete_search');
function awp_autocomplete_search() {
	check_ajax_referer('autocompleteSearchNonce', 'security');
 
	$search_term = $_REQUEST['term'];
	if (!isset($_REQUEST['term'])) {
		echo json_encode([]);
	}
 
	$suggestions = [];
	$query = new WP_Query([
		's' => $search_term,
		'posts_per_page' => -1,
	]);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$suggestions[] = [
				'id' => get_the_ID(),
				'label' => get_the_title(),
				'link' => get_the_permalink()
			];
		}
		wp_reset_postdata();
	}
	echo json_encode($suggestions);
	wp_die();
}

// Hooks admin-post
add_action( 'admin_post_nopriv_process_form', 'send_mail_data' );

// Funcion callback
function send_mail_data() {
    $name = sanitize_text_field($_POST['name']);
    $lastname = sanitize_text_field($_POST['lastname']);
	$email = sanitize_email($_POST['email']);
	$message = sanitize_textarea_field($_POST['message']);
    
	$adminmail = "ibikatti@gmail.com"; //email destino
	$subject = 'Formulario de contacto'; //asunto
	$headers = "Reply-to: " . $name . " <" . $email . ">";
    
	//Cuerpo del mensaje
	$msg = "Nombre: " . $name . "\n";
	$msg .= "E-mail: " . $email . "\n\n";
	$msg .= "Mensaje: \n\n" . $message . "\n";
    
    $sendmail = wp_mail( $adminmail, $subject, $msg, $headers);
    
    wp_redirect( home_url('/contactar') . "?sent=". $sendmail ); //asumiendo que existe esta url
}
add_action( 'admin_post_process_form', 'send_mail_data' );


function sidebar() {
    register_sidebar(
        array(
            'name' => 'Social Media',
            'id' => 'social-media',
            'description' => 'Zona de Social Media',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget'  => '',
        )
    );
}
add_action('widgets_init', 'sidebar');

function copyright() {
    register_sidebar(
        array(
            'name' => 'Copyrigth',
            'id' => 'cprt',
            'description' => 'Copyright del contenido de la página web',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget'  => '',
        )
    );
}
add_action('widgets_init', 'copyright');

function the_ads($position) {
    $args = array(
        'post_type' => 'publicidad',
        'posts_per_page' => 1,
        'meta_key'		=> 'posicion_ad',
        'meta_value'	=> $position,
        'order' => 'DESC',
        'orderby' => 'date'
    );
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post(  );

            $url = get_field('url_ad');
            $image = get_field('imagen_ad');

            echo '<div class="m-section__ad">';
            echo '<div class="m-ad">';
                echo '<a href="' . esc_url($url) . '" class="m-ad__link m-ad__3x2 m-ad__boxed" target="_blank">';
                    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="m-crop__img m-ad__img">';
                echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '<!-- .m-section__ad -->';
        }
    } 
}
function the_category_child() {
    foreach((get_the_category()) as $category) {
        if($category->parent) { 
            echo $category->cat_name; 
        }
    }
}

function pagination_anterior_siguiente() {
    global $the_query;
 
    if ( $the_query->max_num_pages > 1 ) { ?>
        <div class="m-category__item -pdTopLg">
            <div class="m-pagination">
                <?php posts_nav_link( ' ', 'Anterior', 'Siguiente' ); ?>
            </div>
        </div>
<?php }
 wp_reset_postdata();
}

function n_posts_link_attributes() {
    return 'class="a-btn a-pagination__btn -semiBold -uppercase -right"';
}
function p_posts_link_attributes() {
    return 'class="a-btn a-pagination__btn -semiBold -uppercase"';
}

add_filter('next_posts_link_attributes', 'n_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'p_posts_link_attributes');
