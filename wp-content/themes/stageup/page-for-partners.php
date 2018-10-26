<?php get_header(); ?>
<main>
    
    <div class="title-block">
        <div class="center">
            <span>For partners</span>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div>
    <div class="partners-block">
        <div class="center">
                <div class="partners-items">
                    <div class="partner-text-item">
                        <?php
                        while( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                        ?>
                    </div>
                    <div class="partners-photo-item">
                        <div class="partners-photo-top"></div>
                        <div class="partners-photo-bottom"></div>
                    </div>
                </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
