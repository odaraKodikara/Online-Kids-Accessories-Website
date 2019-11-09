<?php
	include("config.php");
	
	if(isset($_POST["btnSubmit"]))
	{
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$conPassword=$_POST["conPassword"];
	$question=$_POST["question"];
	$answer=$_POST["answer"];

	$password=md5($conPassword);

	$qry= "INSERT INTO `user_registration` (`User_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Security_Question`, `Answer`) 
	VALUES ('', '$fname', '$lname', '$email', '$password', '$question', '$answer')";
	echo $qry;
	
	mysqli_query($con,$qry);
	}

	header ("location: login.php");
?>