<?php
/**
 * Muestra el buscador en el Header
 *
 * @package Mercurio
 * @subpackage Mercurio
 */
?>


<div class="m-header__wrap -search -layer">
    <div class="m-header__search -semibold -expandable">
        <form role="search" method="GET" action="<?php echo home_url( ); ?>" data-st-search-form="small_search_form">
            <div class="m-searchInputAuto">
                <div class="m-search__form">
                    <input type="text" autocomplete="off" class="m-search__input" name="s" placeholder="Buscar" class="-visible" id="small_search_form">
                    <input type="submit" name="searchButton" value="Busqueda">
                </div>
            </div>
        </form>
    </div>
</div>