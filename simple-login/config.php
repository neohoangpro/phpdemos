<?php
//error_reporting(0);

$DBhost = 'localhost';
$DBuser = 'root';
$DBpass = '';
$DBname = 'hocphp_auth';

$DBconn = new mysqli($DBhost, $DBuser, $DBpass, $DBname);

// if($DBconn->connect_errno)
if($DBconn->connect_errno)
{
	exit('Connect error!');
}
?>