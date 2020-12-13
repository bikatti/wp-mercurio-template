<?php
    if (have_posts()) {
        while(have_posts()) {
            the_post(  );
            ?>
            <div class="m-content m-content__withoutSidebar -copy ">
                <h1><?php the_title( ); ?></h1>
                <?php the_content( ); ?>
            </div>
        <?php }
    } else {
        echo "<p>Esta página no tiene contenido</p>";
    }
?>