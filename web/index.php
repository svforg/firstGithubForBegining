<?php

$url = $_SERVER['REQUEST_URI'];

// Роутинг
switch ($url) {
    case "/show":
        $template = "../show.php";
        break;

    case "/edit":
        $template = "../edit.php";
        break;

    case "/create":
        $template = "../create.php";
        break;

    case "/store":
        $template = "../store.php";
        break;

    case "/delete":
        $template = "../delete.php";
        break;

    case "/":
        $template = "../delete.php";
        break;

    default:
        $template = "../index";
        break;
}

require $template;  exit;
