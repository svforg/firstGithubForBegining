<?php require_once "../template-parts/header.php" ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-10">
				<h1>Ceate Task</h1>
				<form action="/store" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<textarea name="content" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" >Submit</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>

<?php require_once "../template-parts/footer.php" ?>

