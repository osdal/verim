<?php
/*
Template Name: Одна запись
*/
get_header(); // Подключаем хедер?> 
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>
	<div class="newsTitle __darkBlue">
		<div class="wrapper">
			<p class="singlNewsTitle"><?php the_title(); // Заголовок ?></p>		
		</div>
	</div>
	<div class="wrapper">
		<div class="singleNewsConteiner">		
			<?php the_content(); // Содержимое страницы ?>
 <?php comment_form()// Комментарии ?>			
		</div>
	</div>
	<?php endwhile; // Конец цикла ?>
<?php get_footer(); // Подключаем футер ?>