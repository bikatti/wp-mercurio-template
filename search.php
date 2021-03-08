<?php get_header(  ); ?>

<div class="o-content">
    <div class="m-wrap__main">
        <article class="m-searchResults" role="article">
            <div class="-containerSearch m-blockGroup">
                <div class="m-searchForm -bolck"><?php echo do_shortcode( '[nds-advanced-search]' ); ?></div>
                <div class="m-searchResults__main -block m-blockGruop"><?php require_once "assets/php/search/filter.php"; ?></div>
                <div class="m-footerPage -block"><?php require_once "assets/php/search/results.php"; ?></div>
            </div>
        </article>
    </div>    
</div>

<?php get_footer(  ); ?>