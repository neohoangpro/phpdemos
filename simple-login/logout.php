<?php 
session_start();
if(isset($_SESSION['logged']))
{
	//
	//session_unset($_SESSION);
	//$_SESSION['lol'] = 'cai lol';
	unset($_SESSION['logged']); //xóa biến đơn lẻ trong session
	//session_destroy();
	//print_r($_SESSION);
	header('Location:login.php');
}
else{
	//header('Location:login.php');
}
?>