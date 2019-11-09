<html>
<head>
    
    <title>Checkout</title>
<style>

input[type=text], input[type=password] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    box-sizing: border-box;
}

#btnEmpty {
	background-color: grey;
	border: #d00000 1px solid;
	padding: 5px 10px;
	color: white;
	float: center;
	text-decoration: none;
	border-radius: 5px;
	margin: 10px 5px;
	font-size:20px;
}
   	   
</style>
</head>
    
<body background="product-images/triangle.jpg" style="font-family:sans-serif;color:#000000;">

<hr>
<h2>Step 1</h2>
<hr>
<center><h1>CHECKOUT</h1> 
 
 <form name="form1" action="" method="post" >

  <b>Email</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email address">  <br>
  
  <b>Contact Number</b>&nbsp;&nbsp;&nbsp;
  <input type="text" name="phone" required pattern="[0-9]{10}" title="Please enter valid contactnumber[0-9 and 10 digits only]">  <br>
  
  <b>Shipping Address</b>
  <input type="text" name="address">  <br><br>
  
  <a id="btnEmpty" href="index.php"><< Back</a>
  <input type="submit" name="submit1" value="Save" id="btnEmpty">
  <a id="btnEmpty" href="purchasingPage.php">Next >></a>
     
 </form>
</center>
  
  
<?php
if(isset($_POST["submit1"]))
{
   
	$link=mysqli_connect("localhost","root","");
	mysqli_select_db($link,"kids' accessory store");
	mysqli_query($link,"insert into checkout(email,phone,address) values('$_POST[email]','$_POST[phone]','$_POST[address]')");

?>    
    <script type="text/javascript">
		alert("Your details saved successfully");
	
    </script>
    
<?php    

}

?>

</body>
</html>