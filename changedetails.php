<?php
 require "config.php";
 
 $q="select * from user_registration";
 $result=$con->query($q);
 if ($result->num_rows>0)
 {
	 while($row=$result->fetch_assoc())
	 {
		 $id=$row['User_ID'];
		
	 }
 }

if(isset($_POST["btnSubmit"]))
	{
	$fname=$_POST["ftext"];
	$lname=$_POST["ltext"];
	$email=$_POST["etext"];
	$pass=$_POST["cnpassword"];
	$password=md5($pass);
	
	/*$qry="UPDATE `user_registration` 
	SET `First_Name` = '$fname', `Last_Name` = '$lname', `Email` = '$email', `Password` = '$password' 
	WHERE `user_registration`.`User_ID` = $id";*/
	
	$qry="UPDATE user_registration 
	SET First_Name = '$fname', Last_Name = '$lname', Email = '$email', Password = '$password' 
	WHERE User_ID = '$id'";
	
	mysqli_query($con,$qry);
	}
	 header ("location: login.php");
?>