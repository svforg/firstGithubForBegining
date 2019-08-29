<?php

require 'engine/queryBuilder.php';

$db = new queryBuilder;

$id = $_GET['id'];

$task = $db->getOneById("quests", $id);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>LiveDiary</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-10">
				<h4><?= $task['title'];?></h4>
				<p>
					<?= $task['content'];?>
				</p>

				<a href="index.php" class="btn btn-primary">Go back</a>
				
			</div>
		</div>
	</div>
</body>
</html>