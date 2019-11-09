<?php
include("config.php");
 /*$q= "DELETE FROM `user_registration` WHERE First_Name='$fname'";
	echo $q;
	
	mysqli_query($con,$q);*/
	
	 $sql = "SELECT * FROM user_registration";
   $result=$con->query($sql);
	
	if ($result->num_rows>0)
 {
	 while($row=$result->fetch_assoc())
	 {
		$id=$row['User_ID'];
		$fname=$row['First_Name'];
		$lname=$row['Last_Name'];
		$email=$row['Email'];
		$password=$row['Password'];
		$question=$row['Security_Question'];
		$answer=$row['Answer'];
	 }
 }
 
	
	If($_GET){
    If(isset($_GET['delete'])){
    
		$q= "DELETE FROM `user_registration` WHERE First_Name='$fname'";
	   
	
	    mysqli_query($con,$q);
		
    }
}
header ("location: admin.php");
?>