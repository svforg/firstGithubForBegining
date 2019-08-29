<?php

//подключаем querybuilder
require 'engine/queryBuilder.php';

$db = new queryBuilder;

$db->addNew("quests", $_POST);

header("location: index.php" ); exit;