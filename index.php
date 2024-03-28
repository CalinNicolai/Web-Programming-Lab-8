<?php
//Подключаем класс позволяющий выводить компоненты
require_once("./handlers/Page.php");

// Выводим компонент header
Page::part("header");
// Выводим компонент form
Page::part("form");
// Выводим компонент comments
Page::part("comments");
// Выводим компонент footer
Page::part("footer");

// Write this file but make all rounded corners
