<?php 
    session_start(); 
    
    if(isset($_GET['page'])){ 
          
        $pages=array("products"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="products"; 
              
        } 
          
    }else{ 
          
        $_page="products"; 
          
    } 
  
?> 

<html>
<head>

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   
    <link rel="stylesheet" href="css/style.css" /> 
	<link rel="styles" href="Style2.css" />
      
  
    <title>Products</title> 
<style>
a:link,a:visited{opacity:0.6;background-color:#333;color:white;padding:14px 25px;text-align:center;text-decoration:none;display:inline-block;}
a:hover,a:active{background-color:blue;}
.image{border-radius:50px;width:50px;height:50px;}
#link{border-radius:50px;opacity:0.8;width:50px;height:50px;padding:0px;}
</style>
</head>
<body background="img/triangle.jpg" style="font-family:sans-serif;color:#000000;">
<div style="opacity:0.8;background-color:#FFFFFF;width:1500px;height:300px;border:0px;padding:0 px;margin:0px;border-radius:10px">
<section style="float:left;font-size:40px;"><img style="opacity:0.9;width:240px;height:240px;margin:10px 30px;margin-bottom:0px;" src="img/logo.jpg" alt="kids"></section><br>
<section style="clear:left;">
<a href="newindex.html">Store Home</a>
<a href="newproducts1.php">Products</a>
<a href="newoffer.html">Items on offer</a>
<a href="newsellers.html">Best Sellers</a>
<a href="newnews.html">FAQ</a>
<a href="newcontact.html">Contact Us</a>
</div>



	
	
<br><center><img src="images/ee..jpg" style="width:70%"></center></br>

	<!-- Product grid -->
	<center>
  <span class="column">
    <span class="column">
      <span class="container">
        <img src="images/ty.jpg" style="width:20%">
        <p>Hair Bow for Kids<br><b>$4.99</b></p>
      
      <div class="">
        <img src="images/sd.jpg" style="width:20%">
        <p>Kids Colour Bag<br><b>$9.99</b></p>
      </div>
    </div>

    <div class="row">
      <div class="container">
        <span class="display-container">
          <img src="images/ee.jpg" style="width:20%">
          <span class="topleft">New</span>
          <div class="middle display-hover">
            <button class="lack">Buy now <i class="cart"></i></button>
          </div>
        </div>
        <p>Kids Watch<br><b>19.99</b></p>
      </div>
      <div class="container">
        <img src="images/tt.jpg" style="width:20%">
        <p>Kids Hair Cap<br><b>$10.50</b></p>
      </div>
    </div>

    <div class=" s6">
      <div class="container">
        <img src="images/ff.jpg" style="width:20%">
        <p>Kids Belt<br><b>$50.50</b></p>
      </div>
      <div class="container">
        <div class="container">
          <img src="images/hh.jpg" style="width:20%">
          <span class="display-topleft">Sale</span>
          <div class="display-hover">
            <button class="black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p>Kids hand Glove<br><b class="w3-text-red">$14.99</b></p>
      </div>
    </div>

    <div class=" s6">
      <div class="container">
        <img src="images/cc.jpg" style="width:20%">
        <p>Girl Hair Bow<br><b>$14.99</b></p>
      </div>
      <div class="w3-container">
        <img src="images/bb.jpg" style="width:20%">
        <p>Girl Hat<br><b>$24.99</b></p>
      </div>
	  </center>
	 


<hr style="border:0;width:80;height:80;">
<b style="position:absolute;right:47%;font-size:20px;">Follow Us!</b>







<hr style="border:0; width:50;height:50;">

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
