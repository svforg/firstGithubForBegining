<?php

require_once "../core/QueryBuilder.php";

$db = new QueryBuilder;

$id = $_GET['id'];

$task = $db->getOneById("quests", $id);

?>

<?php require_once "../template-parts/header.php" ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-10">
				<h1>Edit Task</h1>
				<form action="/update?id=<?= $task['id'] ?>" method="post">
					<div class="form-group">
						<input type="text" name="title" class="form-control" value="<?= $task['title'] ?>">
					</div>
					<div class="form-group">
						<textarea name="content" class="form-control"><?= $task['content'] ?></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-warning">Submit</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>

<?php require_once "../template-parts/footer.php" ?>
