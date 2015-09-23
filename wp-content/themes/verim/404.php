<?php
/**
 * Чистый Шаблон для разработки
 * Это шаблон 404 ошибки, отрабатывает, когда написали фигни в адресную строку
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */
get_header(); // Подключаем хедер ?> 
<div class="wrapper"><h1 class="_error">Ошибка 404! Извините, страница не найдена. Возможно Вы ссылаетесь на несуществующую страницу либо она была удалена. </h1></div>

<style>
  ._error {
    padding: 1em;
    border: 3px solid rgba(200,0,0, .8);
    background:rgba(200,0,0, .4);
    color: #fff;
  }
</style>
<?php get_footer(); // Подключаем футер ?>