<?php get_header();?>
<main>
    <div class="title-block">
        <div class="center">
            <span>По странам</span>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div>
    <div class="select-country po-stranam">
        <div class="center sidebar-type">
            <div class="l-side">
                <span>выберите страну:</span>
                <div class="country-items">
                    <?php
                    $args = array(
                        'parent' => 33
                    );
                    $pages = get_pages( $args );
                    foreach( $pages as $post ){
                        ?>
                        <a href="<?php echo get_page_link($post->ID); ?>">
                            <div class="country-item" style="background-image: url('<?php the_field('photo', $post->ID);  ?>')">
                                <span><?= get_the_title($post->ID); ?></span>
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
