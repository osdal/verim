<?php
/*
Template Name: news
*/

define( 'WP_USE_THEMES', false ); get_header(); // Подключаем хедер ?> 
<div class="newsWrap __darkBlue"><!-- newsWrap -->
    <div class="wrapper">
      <h2 class="block_title">Новости</h2>
    </div> <!-- end wrapper -->
  </div>  <!-- end newsWrap -->
  <div class="newsWrap"><!-- newsWrap -->
    <div class="wrapper"> <!-- wrapper -->      
        <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          query_posts( array( 'paged' => $paged ) );


          global $post; // не обязательно
          $args = array( 'post_type' => 'news', 'posts_per_page' => 100 );
          $posts = get_posts($args);
          foreach( $posts as $post ){ setup_postdata($post); ?>
            <section class="_singleNews">
              <span class="_date">
                <?php echo get_the_date(); ?>
              </span>
                
                <h3 class="_title"><span class="_titleAlign"><p><a href="/?p=<?php echo get_the_ID(); ?>/" style="color: white" ><?php the_title(); ?></a></p></span></h3> 
              <div class="entry-content">
                <?php the_content('Подробнее'); ?>
              </div>
              <a href="/?p=<?php echo get_the_ID(); ?>/">Подробнее</a>                      
            </section>
          <?php }
          wp_reset_postdata(); // сбрасываем переменную $post
          ?>
            <div class="pagenav">
               <?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
            </div>
   </div><!-- end wrapper -->

  </div> <!-- end newsWrap -->
<?php get_footer(); // Подключаем футер ?>