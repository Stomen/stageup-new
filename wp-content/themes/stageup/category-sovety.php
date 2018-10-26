<?php get_header();
$getcat = get_the_category();
$cat = $getcat[0]->cat_ID;
?>
<main>
    <div class="title-block">
        <div class="center">
            <span><?= $getcat[0]->name;?></span>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div>
    <div class="news-block">
        <div class="center">
            <div class="news-items">
                    <?php
                    $query =  array(
                        'cat' => $cat,
                        'showposts' => '2'
                    );
                    if ( have_posts() ) :  query_posts($query);
                        while (have_posts()) : the_post();
                            ?>
                <div class="news-item">
                            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                            <div class="date">
                                <span><?= get_the_date( 'd.m.Y' ); ?> / </span><a href="<?php get_category_link( $cat ); ?>"> <?= $getcat[0]->name;?></a>
                            </div>
                            <div class="content">
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="img-block" style="background-image: url('<?php the_field('min_photo'); ?>')"></div>
                                </a>
                               <?php the_content(); ?>
                                <div class="clear"></div>
                            </div>
                            <a href="<?php echo get_permalink(); ?>">Читать дальше... →</a>
                            <div class="clear"></div>
                </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>