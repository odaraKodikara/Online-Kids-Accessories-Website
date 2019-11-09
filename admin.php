<?php 
require 'config.php';  

session_start();
	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		$username = $_POST['email'];
		$password = $_POST['password'];
		
		
			$query = "SELECT * FROM admin WHERE email='$username' AND password='$password'";
			$result = mysqli_query($con, $query);
			$count = mysqli_num_rows($result);
			if($count == 0 )
			{
				$message = "You have Entred a Wrong Username or Password!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		
		
	}

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

?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0, shrink-to-fit=no">
<title>ADMINISTRATOR PAGE</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
a:link,a:visited{opacity:0.6;background-color:#333;color:white;padding:14px 25px;text-align:center;text-decoration:none;display:inline-block;}
a:hover,a:active{background-color:blue;}
.image{border-radius:50px;width:50px;height:50px;}
#link{border-radius:50px;opacity:0.9;width:50px;height:50px;padding:0px;}
.button{ padding:2px;background-color:#A9A9A9; border:none; float:right; color:white; text-align:center; cursor:pointer}
.fa{padding:9px;font-size:20px;width:25px;text-align:center;text-decoration:none;margin:0px 3px;}
.fa-facebook{float:right;background:#3B5998; color:white;}
.fa-google{float:right;background:#dd4b39; color:white;}
.sec{display:none;}
span:hover + section{display:block;}
.form{opacity:0.8;border-radius:50px;background-color:#282424; width:700px; border:none;padding:15px; margin:-400px 200px;font-size:18px;color:#FFFFFF;}
.buttonAlign{position:relative; left:32%;background-color:#4CAF50;border:none;color:white;padding:15px 32px;text-decoration:none;font-size:16px;margin:4px 2px;cursor:pointer;}
.btn{float:right;background-color:DodgerBlue;border:none;color:white;padding:12px 16px;font-size:25px;cursor:pointer;border-radius:0px;}
*{ box-sizing: border-box;}
img {width:100%;height:auto;}
.top{opacity:0.8;background-color:#FFFFFF;width:1480px;height:260px;border:0px;padding:0 px;margin:0px;border-radius:10px;}
input,textarea{position:absolute;left:35%;}
.i{position:absolute;left:5%;margin-top:5px;}
@media screen and (min-width: 480px)
{.top{width:100%} 
.form{width:50%}
input,textarea{width:18.5%}
}

table{border-collapse:collapse;font-size:20;}
th,td{border-bottom:1px solid #ddd;}
td{height:40px;}
tr:hover{background-color:#f5f5f5;}
tr:nth-child(even){background-color: #90EE90;}
th{background-color:#3CB371;color:white;}
h2{color:#3CB371;}
</style>
</head>
<body background="img/triangle.jpg" style="font-family:sans-serif;color:#000000;background-size:100% 100%;">
<div class="top">
<section style="float:left;font-size:40px;"><img style="opacity:0.9;width:280px;height:240px;margin:10px 30px;margin-bottom:0px;max-width:100%;height:auto;" src="img/logo.jpg" alt="kids"></section><br>
<span><a style="float:right; background-color:#FFFFFF;"href="logout.php" ><img src="img/logoutblue.png" style="float:right;width:100px;height:100px;margin-right:50px;margin-top:20px;"></a></span>
<section class="sec"><h3 style="float:right;margin-top:50px;opacity:0.8;">Log Out</h3></section>
<section style="clear:left;">
<a href="newindex.html">Store Home</a>
<a href="products.php">Products</a>
<a href="newoffer.html">Items on offer</a>
<a href="newsellers.html">Best Sellers</a>
<a href="newnews.html">FAQ</a>
<a href="order.php">Shopping History</a>
</div><br>

<center>
<div style="width:1000px;height:700px;border:solid;border-radius:15px;padding:50px;">
<center>
<table>
	<thead><h2>User account id=<?php echo $id; ?> </h2></thead>


    <tr>
    <th>First name</th>
    <td><?php echo $fname; ?></td>
	</tr>
	
	<tr>
	<th>Last name</th>
    <td><?php echo $lname; ?></td>
	</tr>
	
	<tr>
	<th>Email</th>
    <td><?php echo $email; ?></td>
	</tr>
	
	<tr>
	<th>Password</th>
    <td id="myInput">######</td>
	</tr>
	
	<tr>
	<th>Security Question</th>
    <td><?php echo $question; ?></td>
	</tr>
	
	<tr>
	<th>Answer</th>
    <td><?php echo $answer; ?></td>
	</tr>

</table>
</center>
<br>

<center>
<form method="GET" action="manageaccount.php">
<input style="width:250px;height:60px;border-radius:10px;" type="submit" class="button" name="delete" value="delete account" />
</form>
</center>
	
</div>
</center>

<br><br><br>

<center>
<div style="width:1000px;height:500px;border:solid;border-radius:15px;padding:50px;">
<center>	
<table>
	<thead><h2>User session id=<?php echo $lid; ?> </h2></thead>


    <tr>
    <th>Email address</th>
    <td><?php echo $lemail; ?></td>
	</tr>
	
	<tr>
	<th>Password</th>
    <td>######</td>
	</tr>
	
	<tr>
	<th>Login date & time</th>
    <td><?php echo $ldate; ?></td>
	</tr>

</table>
</center>
<br>

<center>
<form method="GET" action="managesession.php">
<input style="width:250px;height:60px;border-radius:10px;" type="submit" class="button" name="delete" value="delete session" />
</form>
</center>

</div>
</center>

<hr style="height:60pt; visibility:hidden;">
<b style="position:absolute;right:47%;font-size:20px;">Follow Us!</b>
<hr style="height:30pt; visibility:hidden;">
<section style="position:absolute;right:43%;display:inline;">
<a id="link" href="https://www.facebook.com">
<img class="image"src="img/facebook.png" alt="fb"></a>
<a id="link"href="https://www.instagram.com">
<img class="image"src="img/instagram.png" alt="insta"></a>
<a id="link"href="https://plus.google.com">
<img class="image"src="img/googleplus.png" alt="gplus"></a>
<a id="link"href="https://twitter.com">
<img class="image"src="img/twitter.jpg" alt="tweet"></a>
</section>

</body>
</html>