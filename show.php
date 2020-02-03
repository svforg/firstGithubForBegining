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
				<h4><?= $task['title'] ?></h4>
				<p>
					<?= $task['content'] ?>
				</p>
				<a href="/" class="btn btn-primary">Go back</a>
			</div>
		</div>
	</div>


<?php require_once "../template-parts/footer.php" ?>
