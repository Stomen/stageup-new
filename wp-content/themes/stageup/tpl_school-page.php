<?php
/*
Template Name: Школы/Университеты
*/
?>
<?php get_header();
$page_id = get_the_ID();
?>
<main>
    <div class="title-block">
        <div class="center">
            <span><?= get_the_title(); ?></span>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div>
    <div class="route-item-block">
        <div class="center">
            <div class="route-left-side">
                <div class="route-left-content">
                    <?php
                    while (have_posts()) : the_post();
                        if (have_rows('info_block')):
                            while (have_rows('info_block')) : the_row();
                                if (get_sub_field('text_up') != '') {
                                    the_sub_field('text_up');
                                }
                                if (have_rows('photo_sl')):
                                    ?>
                                    <div class="photo-gallery-items">
                                        <?php
                                        while (have_rows('photo_sl')) : the_row();
                                            if (get_sub_field('photo') != '') {
                                                ?>
                                                <div class="photo-gallery-item"
                                                     style="background-image: url('<?php the_sub_field('photo'); ?>')"></div>
                                                <?php
                                            }
                                        endwhile;
                                        ?>
                                    </div>
                                    <?php
                                endif;
                                if (get_sub_field('text_down') != '') {
                                    the_sub_field('text_down');
                                }
                                if (have_rows('drop_down_filed')):
                                    while (have_rows('drop_down_filed')) : the_row();
                                        if ((get_sub_field('title_drop_down') != '') && (get_sub_field('description_drop_down') != '')) {
                                            ?>
                                            <div class="drop-down-field">
                                                <span><?php the_sub_field('title_drop_down'); ?></span>
                                                <div class="drop-down-second-text">
                                                    <?php the_sub_field('description_drop_down'); ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    endwhile;

                                endif;
                                if (get_sub_field('button') != '') {
                                    ?>
                                    <div class="button">
                                        <a href="<?php the_sub_field('button_link'); ?>">
                                            <?php the_sub_field('button'); ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                                if (get_sub_field('video') != '') {
                                    ?>
                                    <div class="video-block">
                                        <iframe width="560" height="315" src="<?php the_sub_field('video'); ?>"
                                                frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <?php
                                }
                            endwhile;
                        endif;
                    endwhile;
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
                <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button"
                     data-show-faces="true" data-action="like" data-size="small" data-share="true"></div>
                <div class="clear"></div>
                <div class="fb-block">
                    <div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-numposts="5"></div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>

