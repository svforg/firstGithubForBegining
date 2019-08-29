<?php 

//подключаем querybuilder
require 'engine/queryBuilder.php';
$db = new queryBuilder;

require 'components/auth.php';
$auth = new Auth($db);

$auth->logoutUser();
header ('Location: author.php');  exit;

