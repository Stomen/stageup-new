<div class="sidebar-block">
    <?php
        $args = array(
            'parent' => 35
        );
        $pages = get_pages( $args );
    ?>
    <span>Выбрать направление</span>
    <ul>
        <?php
        foreach( $pages as $post ){
            ?>
            <li><a href="<?= get_page_link($post->ID) ?>"><?= get_the_title($post->ID); ?></a></li>
            <?php
        }
        wp_reset_postdata();
        ?>
    </ul>

    <?php
    $args = array(
        'parent' => 33
    );
    $pages = get_pages( $args );
    ?>
    <span>Выбрать страну</span>
    <ul>
        <?php
        foreach( $pages as $post ){
            ?>
            <li><a href="<?= get_page_link($post->ID) ?>"><?= get_the_title($post->ID); ?></a></li>
            <?php
        }
        wp_reset_postdata();
        ?>
    </ul>
</div>
