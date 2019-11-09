<?php
 require "config.php";
 
 $q="select * from user_registration";
 $result=$con->query($q);
 if ($result->num_rows>0)
 {
	 while($row=$result->fetch_assoc())
	 {
		 $fname=$row['First_Name'];
		 $lname=$row['Last_Name'];
		 $email=$row['Email'];
		 $password=$row['Password'];
	 }
 }

?>

<html>
<head>
<title>USER ACCOUNT</title>
<style>
a:link,a:visited{opacity:0.6;background-color:#333;color:white;padding:14px 25px;text-align:center;text-decoration:none;display:inline-block;}
a:hover,a:active{background-color:blue;}
.image{border-radius:50px;width:50px;height:50px;}
#link{border-radius:50px;opacity:0.8;width:50px;height:50px;padding:0px;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    box-sizing: border-box;
}

button {
    background-color: #B94034  ;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.logOutbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
	
.accbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #76A3E9  ;
	
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 8%;
    border-radius: 100%;
}


.container {
    padding: 100px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .logOutbtn {
       width: 100%;
	   
}	
.sec{display:none;}
span:hover + .sec{display:block;}   	   
</style>
</head>
<body background="img/triangle.jpg" style="font-family:sans-serif;color:#000000;">
<div style="opacity:0.8;background-color:#FFFFFF;width:1635px;height:300px;border:0px;padding:0 px;margin:0px;border-radius:10px">
<section style="float:left;font-size:40px;"><img style="opacity:0.9;width:240px;height:240px;margin:10px 30px;margin-bottom:0px;" src="img/logo.jpg" alt="kids"></section><br>
<span><a style="float:right; background-color:#FFFFFF;"href="logout.php" ><img src="img/logoutblue.png" style="float:right;width:100px;height:100px;margin-right:50px;margin-top:20px;"></a></span>
<section class="sec"><h3 style="float:right;margin-top:70px;opacity:0.8;">Log Out</h3></section>
<section style="clear:left;">
<a href="newindex.html">Store Home</a>
<a href="products.php">Products</a>
<a href="newoffer.html">Items on offer</a>
<a href="newsellers.html">Best Sellers</a>
<a href="newnews.html">News</a>
<a href="newcontact.html">Contact Us</a>
</div>

<hr>
<h1><center>MY ACCOUNT</center></h1>
<b><hr></b>

<form action="">
  <div class="imgcontainer">
  <center><img src="images/avatar1.png" alt="Avatar" class="avatar" height="110" width="42"></center>
  
 <p align="left"> <center><div class="gb_Db"><b><?php echo $fname,""," ",$lname,"";?></b></div></center></p>
  </div>
  
  <div class="container">
  <form method="post" class="standard" action="profile" id="settings-profile">
  
  
  <dl class="profileemail">
  
  <form>
  <fieldset>
  <legend><b>First Name</b></legend>
  <input type="text" value="<?php echo $fname,""; ?>">  <br>
  </fieldset>
  </form>
  
  
  <form>
  <fieldset>
  <legend><b>Last Name</b></legend>
  <input type="text" value="<?php echo $lname,""; ?>">  <br>
  </fieldset>
  </form>
 
 <form>
  <fieldset>
  <legend><b>Email</b></legend>
  <input type="text" value="<?php echo $email,""; ?>">  <br>
  </fieldset>
  </form>
 
  <br>
  <br>
  <h3><u><b>Update Details</b></u></h3>
  <form method="post" action="changedetails.php">
  <div class="container">
    <label for="uname"><b>Change First Name</b></label><br>
    <input type="text" name="ftext" value="<?php echo $fname,""; ?>"><br>

    <label for="psw"><b>Change Last Name</b></label><br>
    <input type="text" name="ltext" value="<?php echo $lname,""; ?>" ><br>
	
	<label for="psw"><b>Change Email</b></label><br>
    <input type="text" name="etext" value="<?php echo $email,""; ?>" ><br>
	
	<label for="psw"><b>Current Password</b></label><br>
    <input type="text" name="opassword" value="******" ><br>
	
	<label for="psw"><b>Change Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="npassword" ><br>
	
	<label for="psw"><b>Re-Enter Password</b></label><br>
    <input type="password" placeholder="Re-Enter Password" name="cnpassword" ><br><br>
	
	<form method="POST" action="changedetails.php">
	<button  name="btnSubmit"><span class="button">Update details</button>
	</form>
	<br><br>
        
	
	
  
  </div>
  
   </form>
</form>

<p align="center" id="icon"><br><br>
 <br>
 <img src="img/fb.png" alt="fb" style="width: 2%">&nbsp &nbsp  &nbsp &nbsp   
  <img src="img/twitter.png" alt="twitter" style="width:2%">&nbsp &nbsp  &nbsp  &nbsp  
  <img src="img/insta.png" alt="instagram" style="width:2%"> &nbsp &nbsp &nbsp   
  <img src="img/link.png" alt="linkedin" style="width:2%">&nbsp &nbsp  &nbsp    
  <img src="img/google.png" alt="googleplus" style="width:2%">&nbsp &nbsp  &nbsp    
</p>



<b style="position:absolute;right:47%;font-size:20px;">Follow Us!</b>


<hr style="border:0; width:80;height:30;">


<section style="position:absolute;right:43%;display:inline;">
<a id="link" href="https://www.facebook.com/" target="_blank">
<img class="image"src="img/facebook1.png" alt="fb"></a>
<a id="link"href="https://www.instagram.com/" target="_blank">
<img class="image"src="img/instagram1.png" alt="insta"></a>
<a id="link"href="https://plus.google.com/discover" target="_blank">
<img class="image"src="img/googleplus1.png" alt="gplus"></a>
<a id="link"href="https://twitter.com/" target="_blank">
<img class="image"src="img/twitter1.jpg" alt="tweet"></a>
</section>
</body>
</html>