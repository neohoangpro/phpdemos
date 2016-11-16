<?php
session_start();

if(isset($_SESSION['logged']))
{
	header('Location:index.php');
}

require('config.php');

include('layouts/header.php');

if(isset($_POST['login']))
{
	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);
	$check_email = $DBconn->query("SELECT id, name, email, password FROM users WHERE email='$email'");
	//var_dump($check_email);
	if($check_email->num_rows == 0)
	{
		$errors['check_email'] = "Email not exist!";
	}
	if(!isset($errors))
	{
		$row = $check_email->fetch_assoc();
		$hashed_password = $row['password'];
		if(password_verify($password, $hashed_password))
		{
			$msg = "Successfully logged!";
			$_SESSION['logged']['id'] = $row['id'];
			$_SESSION['logged']['name'] = $row['name'];
			header('Location:index.php');
		}
		else{
			$errors['check_password'] = "Password incorect!";
		}
	}
}
?>

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Login</h3>
		</div>
		<div class="panel-body">
		<?php
		if(isset($errors))
		{
			echo '<div class="alert alert-danger">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				echo '<ul>';
				foreach($errors as $error)
				{
					echo "<li>$error</li>";
				}
				echo '</ul>';
			echo '</div>';
		}
		// if(isset($msg))
		// {
		// 	echo '<div class="alert alert-success">';
		// 		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		// 			<ul>';
		// 			echo "<li>$msg</li>";
		// 		echo '</ul>
		// 	</div>';
		// }
		?>
			<form action="" method="POST" class="form-horizontal" role="form">
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
						<div class="col-sm-4 col-sm-offset-4">
							<button type="submit" name="login" class="btn btn-primary">Login</button>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>

<?php
include('layouts/footer.php');
?>