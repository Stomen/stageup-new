<?php
    if(in_category(15)){
        include(get_template_directory().'/single-sovety.php');
    }
    else if(in_category(14 )){
        include(get_template_directory().'/single-news.php');
    }
    else if(in_category(16)){
        include(get_template_directory().'/single-school.php');
    }
    else if(in_category(37)){
        include(get_template_directory().'/single-news.php');
    }
    else{
        ?>
        <?php get_header();
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
                                        if (get_sub_field('button_name_popup') != '') {
                                            ?>
                                            <div class="button form-btn">
                                                <button data-rep-id = "<?php echo get_row_index(); ?>" data-btn-id = "<?php echo get_the_ID(); ?>">
                                                    <?php the_sub_field('button_name_popup'); ?>
                                                </button>

                                            </div>
                                            <?php
                                        }
                                        if (get_sub_field('name_btn_file') != '') {
                                            ?>
                                            <div class="button form-file">
                                                <button data-rep-id = "<?php echo get_row_index(); ?>" data-btn-id = "<?php echo get_the_ID(); ?>">
                                                    <?php the_sub_field('name_btn_file'); ?>
                                                </button>
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

        <?php
    }
?>