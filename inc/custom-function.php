<?php
/**
 * Costum function with html, conditional, etc
 *
 * @param      mercurio
 * @package    mercurio
 */


// breadcrumbs function
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


// the ads function
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