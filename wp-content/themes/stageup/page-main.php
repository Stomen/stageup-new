<?php get_header(); ?>
<main>
    <?php
    while( have_posts() ) : the_post();
    ?>
    <div class="main-slider">
        <?php
        if (have_rows('main_slider')):
            while (have_rows('main_slider')) : the_row();
                {
                    ?>
                    <div class="slider-item" style="background-image: url('<?php the_sub_field('main_photo'); ?>')">
                        <div class="opacity-block"></div>
                        <div class="center">
                            <span><?php the_sub_field('slider_title'); ?></span>
                            <span><?php the_sub_field('slider_content'); ?></span>
                            <a href="<?php the_sub_field('button_link'); ?>">
                                <button><?php the_sub_field('button_name'); ?></button>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            endwhile;
        endif;
        ?>
    </div>
    <div class="info-about-proj">
        <div class="center">
            <?php the_content(); ?>
             <div class="cube-arrow-f">
                <span>↓</span>
            </div>
            <div class="info-about-proj-items">
                <div class="info-about-proj-item">
                    <?php the_field('hide_field');?>
                </div>
            </div>
            <div class="cube-arrow-s">
                <span>↑</span>
            </div>
        </div>
    </div>
    <?php
    endwhile;
    ?>
    <div class="select-route main-page">
        <div class="center">
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
        </div>
    </div>
    <div class="select-country main-page">
       <div class="center">
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
       </div>
    </div>
    <div class="news-items">
       <div class="center">
           <span>новости</span>
           <?php
           $query =  array(
               'cat' => 14,
               'showposts' => '3'
           );
           if ( have_posts() ) :  query_posts($query);
               while (have_posts()) : the_post();
                   $string = rtrim(substr(strip_tags(get_the_content()), 0, 600), "!,.-");
                   $string = substr($string, 0, strrpos($string, ' ')).'...';
                   ?>
                   <div class="news-item">
                       <span><a href="<?= get_post_permalink(); ?>"><?php the_title(); ?></a></span>
                       <p><?= $string; ?></p>
                       <a href="<?= get_post_permalink(); ?>">Читать далее... →</a>
                   </div>
                   <?php
               endwhile;
           endif;
           wp_reset_query();
           ?>
       </div>
    </div>
    <div class="social-network-block">
        <div class="center">
            <span>МЫ В СОЦСЕТЯХ:</span>
            <div class="social-block">
                <!--<div class="vk-block">
                    <div id="vk_groups"></div>
                </div>-->
                <div class="facebook-block">
                    <div class="fb-page" data-href="https://www.facebook.com/StageupUA/" data-tabs="timeline" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/StageupUA/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/StageupUA/">Stage Up</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
