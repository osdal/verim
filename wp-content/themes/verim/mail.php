<?php
  $to = "teatr@verim.dp.ua"; //Кому
  $from = "def@gmail.com"; //От кого
  $subject = "Форма обратной связи с сайта verim.dp.ua"; //Тема
  /* Заголовки */
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['e-mail']);
  $message = htmlspecialchars($_POST['message']);

  $body = "Имя: $name \nE-mail: $email \nТекст сообщения: $message";
  mail($to, $subject, $body); //Отправляем письмо
  echo "<!DOCTYPE html><html lang='ru'><head><meta http-equiv='refresh' content='2; url=http://verim.dp.ua/'/><meta charset='UTF-8'><title>Document</title></head><body><p> Ваше письмо успешно отправлено!</p></body></html>";
?>

<style>
  p {
    height: 50px;
    display: table-cell;
    width: 50%;
    margin: 0 auto;
    text-align: center;
    vertical-align: middle;
    border-radius: 10px;
    background: rgba(0,100,0, .5);
    border: 1px solid rgba(0,100,0, .3);
    font-size: 20px;
    color: rgba(0,0,0, .7);
  }
</style>