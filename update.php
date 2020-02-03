<?php

$data = [
	"id" => $_GET['id'],
	"title" => $_POST['title'],
	"content" => $_POST['content']		
];

require_once "../core/QueryBuilder.php";

$db = new QueryBuilder;

$db->updateOne("quests", $data);

require_once "../core/functions.php";

redirect_to("/"); exit;