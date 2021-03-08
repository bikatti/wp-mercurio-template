<div class="o-archiveTop">
    <?php
        $term = get_queried_object();
        $categoryId = get_category( get_query_var( 'cat' ) );

        if($categoryId->parent) :
            $catId = $categoryId;
            global $catId;
        endif;

    ?>
    <h1 class="m-archiveTop__heading"><span class="-colorLightin -extraBold"><?php echo $catId->name; ?></span></h1>
    <!-- .m-archiveTop__heading -->
</div>