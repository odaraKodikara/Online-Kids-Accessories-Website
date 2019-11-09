<?php
$con=new mysqli("localhost","root","","kids' accessory store");

if($con->connect_error)
{
	die("connection failed:".$con->connect_error);
}

?>