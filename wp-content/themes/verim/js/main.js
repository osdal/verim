jQuery(document).ready(function($) {
    var count;
	$('#menu-top_menu li').each(function(i,e){
		count = i + 1;
	});
	var w = $( window ).width();
	if (w<=1440) {
		var el = (w-290)/count;
	}
	else {
		var el = 130
	}

	$('#menu-top_menu li').css({
		width: el+'px'
	});

//модальное окно на странице актеров
	$('[data-actor]').on("click", function(event){ // ловим клик по ссылки с id="go"
		var modal = this.getAttribute('data-actor')
		$('#blureBg').fadeIn(400, // сначала плавно показываем темную подложку
		 	function(){ // после выполнения предъидущей анимации
				$('#'+modal) 
					.css('display', 'block') // убираем у модального окна display: none;
					.animate({opacity: 1}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
		});
	});
	/* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
	$('.close, #blureBg').on( "click", function(){ // ловим клик по крестику или подложке
		$('.modalActors')
			.animate({opacity: 0}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
				function(){ // после анимации
					$(this).css('display', 'none'); // делаем ему display: none;
					$('#blureBg').fadeOut(400); // скрываем подложку
				}
			);
	});
/*узнаем сколько постов "Репертуар " опубликовано и подгоняем высоту афишы под их количество*/
	var postCount = $('#post_count').attr('data-post-count');
	var heightConteiner = $('#trigger').outerHeight();

	var trigHeight = (heightConteiner)+20+'px';
	$('#trigger').css('height', trigHeight);
/*ворочаем афишу*/
	$('#buttonMain').on('click', function(event){		
		var kl = $('#trigger').attr('class');

		if (kl == 'triggerUp') {
			$('#trigger')
				.attr('class', 'triggerDown')
				.css('height', '0');
			$('#buttonMain')
				.attr('class', 'buttonMain __down')
				.html('а<span style="font-size:0.7em">фиша</span>');
		}
		else {
			$('#trigger')
				.attr('class', 'triggerUp')
				.css('height', trigHeight);
			$('#buttonMain')
				.attr('class', 'buttonMain __up')
				.html('с<span style="font-size:0.7em">вернуть</span>');
		};
	});

/*ограничиваем ввод символов в отзыв*/
  var maxLen = 377;
  $('#comment').keyup( function(){
    var $this = $(this);
    if($this.val().length > maxLen){
      $this.val($this.val().substr(0, maxLen));
    }
   });
});
