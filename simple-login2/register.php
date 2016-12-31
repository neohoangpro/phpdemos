<?php 
require('config.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//chống sql injection
	$name = addslashes($_POST['name']);
	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);

	//check unique email
	$strquery = "SELECT email FROM users WHERE email = '$email'";
	$check = $DBconn->query($strquery);
	if($check->num_rows > 0)
	{
		$errors['email'] = 'Email already exist';
	}

	//neu khong co loi thi tien hanh insert vao db
	if(!isset($errors))
	{
		//mã hóa password
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		
		//insert to db
		$strquery = "INSERT INTO users (name,email,password)
					VALUES ('$name', '$email', '$hashed_password')";
		if($DBconn->query($strquery))
		{
			$message = "Registered successfully!";
			//header('Location:index.php');
		}
	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Title</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<?php 
					if(!isset($_SESSION['user']))
					{
						echo '<li><a href="register.php">Register</a></li>';
						echo '<li><a href="login.php">Login</a></li>';
					}
					else{
					?>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']['name'] ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Settings</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
					<?php } ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<?php 
					if(isset($errors['email']))
					{
					?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $errors['email'] ?>
					</div>
					<?php } ?>
					<?php 
					if(isset($message))
					{
					?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $message ?>
					</div>
					<?php } ?>
					<form action="" method="POST" role="form">
						<legend>Register</legend>
					
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" name="name" class="form-control" id="" placeholder="Input field">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="inputEmail" class="form-control" value="" required="required" title="">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="inputPassword" class="form-control" required="required" title="">
						</div>
					
						<button type="submit" class="btn btn-primary">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>
		

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>