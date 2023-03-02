<?php

session_start();
if (isset($_SESSION['login'])) {
	header("location:dashboard.php");

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<?php
// echo "<pre>";
// print_r($_SERVER);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



$name = $_POST['name'] ;
$pass = $_POST['password'];


include("fun/connect.php");


$sql = "SELECT * FROM users WHERE name = '$name' && password = '$pass' ";
$result = $conn->query($sql);

$num = $result->num_rows;

$row = $result->fetch_assoc();

if ($num > 0 && $row['pr'] <= 2) {
	$_SESSION['login'] = $name ;
	header("location:dashboard.php");
}

}
?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="POST" action="<?php 
					
						$_SERVER["PHP_SELF"];
					
					?>">
						<fieldset>
					
							<div class="form-group">
								<input class="form-control" placeholder="UserName" name="name" type="tetx">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" >
							</div>
							<?php   

		if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($num == 0) {
				echo "<div class='alert alert-danger'> check your data</div>";
			}elseif( $row['pr'] == 2){
				echo "<div class='alert alert-warning'> hi ".$row['name']." you are admin and not allow to enter this page</div>";
			}elseif( $row['pr'] == 3){
				echo "<div class='alert alert-warning'> hi ".$row['name']." you are supervisor and not allow to enter this page</div>";
			}
			
		}

?>
							<button type="submit"  class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
