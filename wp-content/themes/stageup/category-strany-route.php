
<main>
     <?php
     $this_cat = get_query_var('cat');
     $main_cat = get_categories( array(
         'term_taxonomy_id' => $this_cat,
         'hide_empty' => 0
     ) );
     ?>
    <div class="title-block">
        <div class="center">
            <span><?= $main_cat[0]->name; ?></span>
        </div>
    </div>
</main>

<?php get_footer(); ?>