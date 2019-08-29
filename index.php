<?php 
if(!isset($_SESSION)) {
	session_start();
}

require_once("redirect.php");

if (!$_SERVER['HTTP_REFERER']) {
	redirect_to("author.php");
}
	
require_once 'engine/queryBuilder.php';
$db = new queryBuilder;

require_once 'components/auth.php';
$auth = new Auth($db);

$user = $auth->currentUser();

$tasks = $db->all("quests");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>LiveDiary</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	 <script>document.querySelector('.accessedUser').style.display = 'none';</script> 
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-10">
				<div class="flexed_row">
					<div class="task__block flexed_column">
						<div class="col-md-6">
							<h3>All tasks</h1>
							<a href="create.php" class="btn btn-success margined_btn" >Add Task</a>
						</div>
					</div>			
					<div class="card">
						<div class="front">
							<div class="user__block img_wrapper">
								<img src="<?php echo $user['imgpath'];?>" class="cover img_wrapper" "alt="">
							</div>
						</div>
						<div class="back">
							<div class="user__block flexed_column">
								<p><?php echo $user['email'];?></p>	
								<a href="#" class="btn btn-warning user__block-exit">Личный кабинет</a>	
								<a href="logout.php" class="btn btn-warning user__block-exit">Выйти</a>						
							</div>
						</div>
					</div>
				</div>

			<?php foreach($tasks as $task) {?>

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
							<td><?php echo $task["id"];?></td>
							<td><?php echo $task['title'];?></td>
							<td>
								<a href="show.php?id=<?=  $task['id'];?>" class="btn btn-outline-info">
								Show
								</a>
								<a href="edit.php?id=<?=  $task['id'];?>" class="btn btn-outline-warning">
								Edit
								</a>
								<a href="delete.php?id=<?=  $task['id'];?>" class="btn btn-outline-danger" onclick="return confirm('Are u shure?')">
								Delete
								</a>
							</td>
						</tr>
					<?php }?>	
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<script src="js/custom.js"></script>
</body>
</html>