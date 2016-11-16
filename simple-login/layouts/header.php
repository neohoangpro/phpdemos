<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Page</title>

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
				<div class="container">

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Home</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<!-- <ul class="nav navbar-nav">
						<li class="active"><a href="#">Link</a></li>
					</ul> -->
					<ul class="nav navbar-nav navbar-right">
					<?php
					if(isset($_SESSION['logged']))
					{
						echo '<li class="dropdown">';
							echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>". $_SESSION['logged']['name'] ."<b class='caret'></b></a>";
							echo '<ul class="dropdown-menu">
								<li><a href="#">Settings</a></li>
								<li><a href="logout.php">Logout</a></li>
								</ul>
							</li>';
					}
					else{
						echo '<li><a href="login.php">Login</a></li>';
						echo '<li><a href="register.php">Register</a></li>';
					}?>
					</ul>
				</div><!-- /.navbar-collapse -->
				</div> <!-- /.container -->
			</div>
		</nav>
		<div class="container-fluid">
			<div class="container">
				<div class="row">