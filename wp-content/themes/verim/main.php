<?php
/*
Template Name: index_page
*/
get_header(); // Подключаем хедер?>
  <div class="topSlider">
    <?php if( function_exists('cyclone_slider') ) cyclone_slider('main_slider'); ?>
  </div>
  <div class="repertoireTitle __dark"> <!-- repertoireTitle -->
    <div class="wrapper">
      <h2 class="block_title">ближайшие спектакли</h2>
    </div><!-- end wrapper -->
  </div><!-- end repertoireTitle -->
  <div class="wrapper">
    <div class="repertoire"> <!-- repertoire -->
      <?php 
    $mypost = array( 'post_type' => 'repertoire', 'posts_per_page' => '4',  'cat'=>'6', 'orderby' => 'post_date', 'order' => 'ASC'
    );
    $loop = new WP_Query( $mypost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <?php
          $image_id = get_post_thumbnail_id();
          $image_url = wp_get_attachment_image_src($image_id, 'full');
          // данный код извлекает url картинки Вашей миниатюры Wordpress
          $image_url = $image_url[0];
        ?>
        <article class="_single_last_repertoire col-md-6 col-sm-6">
                <div class="_thumbnail" style="background:url(<?php echo $image_url; ?>) no-repeat;background-size: cover;"></div>
                <div class="_discription"> 
                  <p class="_name">
                   &#171; <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_name', true ) ); ?> &#187;
                  </p>
                  <p class="_date">
                   <strong>Дата: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_date', true ) ); ?>
                  </p>
                  <p class="_time">
                   <strong>Время: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_time', true ) ); ?>
                  </p>
                  <p class="_scen">
                   <strong>Сцена: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_scen', true ) ); ?>
                  </p>
                  <p class="_autor">
                   <strong>Автор: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_autor', true ) ); ?>
                  </p>
                  <p class="_directed_by">
                    <strong>Режиссер: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_directed_by', true ) ); ?>
                  </p>
                  <p class="_genre">
                    <strong>Жанр: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_genre', true ) ); ?>
                  </p>
                  <a href="/?p=<?php echo get_the_ID(); ?>/">Подробнее</a> 
                </div>
        </article>
    <?php endwhile; ?>
    </div> <!-- end repertoire -->
  </div> <!-- end wrapper -->
  <div id="trigger" class="triggerUp"> <!-- trigger -->
    <div class="repertoire_month __darkBlue"> <!-- __darkBlue -->
      <div class="wrapper"> <!-- wrapper -->
        <h2 class="block_title_blue"><span>Р</span>епертуар на <?php 
        $month = date('n')-1; 
        $monthAll = array('Январь', 'Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
        echo $monthAll["$month"];
        ?></h2>
      </div> <!-- end wrapper -->
    </div> <!-- end __darkBlue -->
      <div class="repertoire_month"> <!-- repertoire_month -->
      <div class="wrapper"> <!-- wrapper -->
        <?php 
        $mypost = array( 'post_type' => 'repertoire', 'cat'=>'4', 'order'=>'ASC' );
        $loop = new WP_Query( $mypost );
        ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post();
         $cou = get_posts( array(
            'category'        => '4',
            'orderby'         => 'post_date',
            'post_type'       => 'repertoire',
            'post_status'     => 'publish'
            ) );
        ?>
          <div class="_discription_month">
            <div class="col-sm-4">
              <p class="_name">
               &#171; <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_name', true ) ); ?> &#187;
              </p>
            </div>
            <div class="col-sm-3">        
              <p class="_date">
               <span>Дата: </span> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_date', true ) ); ?>
              </p>
              <p class="_time">
               <span>Время: </span> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_time', true ) ); ?>
              </p>
              <p class="_time">
               <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_scen', true ) ); ?>
              </p>
            </div>
            <div class="col-sm-3">        
              <p class="_autor">
               <strong>Автор: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_autor', true ) ); ?>
              </p>
              <p class="_directed_by">
                <strong>Режиссер: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_directed_by', true ) ); ?>
              </p>
              <p class="_genre">
                <strong>Жанр: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_genre', true ) ); ?>
              </p>
            </div>
            <div class="col-sm-2">
              <a href="/?p=<?php echo get_the_ID(); ?>/">Подробнее</a>        
            </div>
          </div>
        <?php endwhile; ?>
        <div id="post_count" data-post-count="<?php echo count($cou); ?>"></div>
      </div> <!-- end wrapper -->
    </div> <!-- end repertoire_month -->
   </div> <!-- end trigger -->
   <div class="wrapper">
     <a id="buttonMain" class="buttonMain __up">с<span style="font-size:0.7em">вернуть</span></a>
   </div>
   <div class="newsWrap __dark"><!-- newsWrap -->
    <div class="wrapper">
      <h2 class="block_title">Новости</h2>
    </div> <!-- end wrapper -->
  </div>  <!-- end newsWrap -->
  <div class="newsWrap"><!-- newsWrap -->
    <div class="wrapper"> <!-- wrapper -->      
        <?php
          global $post; // не обязательно
          $args = array( 'post_type' => 'news', 'posts_per_page' => 3 );
          $posts = get_posts($args);
          foreach( $posts as $post ){ setup_postdata($post); ?>
            <section class="_singleNews">
              <span class="_date">
                <?php echo get_the_date(); ?>
              </span>
              <h3 class="_title"><span class="_titleAlign"><?php the_title(); ?></span></h3>
              <div class="entry-content">
                <?php echo esc_html( get_post_meta( get_the_ID(), 'news_preview', true ) ); ?>
              </div>
              <a href="/?p=<?php echo get_the_ID(); ?>/">Подробнее</a>                      
            </section>
          <?php }
          wp_reset_postdata(); // сбрасываем переменную $post
          ?>
          <a class="more" href="/news_s/">С<span style="font-size:0.7em">мотреть все</span></a>
    </div><!-- end wrapper -->
  </div> <!-- end newsWrap -->
  <div class="commentsWrap __dark"> <!-- commentsWrap -->
    <div class="wrapper"> <!-- wrapper -->
      <h2 class="block_title">Отзывы</h2>
    </div><!-- end wrapper -->
  </div>  <!-- end commentsWrap -->
  <div class="wrapper"> <!-- wrapper -->
    <div class="comments"> <!-- comments -->
      <?php 
       $comments_parametrs = array(
                          'author_email' => '',
                          'ID' => '',
                          'karma' => '',
                          'number' => '3',
                          'offset' => '',
                          'orderby' => '',
                          'order' => 'DESC',
                          'parent' => '',
                          'post_ID' => '69',
                          'post_id' => 0,
                          'post_author' => '',
                          'post_name' => '',
                          'post_parent' => '',
                          'post_status' => '',
                          'post_type' => '',
                          'status' => 'approve',
                          'type' => '',
                          'user_id' => '',
                          'search' => '',
                          'count' => false,
                          'meta_key' => '',
                          'meta_value' => '',
                          'meta_query' => '',
                          'date_query' => null, // See WP_Date_Query
                  );
      $comments = get_comments( $comments_parametrs );?>
        <?php foreach($comments as $comment) : ?>
          <div class="single_comment col-sm-4">
            <p class="comment_content">
             <?php echo($comment->comment_content);?>
            </p>
            <p class="comment_title">
             <?php echo($comment->comment_author);?>
            </p>
          </div>
        <?php  endforeach; ?>
        <a class="more" href="/отзывы/">С<span style="font-size:0.7em">мотреть все</span></a>
    </div>  <!-- end comments --> 
  </div> <!-- end wrapper -->
  <div class="actor __dark" style="display:none;">
    <div class="wrapper">
      <h2 class="block_title">Актеры</h2>
    </div>
  </div>
  <div class="actor" style="display:none;">
    <div class="wrapper">
        <?php
          global $post;
          $args = array( 'post_type' => 'actor', 'posts_per_page' => 3 );
          $posts = get_posts($args);
          foreach( $posts as $post ){ setup_postdata($post); ?>
          <div class="wrapHref col-sm-4">
            <section class="_singleActor">
              <?php echo get_the_post_thumbnail(); ?>
              <div class="actor_blure">
                <h3 class="_title"><?php the_title(); ?></h3>
                <!-- <p><?php echo esc_html( get_post_meta( get_the_ID(), 'actor_main_evords', true ) ); ?></p> -->
              </div>               
             </section> <!-- end _singleActor -->
             <!-- <a class="single_more" href="/?p=<?php echo get_the_ID(); ?>/">Подробнее</a> -->
          </div>
          <?php }
          wp_reset_postdata(); // сбрасываем переменную $post
        ?>

        <a class="more" href="/об-актерах/">О<span style="font-size:0.7em">бо всех</span></a>
    </div> <!-- end wrapper -->
  </div> <!-- end actor -->
<?php get_footer(); // Подключаем футер ?>
