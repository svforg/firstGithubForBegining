<?php

$data = [
	"id" => $_GET['id'],
	"title" => $_POST['title'],
	"content" => $_POST['content']		
];

require 'engine/queryBuilder.php';

$db = new queryBuilder;

$db->updateOne("quests", $data);

header("location: index.php" ); exit;