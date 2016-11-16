<?php
session_start();
//echo '<pre>';
//print_r($_SESSION);
//check logged
if(!isset($_SESSION['logged']))
{
	//echo "chua login";
	header('Location:login.php');
	
}
else{
	$user_id =  $_SESSION['logged']['id'];
	$user_name = $_SESSION['logged']['name'];
}

include('layouts/header.php');
?>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Home page</h3>
					</div>
					<div class="panel-body">
						You are logged in!
					</div>
				</div>
<?php
include('layouts/footer.php');
?>			