
<?php  

	include 'config.php'; 
	 session_start();
	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		$username = $_POST['email'];
		$pass = $_POST['password'];
		$password=md5($pass);
		
			$query = "SELECT * FROM user_registration WHERE Email='$username' AND Password='$password'";
			$result = mysqli_query($con, $query);
			$count = mysqli_num_rows($result);
			if($count == 1 )
			{
				header('location:newindex.html');
			}
			else
			{
				$message = "You have Entred a Wrong Username or Password!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
	
	$q= "INSERT INTO `login` (`id`, `email`, `password`, `date`) VALUES ('', '$username', '$password', CURRENT_TIMESTAMP)";
	echo $q;
	
	mysqli_query($con,$q);
		
	}	
	
?>
<html>
<head>
<style>
a:link,a:visited{opacity:0.6;background-color:#333;color:white;padding:14px 25px;text-align:center;text-decoration:none;display:inline-block;}
a:hover,a:active{background-color:blue;}
.image{border-radius:50px;width:50px;height:50px;}
#link{border-radius:50px;opacity:0.8;width:50px;height:50px;padding:0px;}
</style>
<script>
function myFunction() {

       var year = prompt("Answer the security question.What is your birth year?");
    if (year == "1998") {
		alert("User verified.Change your password.");
		location.href = "account.html";
    } else {
        alert("Access denied.");
    }
    
}
</script>
</head>
<body background="img/triangle.jpg" style="font-family:sans-serif;color:#000000;">
<div style="opacity:0.8;background-color:#FFFFFF;width:1635px;height:300px;border:0px;padding:0 px;margin:0px;border-radius:10px">
<section style="float:left;font-size:40px;"><img style="opacity:0.9;width:240px;height:240px;margin:10px 30px;margin-bottom:0px;" src="img/logo.jpg" alt="kids"></section><br>
<section style="clear:left;">
<html>
<head>
	<title>Login page</title>
	<link rel ="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
	<b><h1>Member Login</h1></b>
	
    <center><img src="images/th.jpg" style="width:400px;height:300px;border-radius:550px;margin-left:-80px;"></center>
	
	<form name="myform"  method="POST" action="">
	 <lable>
	 E-mail:</lable><br>
		<input type="text" name="email" value="" >
		
	<br>
	<lable>Password:</lable><br>
		<input type="password" name="password" value="">
	<br><br>
	 <label>
      <button style="border-radius:6px;"><a href="recoverpass.php" style="text-decoration:none;background-color:#FFFFFF;color:#000000;height:3px;">forget password?</a></button>
    </label>
	<br><br>
	 <label>
      <button style="border-radius:6px;"><a href="login.html" style="text-decoration:none;background-color:#FFFFFF;color:#000000;height:3px;">Login as admin</a></button>
    </label>
	<br><br>
	
	<input type="submit" name="submit" value="LOGIN">

	
	</form>
</body>
</html>
		


<hr style="border:0;width:80;height:500;">
<b style="position:absolute;right:47%;font-size:20px;">Follow Us!</b>

<!--remove the below hr tag to add your page content-->
<hr style="border:0; width:80;height:30;">

<section style="position:absolute;right:43%;display:inline;">
<a id="link" href="#facebook">
<img class="image"src="img/facebook.png" alt="fb"></a>
<a id="link"href="#instagram">
<img class="image"src="img/instagram.png" alt="insta"></a>
<a id="link"href="#googleplus">
<img class="image"src="img/googleplus.png" alt="gplus"></a>
<a id="link"href="#twitter">
<img class="image"src="img/twitter.jpg" alt="tweet"></a>
</section>
</body>
</html>
