<?php
/*
Template Name: comments
*/
?>
<?php get_header(); // Подключаем хедер?> 
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>
<div class="commentsWrap __darkBlue"> <!-- commentsWrap -->
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
                          'number' => '100',
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
    </div>  <!-- end comments --> 
                <div class="pagenav">
               <?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
            </div>
    <?php comment_form()// Комментарии ?>
  </div> <!-- end wrapper -->
<?php endwhile; // Конец цикла ?> 
<?php get_footer(); // Подключаем футер ?>
