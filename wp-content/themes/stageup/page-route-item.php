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
                   while( have_posts() ) : the_post();
                       the_content();
                   endwhile;
                   ?>
               </div>
               <div class="select-country route-item">
                   <div class="center">
                       <span>выберите страну:</span>
                       <div class="country-items">
                           <?php
                           $route_id = get_field('route', $page_id);
                           $args_route = array(
                               'parent' => 33
                           );
                           $pages_route = get_pages( $args_route );
                           foreach( $pages_route as $post_route ){
                               $args_child = array(
                                   'parent' => $post_route->ID
                               );
                               $pages_child = get_pages( $args_child );
                               foreach( $pages_child as $post_child ){
                                   $route_id_child = get_field('route', $post_child->ID);
                                   if($route_id_child == $route_id){
                                       ?>
                                       <a href="<?php echo get_page_link($post_child->ID); ?>">
                                           <div class="country-item" style="background-image: url('<?php the_field('photo', $post_route->ID);  ?>')">
                                               <span><?= get_the_title($post_route->ID); ?></span>
                                           </div>
                                       </a>
                                       <?php
                                   }
                               }
                           }
                           ?>
                       </div>
                   </div>
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