<?php
/**
 * Muestra buscador en el menu burger
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>

<div class="m-menuOut__search">
    <form role="search" method="GET" action="<?php echo home_url( ); ?>" data-st-search-form="search_form">
        <div class="m-searchInputAuto">
            <div class="m-search__form">
                <input type="text" autocomplete="off" class="m-search__input" name="s" placeholder="Buscar" class="-visible" id="small_search_form"><!-- .m-search__input -->
                <input type="submit" name="searchButton" value="Busqueda">
            </div><!-- .m-search__form -->
        </div><!-- .m-searchInputAuto -->
    </form>
</div><!-- .m-menuOut__search -->