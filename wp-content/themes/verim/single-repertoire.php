<?php
 /*Template Name: New Template
 */
get_header(); ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>
    <div class="singleRepertoire __darkBlue">
        <div class="wrapper">
            <p class="singleRepertoireTitleTop"><?php the_title(); // Заголовок ?></p>        
        </div>
    </div>
     <?php the_content(); ?>
        <div class="commentSpectacular"> <!-- commentSpectacular -->
          <div class="__dark"> <!-- __darkBlue -->
            <div class="wrapper"> <!-- wrapper -->
              <div class="_title">Отзывы</div>
			 
            </div> <!-- end wrapper -->
          </div> <!-- end __darkBlue -->
          <div class="wrapper">
            <?php echo do_shortcode( '[WPCR_INSERT]' ); ?>
			
          </div>
        </div> <!-- end commentSpectacular -->
		 
    <?php endwhile; // Конец цикла ?>
    <script type="text/javascript">
    // подсветка пункта меню
    jQuery(document).ready(function($){
      $('#menu-item-129').addClass('current_page_item');
    });
    </script>
<?php get_footer(); // Подключаем футер ?>
