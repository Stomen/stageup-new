<?php get_header(); ?>
    <main>
        <div class="title-block">
            <div class="center">
                <span><?php $title = get_the_title();
                    echo $title; ?></span>
                <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
            </div>
        </div>
        <div class="news-block">
            <div class="center">
                <div class="news-items">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $query = array(
                        'category_name' => 'the_otzyvy',
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'showposts' => '10',
                        'paged' => $paged
                    );
                    if (have_posts()) : query_posts($query);
                        while (have_posts()) : the_post();
                            ?>
                            <div class="news-item">
                                <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                <div class="date">
                                    <span><?= get_the_date('d.m.Y'); ?> / </span><a
                                            href="<?php get_category_link($cat); ?>"> <?= $title; ?></a>
                                </div>
                                <div class="content">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <div class="img-block"
                                             style="background-image: url('<?php the_field('min_photo'); ?>')"></div>
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
                    the_posts_pagination();
                    wp_reset_query();
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>