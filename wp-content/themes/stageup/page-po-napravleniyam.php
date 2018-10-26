<?php get_header(); ?>
<main>
    <div class="title-block">
        <div class="center">
            <span>По направлениям</span>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div>
    <div class="select-route po-napravleniyam">
        <div class="center">
            <div class="l-side">
                <span>Выберите направление:</span>
                <div class="route-items">
                    <?php
                    $args = array(
                        'parent' => 35
                    );
                    $pages = get_pages( $args );
                    foreach( $pages as $post ){
                        ?>
                        <a href="<?php echo get_page_link($post->ID); ?>">
                            <div class="route-item">
                                <div class="route-item-photo" style="background-image: url('<?php the_field('photo', $post->ID);  ?>')"></div>
                                <div class="route-item-text">
                                    <span> <?= get_the_title($post->ID); ?></span>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <?php
                if(get_field('seo_text') != ""){
                    ?>
                    <div class="seo-text">
                        <p><?php
                            the_field('seo_text');
                            ?></p>
                        <span class="seo-text-click">Читатать далее...</span>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
