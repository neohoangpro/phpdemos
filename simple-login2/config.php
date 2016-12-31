<?php 
$DBconn = new mysqli('localhost','root','','hocphp_auth3');
if($DBconn->connect_errno)
{
	exit('Khong ket noi duoc db');
}
?>