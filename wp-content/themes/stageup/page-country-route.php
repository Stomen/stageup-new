<?php get_header();?>
<main>
    <?php
    while( have_posts() ) : the_post();
        ?>
    <div class="title-block">
        <div class="center">
            <span><?= get_the_title(); ?></span>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div>
    <div class="country-route-description">
        <div class="center sidebar-type">
            <div class="l-side">
                <div class="country-education">
                    <span>ВЫБЕРИТЕ КУРС:</span>
                    <div class="kurs-table">
                        <div class="kurs-table-rowqroup">
                            <?php
                            $count = 1;
                            if( have_rows('table_cell') ):
                                while ( have_rows('table_cell') ) : the_row();
                                    if($count == 1){
                                        ?>
                                        <div class="table-row-item">
                                            <div class="table-call"><?php the_sub_field('first_cell'); ?></div>
                                            <div class="table-call"><?php the_sub_field('second_cell'); ?></div>
                                            <div class="table-call"><?php the_sub_field('third_cell'); ?></div>
                                            <?php
                                                if(get_sub_field('fourth_cell') != ''){
                                                    ?>
                                                    <div class="table-call"><?php the_sub_field('fourth_cell'); ?></div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <div class="table-row-item">
                                            <div class="table-call"><a href="<?= get_permalink(get_sub_field('school_univer')); ?>"><?php the_sub_field('first_cell'); ?></a></div>
                                            <div class="table-call"><?php the_sub_field('second_cell'); ?></div>
                                            <div class="table-call"><?php the_sub_field('third_cell'); ?></div>
                                            <?php
                                            if(get_sub_field('fourth_cell') != ''){
                                                ?>
                                                <div class="table-call"><?php the_sub_field('fourth_cell'); ?></div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    $count++;
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="route-description">
                    <?php
                    the_content();
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
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>


<?php get_footer(); ?>