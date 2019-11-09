<?php
include("config.php");
 /*$q= "DELETE FROM `user_registration` WHERE First_Name='$fname'";
	echo $q;
	
	mysqli_query($con,$q);*/
	
	 $qry = "SELECT * FROM login";
   $result=$con->query($qry);
	
	if ($result->num_rows>0)
 {
	 while($row=$result->fetch_assoc())
	 {
		$lid=$row['id'];
		$lemail=$row['email'];
		$lpass=$row['password'];
		$ldate=$row['date'];
	 }
 }
 
	
	If($_GET){
    If(isset($_GET['delete'])){
    
		$q= "DELETE FROM `login` WHERE email='$lemail'";
	
	    mysqli_query($con,$q);
		
    }
}
header ("location: admin.php");
?>