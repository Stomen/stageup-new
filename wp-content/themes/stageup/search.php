<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package stageup
 */

get_header(); ?>
    <main>
        <div class="title-block">
            <div class="center">
                <span><?php printf(esc_html__('Search Results for: %s', 'stageup'), ' ' . get_search_query()); ?></span>
                <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
            </div>
        </div>
        <div class="search-page">
            <div class="center">
                <?php
                if (have_posts()) : ?>
                    <div class="search-items">
                        <?php
                        while (have_posts()) : the_post();
                            $string = rtrim(substr(strip_tags(get_the_content()), 0, 600), "!,.-");
                            $string = substr($string, 0, strrpos($string, ' ')) . '...';
                            ?>
                            <div class="search-item">
                                <a href="<?= get_permalink(); ?>"><?php the_title(); ?></a>
                                <p><?= $string; ?></p>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
                    <?php
                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                the_posts_pagination();?>
            </div>
        </div>
    </main><!-- #main -->
<?php
get_footer();
