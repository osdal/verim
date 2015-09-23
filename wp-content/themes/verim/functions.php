<?php
/**
 * Чистый Шаблон для разработки
 * Функции шаблона
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */
register_nav_menus( array( // Регистрируем 2 меню
	'top' => 'Главное меню',
	'bottom' => 'Нижнее'
) );
//Подключаем превьюхи
add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
set_post_thumbnail_size(255, 255); // Задаем размеры миниатюре
add_image_size('loopThumb', 255, 255, true);

//Подключаем сайдбар
if ( function_exists('register_sidebar') )
register_sidebar();

//Подключение стилей и js
function my_scripts_method() {
	wp_enqueue_script(
		'main',
		get_template_directory_uri() . '/js/main.js',
		array('jquery')
	);
  wp_enqueue_script(
    'google',
    'https://maps.googleapis.com/maps/api/js?v=3.exp',
    array('jquery')
  );
  wp_enqueue_script(
    'bootstrap.min',
    get_template_directory_uri() . '/js/bootstrap.min.js',
    array('jquery')
  );
	wp_enqueue_style(
		'reset',
		get_template_directory_uri() . '/reset.css'
	);
  wp_enqueue_style(
    'bootstrap.min',
    get_template_directory_uri() . '/css/bootstrap.min.css'
  );
  wp_enqueue_style(
    'bootstrap-theme.min',
    get_template_directory_uri() . '/css/bootstrap-theme.min.css'
  );
	wp_enqueue_style(
		'style',
		get_template_directory_uri() . '/style.css'
	);
  wp_enqueue_style(
    'fonts',
    'http://fonts.googleapis.com/css?family=Roboto&subset=latin,cyrillic'
  );
  wp_enqueue_style(
    'fonts',
    'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic'
  );
  wp_enqueue_style(
    'fonts',
    'http://fonts.googleapis.com/css?family=Jura:400,600&subset=latin,cyrillic'
  );
    wp_enqueue_style(
    'fonts',
    'http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic'
  );
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

//Кастомный тип записей НОВОСТИ
add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'news',
    array(
      'labels' => array(
        'name' => __( 'Новости' ),
        'singular_name' => __( 'Новости' )
      ),
      'taxonomies' => array('category'),      
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'news_s'),
      'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' , 'taxonomies'),
    )
  );
}
//Кастомный тип записей АКТЕРЫ
add_action( 'init', 'create_posttype_actor' );
function create_posttype_actor() {
  register_post_type( 'actor',
    array(
      'labels' => array(
        'name' => __( 'Актеры' ),
        'singular_name' => __( 'Актеры' )
      ),
      'taxonomies' => array('category'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'actor_s'),
      'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' , 'taxonomies' )
    )
  );
}
//Кастомный тип записей РЕПЕРТУАР
add_action( 'init', 'create_posttype_rep' );
function create_posttype_rep() {
  register_post_type( 'repertoire',
    array(
      'labels' => array(
        'name' => __( 'Репертуар' ),
        'singular_name' => __( 'Репертуар' )
      ),
      'taxonomies' => array('category'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'repertoire_s'),
      'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' , 'taxonomies' )
    )
  );
}
//Кастомный тип записей О ТЕАТРЕ
add_action( 'init', 'create_posttype_theater' );
function create_posttype_theater() {
  register_post_type( 'theater',
    array(
      'labels' => array(
        'name' => __( 'О театре' ),
        'singular_name' => __( 'О театре' )
      ),
      'taxonomies' => array('category'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'theater_s'),
      'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' , 'taxonomies' )
    )
  );
}
//Добавляем превью
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'sliderimg', 255, 255, true );
}
//добавляем метабокс для репертуара ()
function my_admin() {
    add_meta_box( 'repertoire_meta_box',
        'Описание ближайшего спектакля на главной',
        'display_repertoire_meta_box',
        'repertoire', 'normal', 'high'
    );
}
add_action( 'admin_init', 'my_admin' );

function display_repertoire_meta_box( $repertoire ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $repertoire_name = esc_html( get_post_meta( $repertoire->ID, 'repertoire_name', true ) );
    $repertoire_date = esc_html( get_post_meta( $repertoire->ID, 'repertoire_date', true ) );
    $repertoire_time = esc_html( get_post_meta( $repertoire->ID, 'repertoire_time', true ) );
    $repertoire_scen = esc_html( get_post_meta( $repertoire->ID, 'repertoire_scen', true ) );
    $repertoire_autor = esc_html( get_post_meta( $repertoire->ID, 'repertoire_autor', true ) );
    $repertoire_directed_by = esc_html( get_post_meta( $repertoire->ID, 'repertoire_directed_by', true ) );
    $repertoire_genre = esc_html( get_post_meta( $repertoire->ID, 'repertoire_genre', true ) );
    $repertoire_duration = esc_html( get_post_meta( $repertoire->ID, 'repertoire_duration', true ) );
    $repertoire_premier = esc_html( get_post_meta( $repertoire->ID, 'repertoire_premier', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Название спектакля</td>
            <td><input type="text" size="70" name="repertoire_review_name" value="<?php echo $repertoire_name; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Дата (формат: 12 октября)</td>
            <td><input type="text" size="70" name="repertoire_review_date" value="<?php echo $repertoire_date; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Время (формат: 17:00 20:00)</td>
            <td><input type="text" size="70" name="repertoire_review_time" value="<?php echo $repertoire_time; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Сцена</td>
            <td><input type="text" size="70" name="repertoire_review_scen" value="<?php echo $repertoire_scen; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Автор</td>
            <td><input type="text" size="70" name="repertoire_review_autor" value="<?php echo $repertoire_autor; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Режисер</td>
            <td><input type="text" size="70" name="repertoire_review_directed_by" value="<?php echo $repertoire_directed_by; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Жанр</td>
            <td><input type="text" size="70" name="repertoire_review_genre" value="<?php echo $repertoire_genre; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Продолжительность спектакля</td>
            <td><input type="text" size="70" name="repertoire_review_duration" value="<?php echo $repertoire_duration; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Премьера спектакля состоялась</td>
            <td><input type="text" size="70" name="repertoire_review_premier" value="<?php echo $repertoire_premier; ?>" /></td>
        </tr>
    </table>
    <?php
}
function add_repertoire_review_fields( $repertoire_id, $repertoire ) {
    // Check post type for movie reviews
    if ( $repertoire->post_type == 'repertoire' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['repertoire_review_name'] ) && $_POST['repertoire_review_name'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_name', $_POST['repertoire_review_name'] );
        }
        if ( isset( $_POST['repertoire_review_date'] ) && $_POST['repertoire_review_date'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_date', $_POST['repertoire_review_date'] );
        }
        if ( isset( $_POST['repertoire_review_time'] ) && $_POST['repertoire_review_time'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_time', $_POST['repertoire_review_time'] );
        }
        if ( isset( $_POST['repertoire_review_scen'] ) && $_POST['repertoire_review_scen'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_scen', $_POST['repertoire_review_scen'] );            
        }
        if ( isset( $_POST['repertoire_review_autor'] ) && $_POST['repertoire_review_autor'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_autor', $_POST['repertoire_review_autor'] );
        }
        if ( isset( $_POST['repertoire_review_directed_by'] ) && $_POST['repertoire_review_directed_by'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_directed_by', $_POST['repertoire_review_directed_by'] );
        }
        if ( isset( $_POST['repertoire_review_genre'] ) && $_POST['repertoire_review_genre'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_genre', $_POST['repertoire_review_genre'] );
        }
         if ( isset( $_POST['repertoire_review_duration'] ) && $_POST['repertoire_review_duration'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_duration', $_POST['repertoire_review_duration'] );
        }
         if ( isset( $_POST['repertoire_review_premier'] ) && $_POST['repertoire_review_premier'] != '' ) {
            update_post_meta( $repertoire_id, 'repertoire_premier', $_POST['repertoire_review_premier'] );
        }
    }
}
add_action( 'save_post', 'add_repertoire_review_fields', 'add_actor_review_fields', 10, 2 );

//добавляем метабокс для актеров
function my_admin_2() {
    add_meta_box( 'actors_meta_box',
        'Дополнительные данные об актерах',
        'display_actors_meta_box',
        'actor', 'normal', 'high'
    );
}
add_action( 'admin_init', 'my_admin_2' );

function display_actors_meta_box( $actor ) {
    // Retrieve current name  based on review ID
    $actor_bold_evords = esc_html( get_post_meta( $actor->ID, 'actor_bold_evords', true ) );
    $actor_main_evords = esc_html( get_post_meta( $actor->ID, 'actor_main_evords', true ) );
    $actor_all_avords = esc_html( get_post_meta( $actor->ID, 'actor_all_avords', true ) );
    $actor_when = esc_html( get_post_meta( $actor->ID, 'actor_when', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Заслуга выдекленная жирным:</td>
            <td><input type="text" size="70" name="actor_review_bold_evords" value="<?php echo $actor_bold_evords; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Заслуги отображающиеся на главной:</td>
            <td><input type="text" size="70" name="actor_review_main_evords" value="<?php echo $actor_main_evords; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Заслуги отображающиеся на странице актеров:</td>
            <td><input type="text" size="70" name="actor_review_all_avords" value="<?php echo $actor_all_avords; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Года работы актера:</td>
            <td><input type="text" size="70" name="actor_review_when" value="<?php echo $actor_when; ?>" /></td>
        </tr>
    </table>
    <?php
}
function add_actor_review_fields( $actor_id, $actor ) {
    // Check post type for movie reviews
    if ( $actor->post_type == 'actor' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['actor_review_bold_evords'] ) && $_POST['actor_review_bold_evords'] != '' ) {
            update_post_meta( $actor_id, 'actor_bold_evords', $_POST['actor_review_bold_evords'] );
        }
        if ( isset( $_POST['actor_review_main_evords'] ) && $_POST['actor_review_main_evords'] != '' ) {
            update_post_meta( $actor_id, 'actor_main_evords', $_POST['actor_review_main_evords'] );
        }
        if ( isset( $_POST['actor_review_all_avords'] ) && $_POST['actor_review_all_avords'] != '' ) {
            update_post_meta( $actor_id, 'actor_all_avords', $_POST['actor_review_all_avords'] );
        }
        if ( isset( $_POST['actor_review_when'] ) && $_POST['actor_review_when'] != '' ) {
            update_post_meta( $actor_id, 'actor_when', $_POST['actor_review_when'] );
        }
    }
}
add_action( 'save_post', 'add_actor_review_fields', 11, 2 );

//убираем лишние поля из формы отзыва
 function remove_url_from_comments($fields) {
    unset($fields['url']);
    unset($fields['email']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_url_from_comments');

//меняем ссылочку для шаблона репертуара
  add_filter( 'template_include', 'include_template_function_repertoire', 1 );

  function include_template_function_repertoire( $template_path ) {
    if ( get_post_type() == 'repertoire' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-repertoire.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-repertoire.php';
            }
        }
    }
    return $template_path;
}

//добавляем метабокс для превью новости
function my_admin_3() {
    add_meta_box( 'news_meta_box',
        'Дополнительные данные о новостях',
        'display_news_meta_box',
        'news', 'normal', 'high'
    );
}
add_action( 'admin_init', 'my_admin_3' );

function display_news_meta_box( $news ) {
    // Retrieve current name  based on review ID
    $news_preview = esc_html( get_post_meta( $news->ID, 'news_preview', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Короткое описание новости для главной:</td>
            <td><input type="text" size="70" name="main_news_preview" value="<?php echo $news_preview; ?>" /></td>
        </tr>
    </table>
    <?php
}
function add_news_fields( $news_id, $news ) {
    // Check post type for movie reviews
    if ( $news->post_type == 'news' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['main_news_preview'] ) && $_POST['main_news_preview'] != '' ) {
            update_post_meta( $news_id, 'news_preview', $_POST['main_news_preview'] );
        }
    }
}
add_action( 'save_post', 'add_news_fields', 11, 2 );


?>