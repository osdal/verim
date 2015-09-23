<?php
/*
Template Name: about-theater
*/

get_header(); // Подключаем хедер ?> 
<div class="blureBg" id="blureBg"> <!-- blureBg -->
</div> <!-- end blureBg -->
<div class="aboutTheater __darkBlue"> <!-- _darkBlue -->
	<div class="wrapper"> <!-- wrapper -->
		<p class="aboutTheaterTitle">О <span style="font-size:.8em">театре</p>
	</div> <!-- end wrapper -->
</div> <!-- end _darkBlue -->
<div class="wrapper"> <!-- wrapper -->
	<div class="aboutTheater aboutTheaterContainer"> <!-- allActorsContainer -->
			<?php
          global $post; // не обязательно
          $args = array( 'post_type' => 'theater');
          $posts = get_posts($args);
          foreach( $posts as $post ){ setup_postdata($post); ?>
			<article class="_text"> <!-- allSingleActor -->
			<?php echo get_the_content(); ?>    
			</article> <!-- allSingleActor -->
          <?php }
          wp_reset_postdata(); // сбрасываем переменную $post
          ?>		
	</div> <!-- end allActorsContainer -->
</div> <!-- end wrapper -->

<?php get_footer(); // Подключаем футер ?>