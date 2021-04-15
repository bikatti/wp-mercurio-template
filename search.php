<?php 
/**
 * Search view
 *
 * @package Mercurio
 * @subpackage Mercurio
 */


get_header(  );
?>

<div class="o-content">
    <div class="m-wrap__main">
        <article class="m-searchResults" role="article">
            <div class="-containerSearch m-blockGroup">
                <div class="m-searchForm -bolck"><?php echo do_shortcode( '[nds-advanced-search]' ); ?></div><!-- m-searchForm -->
            </div><!-- .m-searchResults -->
        </article><!-- .m-searchResults -->
    </div><!-- .m-wrap__main -->
</div><!-- .o-content -->

<?php
get_footer(  );