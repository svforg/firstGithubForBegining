<?php


$id = $_GET['id'];

require 'engine/queryBuilder.php';

$db = new queryBuilder;

$db->deleteOneById("quests", $id);

header("location: index.php" ); exit;