<?php


	if(isset($_FILES['imgpath'])) {
		$errors = array();
		$fileName = $_FILES['imgpath']['name'];
		$fileSize = $_FILES['imgpath']['size'];
		$fileTemp = $_FILES['imgpath']['tmp_name'];
		$fileType = $_FILES['imgpath']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['imgpath']['name'])));

		$expensions = array("jpeg", "jpg", "png");

		if($fileSize > 2097152) {
			$errors[] = "File must be 2mbytes";
		}

		if(empty($errors) == true ) {
			move_uploaded_file($fileTemp, "img/".$fileName);			
		}	else {
			print $errors;
		}
	}

$_POST[imgpath] = "img/".$fileName;

require_once("redirect.php");
require_once("validFunc.php");


$errors = array();
$message = "";
if(isset($_POST['submit'])) {

	require 'engine/queryBuilder.php';
	$db = new queryBuilder;

	require 'components/auth.php';
	$auth = new Auth($db);

	$email = trim($_POST['email']);
	$pass = trim($_POST['pass']);

	validateEmail($email);

	$fieldsRequiredArray = array("email", "pass");
	validatePresence($fieldsRequiredArray);

	$fieldsWithMaxLengthArray = array("email" => 30, "pass" => 8);
	validateMaxLength($fieldsWithMaxLengthArray);

	if (empty($errors)) {
		$auth->registrateUser($_POST[email], $_POST[pass], $_POST[imgpath]);
		redirect_to("index.php");
	}	
	else {
		$message = "Email or login do not match";
	}
}	
else {
	$email = "";
	$message = "Please Log in";
}

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
			<div class="col-md-4 col-xs-10">
				<form class="accessedUser" enctype="multipart/form-data" action="formRegistrate.php" method="post">
					<h3><?php echo $message; ?></h3>
					<h3><?php echo formErrors($errors); ?>
					<div class="form-group">						
						<input type="text" class="form-control" placeholder="email" name="email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="pass" name="pass">						
					</div>
					<div class="form-group">						
						<input type="file" class="form-control" name="imgpath">
					</div>	
					<div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					</div>		
				</form> 
			</div>
		</div>
	</div>


	<script src="js/custom.js"></script>

</body>
</html>	