

<?php <?php  



if(!isset($_SESSION)) {
	session_start();
}

require_once("redirect.php");

require_once("validFunc.php");

$errors = array();
$message = "";

if(isset($_POST['submit'])) {		

	require_once 'engine/queryBuilder.php';
	$db = new queryBuilder;

	require_once 'components/auth.php';
	$auth = new Auth($db);
	
	$email = trim($_POST['email']);
	$pass = trim($_POST['pass']);
	
	$fieldsRequiredArray = array("email", "pass");
	validatePresence($fieldsRequiredArray);

	$fieldsWithMaxLengthArray = array("email" => 30, "pass" => 8);
	validateMaxLength($fieldsWithMaxLengthArray);
	
	if (empty($errors)) {
		if ($auth->accessLoginingUser($email, $pass)) {
			redirect_to("index.php");	
				

		}	else {			
		$message = "Email or login do not match";
		}
	}
	
}	else {
	$username = "";
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
	 <script>//document.querySelector('.accessedUser').style.display = 'none';</script> 
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-10">	
				<form class="accessedUser" id="formContact" action="author.php"  method="post">
					<h3><?php echo $message; ?></h3>
					<h3>
						<span id="errorBackend"><?php echo formErrors($errors); ?></span>
					</h3>
					<h3><div id="result"></div></h3>
					<table>
						<div class="form-group">
								<tr>
									<td><label for="email"><h3 class="pointerCursorAdd">Email:</h3></label></td>
									<td><input class="form-control" type="text" placeholder="email" id="email" name="email" value="<?php echo htmlspecialchars($email);?>"></td>
								</tr>		
						</div>
						<div class="form-group">							
								<tr>
									<td><label for="pass"><h3 class="pointerCursorAdd">Password:</h3></label></td>
									<td><input class="form-control" placeholder="pass"  type="password" id="pass" name="pass" value=""></td>
								</tr>														
						</div>					
						<div class="form-group">							
								<tr><td></td><td><input id="send" type="submit" name="submit" value="Submit" class="btn btn-success btn__login"></td></tr>	
								<tr><td></td><td><a href="formRegistrate.php" class="btn btn-info btn__registrate">Registration</a></td></tr>							
						</div>
					</table>	
					<h3><span id="errorFrontend"></span></h3>		
				</form> 			
			</div>
		</div>
	</div>

	<script src="js/custom.js"></script>	
</body>
</html>