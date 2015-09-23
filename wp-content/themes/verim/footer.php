<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон футера
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */

	wp_footer(); // Необходимо для нормальной работы плагинов
?>
<footer> <!-- footer -->
	<div class="footer__darkBlue"> <!-- footer__darkBlue -->
		<div class="wrapper"> <!-- wrapper -->
			<div class="left col-sm-6"> <!-- left -->
				<div class="footerLogoWrap col-sm-6"> <!-- footerLogoWrap -->
					<img src="<?php echo get_template_directory_uri(); ?>/img/logoFooter.png" alt="лого верим">
				</div> <!-- end footerLogoWrap -->
				<div class="navFooterWrap col-sm-6"> <!-- navFooterWrap -->
					 <?php
			          $defaults = array(
			            'container'       => 'nav_footer',
			            'menu_class'      => 'menu_footer',
			            'echo'            => true,
			            'fallback_cb'     => 'wp_page_menu',
			            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			            'depth'           => 0,
			          );
			          wp_nav_menu( $defaults );
			        ?>
				</div> <!-- end navFooterWrap -->
			</div> <!-- end left -->
			<div class="right col-sm-6"> <!-- right -->
				<div class="_contacts col-sm-9">
					<p class="_phone">Телефон: (056) 790-99-31</p>
					<p class="_email">Е-mail: teatr@verim.dp.ua</p>
					<a class="contactUs" href="http://verim.dp.ua/%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B/">Свяжитесь с нами</a>
					<p class="separeit"></p>
					<p class="_addr">АДРЕС: г. Днепропетровск, ул. Набережная Победы, 5</p>
					<p class="_bilding">Дворец Детей и Юношества</p>
					<a class="_map" href="http://verim.dp.ua/%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B/">Посмотреть на карте</a>
				</div>
				<div class="_social col-sm-3">
					<p class="_title">мы в соцсетях</p>
					<ul class="_list">
						<li><a href="//ru-ru.facebook.com/pages/%D0%A2%D0%B5%D0%B0%D1%82%D1%80-%D0%92%D0%B5%D1%80%D0%B8%D0%BC-Theatre-Verim/192533804146132"><img src="<?php echo get_template_directory_uri(); ?>/img/fb.png" alt="fb"></a></li>
						<li><a href="//vk.com/teatr_verim"><img src="<?php echo get_template_directory_uri(); ?>/img/vk.png" alt="vk"></a></li>
						<li><a href="//www.youtube.com/results?search_query=%D1%82%D0%B5%D0%B0%D1%82%D1%80+%D0%B2%D0%B5%D1%80%D0%B8%D0%BC"><img src="<?php echo get_template_directory_uri(); ?>/img/yt.png" alt="yt"></a></li>
					</ul>
				</div>
			</div> <!-- end right -->
		</div> <!-- end wrapper -->
	</div> <!-- end footer__darkBlue -->
	<div class="copy__dark"> <!-- copy__dark -->
		<div class="copyWrap wrapper"> <!-- wrapper -->
	      <div class="copy col-sm-6">
	        &copy;&nbsp;2014 Театр "Верим!"
	      </div>
	      <div class="webpr col-sm-6">
	        <a href="//webpr.ua">Разработка сайта WebPr</a>
	      </div>
	    </div> <!-- end wrapper -->
	</div> <!-- end copy__dark -->
</footer> <!-- end footer -->
</body>
</html>