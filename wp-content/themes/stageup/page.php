<?php
    $page_id = get_the_ID();
    $parent = get_ancestors($page_id, 'page');
    if($parent[0] == 33){
        include(get_template_directory().'/page-country-item.php');
    }
    else if($parent[0] == 35){
        include(get_template_directory().'/page-route-item.php');
    }
    else if($parent[1] == 33){
        include(get_template_directory().'/page-country-route.php');
    }
?>