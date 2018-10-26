<?php get_header(); ?>
<main>
    <div class="title-block">
        <div class="center">
            <span><?= get_the_title(); ?></span>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div>
     <div class="select-route country">
          <div class="center sidebar-type">
               <div class="l-side">
                   <div class="route-items">
                       <?php
                       $page_id = get_the_ID();
                       $childrens = get_children( array(
                           'post_parent' => $page_id
                       ) );
                       foreach( $childrens as $post ){
                           ?>
                           <a href="<?= get_page_link($post->ID); ?>">
                               <div class="route-item">
                                   <div class="route-item-photo" style="background-image: url('<?php the_field('photo', $post->ID);  ?>')"></div>
                                   <div class="route-item-text">
                                       <span><?= $post->post_title; ?></span>
                                   </div>
                               </div>
                           </a>
                           <?php
                       }
                       wp_reset_postdata();
                       ?>
                   </div>
                   <?php the_content(); ?>
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