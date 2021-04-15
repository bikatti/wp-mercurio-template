<?php
/**
 * Featured Image or Video of the single
 *
 * @package Mercurio
 * @subpackage Mercurio
 */


if ( is_singular( 'video' )) {
    $iframe = get_field('video_url');

    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];

    $params = array(
        'controls'  => 0,
        'hd'        => 1,
        'autohide'  => 1
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);

    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

    ?>
        <figure class="m-picture m-picture__video m-picture__noCaption">
            <div class="m-picture__frame">
                <div class="m-crop m-crop__video m-crop__ratioVideo">
                    <div><?php echo esc_html__( $iframe ); ?></div>
                </div><!-- .m-crop -->
            </div><!-- .m-picture__frame -->
        </figure><!-- .m-picture -->
<?php 
} else { 
?>
    <figure class="m-picture">
        <div class="m-picture__frame">
            <div class="m-crop m-crop__ratio3x2"><?php the_post_thumbnail('large', ['class' => 'm-crop__img']); ?></div><!-- .m-crop -->
        </div><!-- .m-picture__frame -->
        
        <div class="m-picture__caption">
            <p class="m-picture__source -semiBold"><?php the_post_thumbnail_caption( ); ?></p><!-- .m-picture__source -->
        </div><!-- .m-picture__caption -->
    </figure><!-- .m-picture -->
<?php 
}