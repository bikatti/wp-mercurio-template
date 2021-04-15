<?php
/**
 * Header of author
 *
 * @package Mercurio
 * @subpackage Mercurio
 */

$image = get_field('imagen_users', 'user_' . $args['taxonomy_id']->ID);

if ( !empty( $image ) ) { 
?>
    <section class="m-authorBio">
        <figure class="m-authorBio__profile">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="m-authorBio__thumb" /><!-- .m-authorBio__thumb -->
        </figure><!-- .m-authorBio__profile -->
        
        <div class="m-authorBio__meta">
            <h1 class="m-authorBio__heading -bold"><?php _e( $args['taxonomy_id']->nickname ); ?></h1><!-- .m-authorBio__heading -->
            <?php if ( $args['taxonomy_id']->user_description ) { ?>
                <div id="m-authorBio__desWrap">
                    <p class="m-authorBio__des"><?php _e( $args['taxonomy_id']->user_description ); ?></p><!-- .m-authorBio__des -->
                </div><!-- .m-authorBio__desWrap -->
            <?php } ?>
        </div><!-- .m-authorBio__meta -->
    </section><!-- .m-authorBio -->
<?php 
} else {
?>
    <div class="m-authorBio__meta">
        <h1 class="m-authorBio__heading -bold"><?php _e( $args['taxonomy_id']->nickname ); ?></h1><!-- .m-authorBio__heading -->
        <?php if ( $args['taxonomy_id']->user_description ) { ?>
            <div id="m-authorBio__desWrap">
                <p class="m-authorBio__des"><?php _e( $args['taxonomy_id']->user_description ); ?></p><!-- .m-authorBio__des -->
            </div><!-- .m-authorBio__desWrap -->
        <?php } ?>
    </div><!-- .m-authorBio__meta -->
<?php 
} 
?>