<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон хэдера
 * http://dontforget.pro
 * @package WordPress
 * @subpackage verim
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
<title>
<?php // Генерируем тайтл в зависимости от контента с разделителем " | "
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?>
</title>
<?php
	wp_head(); // Необходимо для работы плагинов и функционала wp
?>
</head>
<body>
  <header>
    <div class="headerUnderline">
      <div class="wrapper"> <!-- wrapper -->
        <a class="logoHref" href="//verim.dp.ua"></a><img class="topLogo" src="<?php echo get_template_directory_uri(); ?>/img/logoHeader.png" alt="Логотип">
        <?php
          $defaults = array(
            'container'       => 'nav',
            'menu_class'      => 'menu',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
          );
          wp_nav_menu( $defaults );
        ?>
      </div> <!-- end wrapper -->
    </div>
  </header>
