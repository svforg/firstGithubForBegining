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
				<h1>Edit Task</h1>
				<form action="update.php?id=<?=  $task['id'];?>" method="post">
					<div class="form-group">
						<input type="text" name="title" class="form-control" value="<?= $task['title']?>">
					</div>
					<div class="form-group">
						<textarea name="content" class="form-control"><?= $task['content']?></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-warning" style="text-transform: uppercase;">Submit</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</body>
</html>