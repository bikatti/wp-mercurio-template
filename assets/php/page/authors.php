<ul>
    <?php wp_list_authors( array(
    'show_fullname' => 1,

    'orderby'       => 'post_count',
    'order'         => 'DESC',
    'number'        => 3
    ) ); ?>
</ul>