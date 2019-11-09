<?php
// Session starts here.
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>PURCHASE</title>
<!--meta name="viewport" content="width=device-width,initial-scale=1.0-->"
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.form{float:center;opacity:0.8;border-radius:10px;background-color:#282424; width:1000px;height:800px; border:none;padding:15px; margin:100px 100px;font-size:17px;color:#FFFFFF;}
.buttonAlign{background-color:#4CAF50;border:none;color:white;padding:10px 32px;text-decoration:none;font-size:16px;margin:1px 1px;cursor:pointer;}
.btn{border-radius:10px;background-color:lightblue;border:none;color:white;padding:12px 16px;font-size:15px;cursor:pointer;}
a:link,a:visited{opacity:0.6;background-color:#333;color:white;padding:14px 25px;text-align:center;text-decoration:none;display:inline-block;}
a:hover,a:active{background-color:blue;}
.image{border-radius:50px;width:50px;height:50px;}
#link{border-radius:50px;opacity:0.8;width:50px;height:50px;padding:0px;}
*{ box-sizing: border-box;}
img {width:100%;height:auto;}
section{display:none;}
span:hover + section{display:block;}
.top{opacity:0.8;background-color:#FFFFFF;width:1340px;height:260px;border:0px;padding:0 px;margin:0px;border-radius:10px;}
.box1{border:solid;padding:0px 15px;margin:0px 0px;width:700px;}
.box2{border:solid;padding:10px 15px;width:700px;}
.paypal{float:right;margin:100px 30px;}
.blue{position:absolute;right:29%;margin-top:300px;width:250px;height:200px;}
input,select,textarea{position:absolute;left:20%;}
.i{position:absolute;left:8%;margin-top:5px;}
@media screen and (min-width: 480px)
{.top{width:100%} 
.form{width:66%}
.box1{width:70%}
.box2{width:70%;height:70%}
.paypal{width:20%}
.blue{width:17%}
input,textarea{width:18.5%}
}
</style>

</head>
<body background="img/triangle.jpg" style="font-family:sans-serif;color:#000000;background-size:100% 100%;">

<div class="top">
<div style="float:left;font-size:40px;"><img style="opacity:0.9;width:280px;height:195px;margin:10px 30px;margin-bottom:0px;" src="img/logo.jpg" alt="kids"></div><br>
<span><a style="float:right; background-color:#FFFFFF;"href="logout.php" ><img src="img/logoutblue.png" style="float:right;width:100px;height:100px;margin-right:50px;margin-top:20px;"></a></span>
<section><h3 style="float:right;margin-top:50px;opacity:0.8;">Log Out</h3></section>
<div style="clear:left;"></div>
<a href="newindex.html">Store Home</a>
<a href="products.php">Products</a>
<a href="newoffer.html">Items on offer</a>
<a href="newsellers.html">Best Sellers</a>
<a href="newnews.html">FAQ</a>
<a href="newcontact.html">Contact Us</a>
</div>
    

    

		
		<br>
            
         <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 
 }
 ?>
            <?php //Linking the configuration file
            require 'config.php';
            ?>
            
        <form action="validation.php" class="form" method="POST" >
		<div class="paypal">Already have a <br><h4>Paypal Account<h4>
		<a style="padding:0px;opacity:1.0;" href="#paypal"><button class="btn">Login to Paypal&nbsp &nbsp<i class="fa fa-user"></i></button></a>
		</div>
		<img class="blue"src="img/bluethank.gif" >
		<div class="box1"><h3>PAYMENTS</h3></div>
		<br>
		
		
		<br><br>
		<div class="box2">First Name :
		<input type="text" name="fname" required></br>
		<br>Last Name :
		<input type="text" name="lname" required><br><br>
		Country :
		<select name="country_id">
		      <option value="pick" disabled selected>pick country</option>
		    <?php
		    $sql1 = mysqli_query($con, "SELECT country From Country");
		    $row = mysqli_num_rows($sql1);
		    while ($row = mysqli_fetch_array($sql1))
		    {
			 echo "<option value='". $row['country'] ."'>" .$row['country'] ."</option>" ;
		    }
		    ?>
		      </select>
		<br><br>
		Payment Type :
            			<select name=type_id>
		      <option value="pick" disabled selected required >pick type</option>
		    <?php
		    $sql2 = mysqli_query($con, "SELECT type From Type");
		    $row = mysqli_num_rows($sql2);
		    while ($row = mysqli_fetch_array($sql2))
		    {
			 echo "<option value='". $row['type'] ."'>" .$row['type'] ."</option>" ;
		    }
		    ?>
		      </select>
            <br>
		<br>Card Number :
		<input type="text" name="cardnum" pattern="[0-9]{16}" required><br><br>
            	    Expiry Month :
			<select name="month_id">
		      <option value="pick" disabled selected required>pick type</option>
		    <?php
		    $sql3 = mysqli_query($con, "SELECT month From Month");
		    $row = mysqli_num_rows($sql3);
		    while ($row = mysqli_fetch_array($sql3))
		    {
			 echo "<option value='". $row['month'] ."'>" .$row['month'] ."</option>" ;
		    }
		    ?>
		      </select><br><br>
        Expiry Year :
                  <select name="year_id">
		      <option value="pick" disabled selected  >pick date</option>
		    <?php
		    $sql4 = mysqli_query($con, "SELECT year From Year");
		    $row = mysqli_num_rows($sql4);
		    while ($row = mysqli_fetch_array($sql4))
		    {
			 echo "<option value='". $row['year'] ."'>" .$row['year'] ."</option>" ;
		    }
		    ?>
		      </select><br><br>
		CVV : 
		<input type="text" name="cvv" pattern="[0-9]{3}"><br><br>
		Billing Address: 
		<textarea rows="2" name="badd" cols="18" required></textarea><br><br><br>

	
		<input style="border-radius:10px;position:absolute;right:65%;"name="btnSubmit" type="submit" class="buttonAlign" value="Purchase" >
		
		<br><br><br><br><br><br><br><br>
</form>

<b style="position:absolute;right:47%;font-size:20px;color:black"><center>Follow Us!</center></b><br><br>


<div style="position:absolute;right:43%;display:inline;">
<a id="link" href="#facebook">
<img class="image"src="img/facebook.png" alt="fb"></a>
<a id="link"href="#instagram">
<img class="image"src="img/instagram.png" alt="insta"></a>
<a id="link"href="#googleplus">
<img class="image"src="img/googleplus.png" alt="gplus"></a>
<a id="link"href="#twitter">
<img class="image"src="img/twitter.jpg" alt="tweet"></a>
</div>




</body>
</html>

