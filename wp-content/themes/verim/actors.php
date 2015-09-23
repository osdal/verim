<?php
/*
Template Name: actors
*/

get_header(); // Подключаем хедер ?> 
<div class="blureBg" id="blureBg"> <!-- blureBg -->
</div> <!-- end blureBg -->
<div class="__darkBlue"> <!-- _darkBlue -->
	<div class="wrapper"> <!-- wrapper -->
		<p class="allActorTitle">Об актерах</p>
	</div> <!-- end wrapper -->
</div> <!-- end _darkBlue -->
<div class="wrapper"> <!-- wrapper -->
	<div class="allActorsContainer"> <!-- allActorsContainer -->
			<?php
          global $post; // не обязательно
          $args = array( 'post_type' => 'actor', 'numberposts' => 40);
          $posts = get_posts($args);

          foreach( $posts as $post ){ setup_postdata($post); ?>
			<article class="allSingleActor"> <!-- allSingleActor -->

              	<?php
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id, large);
					// данный код извлекает url картинки Вашей миниатюры Wordpress
					$image_url = $image_url[0];

				?>
                            <a href="<?php get_the_ID(); ?>"><div class="actorsImg" style="background: url(<?php echo $image_url; ?>) no-repeat;background-size: cover;"></div></a>
              	<h3 class="_title"><?php the_title(); ?></h3>
              	<!-- <p class="__bold"><?php echo esc_html( get_post_meta( get_the_ID(), 'actor_bold_evords', true ) ); ?></p> -->
              	<!-- <p class="_mainText"><?php echo esc_html( get_post_meta( get_the_ID(), 'actor_all_avords', true ) ); ?></p> -->
				<a class="_allActorModslButton" href="javascript:void(0)" data-actor="modalActors<?php echo get_the_ID(); ?>">Читать подробнее <div class="_arrow"></div> </a>
			</article> <!-- allSingleActor -->
			<div class="modalActors" id="modalActors<?php echo get_the_ID() ?>"> <!-- modalActors -->
				<div class="redModalBg">
					<div class="close"></div>
					<div class="actorsImgModal" style="background: url(<?php echo $image_url; ?>) no-repeat;background-size: cover;"></div>
					<p class="actorsName"><?php the_title(); ?></p>
					<p class="actor_when"><?php echo esc_html( get_post_meta( get_the_ID(), 'actor_when', true ) ); ?></p>
				</div>
				<p><?php echo get_the_content(); ?></p>
			</div> <!-- end modalActors -->			
          <?php }
          wp_reset_postdata(); // сбрасываем переменную $post
          ?>		
	</div> <!-- end allActorsContainer -->
</div> <!-- end wrapper -->

<?php get_footer(); // Подключаем футер ?>