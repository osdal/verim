<?php 
/*
Template Name: contacts
*/
?>

<?php get_header(); // Подключаем хедер?>
<div class="__darkBlue">
	<div class="wrapper">
		<p class="block_title">контакты</p>
	</div>
</div>
<div class="wrapper">
	<div class="contactsConteiner">
		<div class="left __float">
			<p class="_adrr"><strong>Адресс:</strong> г. Днепропетровск, ул. Набережная Победы, 5</p>
			<p class="_adrr"><strong>Телефон:</strong> (056) 790-99-31</p>
			<p class="_adrr"><strong>E-mail:</strong> teatr@verim.dp.ua</p>	
			<form class="contactUs" action="/wp-content/themes/verim/mail.php" name="contactUs" method="post">
				<p class="formTitle">Форма обратной связи</p>
				<div class="inputWrap">	
					<label for="name">Имя</label>
					<input type="text" id="name" name="name">
				</div>
				<div class="inputWrap">
					<label for="e-mail">E-mail</label>
					<input type="text" id="e-mail" name="e-mail">
				</div>
				<div class="inputWrap">
					<label for="message">Сообщение</label>
					<textarea name="message" id="message" rows="5"></textarea>
				</div>
				<input type="submit" value="Отправить">
			</form>
		</div>
		<div class="right __float">		
			<div id="map-canvas"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
function initialize() {
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(48.4507086, 35.0799095)
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map,
    title: 'Click to zoom'
  });

  google.maps.event.addListener(map, 'center_changed', function() {
    // 3 seconds after the center of the map has changed, pan back to the
    // marker.
    window.setTimeout(function() {
      map.panTo(marker.getPosition());
    }, 3000);
  });

  google.maps.event.addListener(marker, 'click', function() {
    map.setZoom(8);
    map.setCenter(marker.getPosition());
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php get_footer(); // Подключаем футер ?>
