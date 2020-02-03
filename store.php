<?php

require_once "../core/QueryBuilder.php";

$db = new QueryBuilder;

$db->addNew("quests", $_POST);

require_once "../core/functions.php";

redirect_to("/"); exit;