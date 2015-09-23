<?php
/*
Template Name: repertoire
*/

get_header(); // Подключаем хедер ?> 
  <!--<div class="repertoireTitle __darkBlue">  repertoireTitle -->
    <div class="wrapper">
      <h2 class="block_title">Репертуар театра</h2>
    </div><!-- end wrapper -->
  <!--</div> end repertoireTitle -->
  <div class="wrapper">
    <div class="repertoireAll"> <!-- repertoire -->
      <?php 
    $mypost = array( 'post_type' => 'repertoire', 'cat'=>'7');
    $loop = new WP_Query( $mypost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
    	<?php
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, 'full');
			// данный код извлекает url картинки Вашей миниатюры Wordpress
			$image_url = $image_url[0];
		?>
        <article class="_single">
                <div class="_thumbnail" style="background:url(<?php echo $image_url; ?>) no-repeat;background-size: cover;"></div>
                <div class="_discription"> 
                  <p class="_name">
                    <span class="_nemaAlign"><?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_name', true ) ); ?></span>
                  </p>
                  <p class="_autor">
                   <strong>Автор: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_autor', true ) ); ?>
                  </p>
                  <p class="_directed_by">
                    <strong>Режиссер: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_directed_by', true ) ); ?>
                  </p>
                  <p class="_directed_by">
                    <strong>Жанр: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_genre', true ) ); ?>
                  </p>
                  <p class="_directed_by">
                   <strong>Продолжительность спектакля: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_duration', true ) ); ?>
                  </p>
                  <p class="_genre">
                   <strong>Премьера спектакля состоялась: </strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'repertoire_premier', true ) ); ?>
                  </p>
                  <a href="/?p=<?php echo get_the_ID(); ?>/">П<span style="font-size:.8em">одробнее</span></a> 
                </div>
        </article>
    <?php endwhile; ?>
    </div> <!-- end repertoire -->
  </div> <!-- end wrapper -->
<?php get_footer(); // Подключаем футер ?>