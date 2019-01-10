<?php
/**
 * stageup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package stageup
 */

if ( ! function_exists( 'stageup_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stageup_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on stageup, use a find and replace
	 * to change 'stageup' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'stageup', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'stageup' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'stageup_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'stageup_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stageup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stageup_content_width', 640 );
}
add_action( 'after_setup_theme', 'stageup_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stageup_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stageup' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'stageup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'stageup_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function subscribe_form_function(){
    $array= $_POST['data'];
    $user = 'anna.m@stageup.com.ua';
    $password = '7eM1rvmxpZ';
    $first_name = rand();
    $email = $array;	// email контакта
    $subscribe_contact_url = 'https://esputnik.com/api/v1/contact/subscribe';

    $json_contact_value = new stdClass();
    $contact = new stdClass();
    $contact->firstName = $first_name;
    $contact->channels = array(
        array('type'=>'email', 'value' => $email)
    );
    $json_contact_value->contact = $contact;
    $json_contact_value->groups = array('Подписка на новости StageUp');
    send_request($subscribe_contact_url, $json_contact_value, $user, $password);

    die();
}

add_action('wp_ajax_subscribe_form_action', 'subscribe_form_function');
add_action('wp_ajax_nopriv_subscribe_form_action', 'subscribe_form_function');



function contact_form_function(){
    $admin_email = get_bloginfo(admin_email);
    //$admin_email = "ivan.krasovskij@gmail.com";
    $headers[] = 'Content-type: text/html; charset=utf-8';
    $array= $_POST['data'];
    $message = '<br> Имя: '.$array['name'].'<br> Email: '.$array['email'].'<br> Телефон: '.$array['phone'].'
    <br> Сообщение: '.$array['message'];
    wp_mail($admin_email, 'StageUp', $message, $headers);
    if(isset($array['name']) && $array['email'] && $array['phone']){

        $user = 'anna.m@stageup.com.ua';
        $password = '7eM1rvmxpZ';
        $first_name = $array['name'];
        $email = $array['email'];	// email контакта
        $sms = $array['phone'];	// номер телефона
        $subscribe_contact_url = 'https://esputnik.com/api/v1/contact/subscribe';

        $json_contact_value = new stdClass();
        $contact = new stdClass();
        $contact->firstName = $first_name;
        $contact->channels = array(
            array('type'=>'email', 'value' => $email),
            array('type'=>'sms', 'value' => $sms)
        );
        $json_contact_value->contact = $contact;
        $json_contact_value->groups = array('Форма StageUp');
        send_request($subscribe_contact_url, $json_contact_value, $user, $password);
    }
    die();
}
function send_request($url, $json_value, $user, $password) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_value));
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERPWD, $user.':'.$password);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    echo($output);
    curl_close($ch);
}
add_action('wp_ajax_contact_form_action', 'contact_form_function');
add_action('wp_ajax_nopriv_contact_form_action', 'contact_form_function');


function jquery() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(),'20151215', true );
	wp_enqueue_script( 'jquery');
}
add_action( 'wp_enqueue_scripts', 'jquery' );

function stageup_scripts() {
	wp_register_style('my-css', get_template_directory_uri() . '/css/style.css#asyncload');
	wp_enqueue_style('my-css');
	/*wp_register_style('my-slick', get_template_directory_uri() . '/slick/slick.css');
	wp_enqueue_style('my-slick');
    wp_register_style('my-slick-theme', get_template_directory_uri() . '/slick/slick-theme.css');
	wp_enqueue_style('my-slick-theme');*/

/*	wp_enqueue_script( 'stageup-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );*/
/*	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/slick/slick.js', array(), '20151215', true );*/
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/mainNoMin.js', array(), '20151215', true );


/*	wp_enqueue_script( 'stageup-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );*/

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stageup_scripts' );


/*function vkApi() {
	if(is_page(29) || is_page(37)){
		wp_deregister_script( 'vkApi' );
		wp_register_script( 'vkApi', '//vk.com/js/api/openapi.js?144');
		wp_enqueue_script( 'vkApi');
	}
}
add_action( 'wp_enqueue_scripts', 'vkApi' );*/

function googleApi() {
	if(is_page(37)){
		wp_deregister_script( 'googleApi' );
		wp_register_script( 'googleApi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAOJgCohmEWCqwrw2pU_mAf8dbgHeP05HE&callback=initMap', array(), '20151215', true );
		wp_enqueue_script( 'googleApi');
	}
}
add_action( 'wp_enqueue_scripts', 'googleApi' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home'] = 'Главная'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author'] = 'Статьи автора %s'; // текст для страницы автора
	$text['404'] = 'Ошибка 404'; // текст для страницы 404
	$text['page'] = 'Страница %s'; // текст 'Страница N'
	$text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

	$wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep = '→'; // разделитель между "крошками"
	$sep_before = '<span class="sep">'; // тег перед разделителем
	$sep_after = '</span>'; // тег после разделителя
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$before = '<span class="current">'; // тег перед текущей "крошкой"
	$after = '</span>'; // тег после текущей "крошки"
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url = home_url('/');
	$link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link_after = '</span>';
	$link_attr = ' itemprop="item"';
	$link_in_before = '<span itemprop="name">';
	$link_in_after = '</span>';
	$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	$parent_id = ($post) ? $post->post_parent : '';
	$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
	$home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

	if (is_home() || is_front_page()) {

		if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

	} else {

		echo $wrap_before;
		if ($show_home_link) echo $home_link;

		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_home_link) echo $sep;
				echo $cats;
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}

		} elseif ( is_search() ) {
			if (have_posts()) {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
			} else {
				if ($show_home_link) echo $sep;
				echo $before . sprintf($text['search'], get_search_query()) . $after;
			}

		} elseif ( is_day() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
			if ($show_current) echo $sep . $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
			if ($show_current) echo $sep . $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ($show_home_link) echo $sep;
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current) echo $sep . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $sep);
				if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
				if ( get_query_var('cpage') ) {
					echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current) echo $before . get_the_title() . $after;
				}
			}

			// custom post type
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if ( get_query_var('paged') ) {
				echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . $post_type->label . $after;
			}

		} elseif ( is_attachment() ) {
			if ($show_home_link) echo $sep;
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $sep);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current) echo $sep . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current) echo $sep . $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($show_home_link) echo $sep;
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $sep;
				}
			}
			if ($show_current) echo $sep . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			if ( get_query_var('paged') ) {
				$tag_id = get_queried_object_id();
				$tag = get_tag($tag_id);
				echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
			}

		} elseif ( is_author() ) {
			global $author;
			$author = get_userdata($author);
			if ( get_query_var('paged') ) {
				if ($show_home_link) echo $sep;
				echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
			}

		} elseif ( is_404() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . $text['404'] . $after;

		} elseif ( has_post_format() && !is_singular() ) {
			if ($show_home_link) echo $sep;
			echo get_post_format_string( get_post_format() );
		}

		echo $wrap_after;

	}
}

add_action( 'template_redirect', function() {
    if ( preg_match( '#^/school/?$#i', $_SERVER['REQUEST_URI'] ) ) {
        wp_redirect( 'https://stageup.com.ua/po-stranam/', 301 );
        exit;
    }
    else if ( preg_match( '#^/the_news/?$#i', $_SERVER['REQUEST_URI'] ) ) {
        wp_redirect( 'https://stageup.com.ua/news/', 301 );
        exit;
    }
    else if ( preg_match( '#^/the_sovety/?$#i', $_SERVER['REQUEST_URI'] ) ) {
        wp_redirect( 'https://stageup.com.ua/sovety/', 301 );
        exit;
    }
    else if ( preg_match( '#^/the_otzyvy/?$#i', $_SERVER['REQUEST_URI'] ) ) {
        wp_redirect( 'https://stageup.com.ua/otzyvy/', 301 );
        exit;
    }
} );
//async css
function add_async_forscript($url)
{
    if (strpos($url, '#asyncload')===false)
        return $url;
    else if (is_admin())
        return str_replace('#asyncload', '', $url);
    else
        return str_replace('#asyncload', '', $url)."' async='async";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);


/*// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Отключаем события REST API
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

remove_action( 'load-update-core.php', 'wp_update_plugins' );*/

//remove header elements meta stuff
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML genera

remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
add_filter('nav_menu_item_id', '__return_false');
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
remove_action('wp_head','feed_links_extra', 3);
remove_action('wp_head','feed_links', 2);
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','wp_generator');


function form_add_function(){
    $form_row_id = $_POST['data_row'];
    $post_id_btn = $_POST['data_id'];
    $short_code = '';

    while (have_rows('info_block', $post_id_btn)) : the_row();
        if(get_row_index() == $form_row_id){
            $short_code.= get_sub_field('enter_short_code');
        }
    endwhile;

    $info = do_shortcode($short_code);
    $info.="<script>
                $('.wpcf7 > form').wpcf7InitForm();
                var urL = $('.wpcf7 > form').attr('action').split('#');
                $('.wpcf7 > form').attr('action', \"#\" + urL[1]);
            </script>";
    echo $info;
    die();
}

add_action('wp_ajax_form_add_action', 'form_add_function');
add_action('wp_ajax_nopriv_form_add_action', 'form_add_function');


function form_file_function(){
    $info = do_shortcode('[contact-form-7 id="5789" title="Контактная форма Данные взамен на файл"]');
    $info.="<script>
                $('.wpcf7 > form').wpcf7InitForm();
                var urL = $('.wpcf7 > form').attr('action').split('#');
                $('.wpcf7 > form').attr('action', \"#\" + urL[1]);
            </script>";
    echo $info;
    die();
}

add_action('wp_ajax_form_file_action', 'form_file_function');
add_action('wp_ajax_nopriv_form_file_action', 'form_file_function');

function send_file_function(){
    $form_row_id = $_POST['data_row'];
    $post_id_btn = $_POST['data_id'];
    $email_send_file = $_POST['data_email'];
    $message = "";
    $attachments = '';
    $headers[] = 'Content-type: text/html; charset=utf-8';

    while (have_rows('info_block', $post_id_btn)) : the_row();
        if(get_row_index() == $form_row_id){
            $message = get_sub_field('some_massege');
            $attachments = get_sub_field('file_upl');
        }
    endwhile;
    $attachments =  $attachments['url'];

    $attachments_str = strpos($attachments, 'uploads');

    $attachments_str = substr($attachments, $attachments_str, strlen($attachments));

    $mail_attachment = array(WP_CONTENT_DIR . '/'.$attachments_str);

    wp_mail($email_send_file, 'StageUp', $message, $headers, $mail_attachment);


    die();
}

add_action('wp_ajax_send_file_action', 'send_file_function');
add_action('wp_ajax_nopriv_send_file_action', 'send_file_function');