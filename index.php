<?php 
	
require_once "../core/QueryBuilder.php";

$db = new QueryBuilder;

$tasks = $db->all("quests");


?>

<?php require_once "../template-parts/header.php" ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-10">
				<div class="flexed_row">
					<div class="task__block flexed_column">
						<div class="col-md-6">
							<h3>All tasks</h1>
							<a href="/create" class="btn btn-success margined_btn" >Add Task</a>
						</div>
					</div>
				</div>

			<?php foreach($tasks as $task) : ?>

				<table class="table table-dark table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>		
						<tr>
							<td><?= $task["id"] ?></td>
							<td><?= $task['title'] ?></td>
							<td>
								<a href="/show?id=<?= $task['id'] ?>" class="btn btn-outline-info">
								Show
								</a>
								<a href="/edit?id=<?= $task['id'] ?>" class="btn btn-outline-warning">
								Edit
								</a>
								<a href="/delete?id=<?= $task['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Are u shure?')">
								Delete
								</a>
							</td>
						</tr>
					<?php endforeach ?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php require_once "../template-parts/footer.php" ?>
