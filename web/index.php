<?php

$url = $_SERVER['REQUEST_URI'];

// Роутинг

if($url == '/show') {
    require "../show.php";  exit;
}
elseif($url == '/edit') {
    require "../edit.php";  exit;
}
elseif($url == '/create') {
    require "../create.php";  exit;
}
elseif($url == '/store') {
    require "../store.php";  exit;
}
elseif($url == '/delete') {
    require "../delete.php";  exit;
}
elseif($url == '/') {
    require "../index.php";  exit;
}
require "../index.php";  exit;
