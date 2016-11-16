<?php

session_start();

if(isset($_SESSION['logged']))
{
	header('Location:index.php');
}

require('config.php');

if(isset($_POST['register']))
{
	$name = addslashes($_POST['name']);
	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);
	$confirm_password = addslashes($_POST['confirm_password']);
	if($password != $confirm_password)
	{
		$errors['confirm_password'] = "Password confirmation not match";
	}

	$check_email = $DBconn->query("SELECT email FROM users WHERE email='$email'");
	//var_dump($check_email);
	// echo '<pre>';
	// print_r($check_email);
	// echo '</pre>';
	if($check_email->num_rows > 0)
	{
		$errors['check_email'] = 'This email already registered';
	}

	if(!isset($errors))
	{
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		echo $hashed_password;
		$strquery = "INSERT INTO users (name,email,password) VALUES ('$name', '$email', '$hashed_password')";
		if($DBconn->query($strquery))
		{
			$message = "Successfully registered";
		}
		else{
			$errors['not_successfully'] = "Error";
		}
	}
}
?>

<?php
include('layouts/header.php');
?>
					<div class="col-md-8 col-md-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Register</h3>
							</div>
							<div class="panel-body">

								
								<?php
								//display errors
								if(isset($errors))
								{
									echo '<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<ul>';
										foreach($errors as $error)
										{
											echo "<li>$error</li>";
										}								
									echo '</ul></div>';
								}
								
								//display message	
									if(isset($message))
									{	 
										echo "<div class='alert alert-success'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<strong>Title!</strong> $message
											</div>";
									}
									?>
								
								<form class="form-horizontal" action="" method="POST" role="form">
								
									<div class="form-group">
										<label class="col-md-4 control-label" for="name">Name:</label>
										<div class="col-md-6"><input type="text" name="name" class="form-control"></div>
										
									</div>
									
									<div class="form-group">
										<label for="email" class="col-md-4 control-label">Email address:</label>
										<div class="col-md-6">
											<input type="email" name="email" id="inputEmail" class="form-control" value="" required="required" title="">
										</div>
									</div>
									
									<div class="form-group">
										<label for="password" class="col-md-4 control-label">Password:</label>
										<div class="col-md-6">
										<input type="password" name="password" id="inputPassword" class="form-control" required="required" title="">
										</div>	
									</div>

									<div class="form-group">
										<label for="confirm_password" class="col-md-4 control-label">Confirm password:</label>
										<div class="col-md-6">
											<input type="password" name="confirm_password" id="inputConfirm_password" class="form-control" required="required" title="">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-4 col-md-offset-4">
											<button type="submit" name="register" class="btn btn-primary">Register</button>	
										</div>
										
									</div>
								</form>
							</div>
						</div> <!-- /.panel -->
					</div>
<?php
include('layouts/footer.php');
?>