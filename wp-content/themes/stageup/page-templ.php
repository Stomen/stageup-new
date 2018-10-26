<?php
/*
Template Name: Dynamic page
*/
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
                <div class="route-left-content dynamic-page">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
                <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button"
                     data-show-faces="true" data-action="like" data-size="small" data-share="true"></div>
                <div class="clear"></div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>



