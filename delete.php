<?php


$id = $_GET['id'];

require_once "../core/QueryBuilder.php";

$db = new QueryBuilder;

$db->deleteOneById("quests", $id);

require_once "../core/functions.php";
redirect_to("/"); exit;