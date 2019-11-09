<?php //Linking the configuration file
require 'config.php';
?>
<?php
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (empty($_POST['fname'])|| empty($_POST['lname']) || empty($_POST['cardnum'])  || empty($_POST['cvv']) || empty($_POST['badd'])){ 
 // Setting error message
$_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
  // Redirecting to first page 
	} else {
    if (preg_match("/^[0-9]{16}$/", $_POST['cardnum'])){ 
        $contact= $_POST['cardnum'];
    }else{	
	$_SESSION['error'] = "Invalid Credit/Debit card number.";
	
    }
    
    if (preg_match("/^[0-9]{3}$/", $_POST['cvv'])){ 
    $contact= $_POST['cvv'];
    }else{	
	$_SESSION['error'] = "Invalid cvv number.";
    }
	}


            if(isset($_POST["btnSubmit"]))
            {
	           $first_name = $_POST['fname'];
               $last_name = $_POST['lname'];
               $type_id = $_POST['type_id'];
               $country_id = $_POST['country_id'];
	           $cardno = $_POST['cardnum'];
	           $month_id = $_POST['month_id'];
	           $year_id = $_POST['year_id'];
	           $cvv = $_POST['cvv'];
	           
	           $sql3= "INSERT INTO purchase_details
		      VALUES('','','$first_name','$last_name','$country_id','$cardno','$type_id','$month_id','$year_id','$cvv')";
         
  	         if($con->query($sql3))
		      {
			     echo " ";
		      }
		      else
		      {
			     echo "Error In Inserting". $con->error;
		      }
  
            }



 mysqli_close($con);


?>
<!DOCTYPE HTML>
<html>
<head>
	<style>
div.background {
  background= "image/triangle.jpg";
  border: 10px solid black;
}

div.transbox {
  margin: 20px;
  background-color: black
  ;
  border: 10px solid black;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
}

div.transbox p {
  margin: 20%;
  font-weight: bold;
  color: #000000;
}
</style>
</head>
<body background = "image/triangle.jpg">
  <center>  
	<div class="container" style="margin-top:10%;margin-left:30%;margin-right:30%;background-color:none;color:black">

<div class="background" >
  <div class="transbox" >
     <form>
    
         <p><font size="15" color="white"><center>THANK YOU!</center><br>Your payment was successful</font></p>
         <button onclick="newindex.html" class="button10 button11" style="background-color:#569F47;border:none;color:white;padding: 25px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px; margin: 4px 2px;cursor: pointer;margin-left: 5%;margin-top: 50px"><a href="index.html">Homepage </a><span class="glyphicon glyphicon-chevron-right" ></span></button>
         
         <button onclick="order.php" class="button10 button11" style="background-color:#569F47;border:none;color:white;padding: 25px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;margin-left: 5%;margin-top: 50px"><a href="order.php">Purchase details </a><span class="glyphicon glyphicon-chevron-right" ></span></button>
    
    </form>
    </div>
        </div>
    </div>
    </center>
	
</body>
</html>
