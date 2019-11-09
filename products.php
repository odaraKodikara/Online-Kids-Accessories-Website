<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

		.mySlides {display:none;}
		a:link,a:visited{opacity:0.6;background-color:#000000;color:white;padding:14px 25px;text-align:center;text-decoration:none;display:inline-block;}
		a:hover,a:active{background-color:blue;}
		.image{border-radius:50px;width:50px;height:50px;}
		#link{border-radius:50px;opacity:0.8;width:50px;height:50px;padding:0px;}

		* {box-sizing: border-box;}

		body {
		  margin: 0;
		  font-family: Arial, Helvetica, sans-serif;
		  
		}

		.topnav {
		  overflow: hidden;
		  background-color: #e9e9e9;
		}

		.topnav a {
		  float: left;
		  display: block;
		  color: white;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}



		.topnav .search-container {
		  float: right;
		}

		.topnav input[type=text] {
		  padding: 6px;
		  margin-top: 8px;
		  font-size: 17px;
		  border: none;
		}

		.topnav .search-container button {
		  float: right;
		  padding: 10px 10px;
		  margin-top: 8px;
		  margin-right: 16px;
		  background: #ddd;
		  font-size: 17px;
		  border: none;
		  cursor: pointer;
		}

		.topnav .search-container button:hover {
		  background: #ccc;
		}

		@media screen and (max-width: 600px) {
		  .topnav .search-container {
			float: none;
		  }
		  .topnav a, .topnav input[type=text], .topnav .search-container button {
			float: none;
			display: block;
			text-align: left;
			width: 100%;
			margin: 0;
			padding: 14px;
		  }
		  .topnav input[type=text] {
			border: 1px solid #ccc;  
		  }
		}
		
		.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #EB5749    ;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #AD382D   }

.button:active {
  background-color: #AD382D1;
  box-shadow: 0 5px #666;
  transform: translateY(4px);

		
.btn1{float:right;background-color:DogerBlue;border:none;color:white;padding:12px 16px;font-size:25px;cursor:pointer;border-radius:0px;}
*{ box-sizing: border-box;}
img {width:100%;height:auto;}
</style>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Products</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style1.css">
<link href="style1.css" type="text/css" rel="stylesheet" />  
</head>

<body background="product-images/triangle.jpg" style="font-family:sans-serif;color:#000000;">
<div style="opacity:0.8;background-color:#FFFFFF;width:1500px;height:250px;border:0px;padding:0 px;margin:0px;border-radius:10px">
<section style="float:left;font-size:40px;"><img style="opacity:0.9;width:240px;height:240px;margin:10px 30px;margin-bottom:0px;" src="product-images/logo.jpg" alt="kids"></section>
</div>

<div class="topnav">
	<a href="newindex.html">Store Home</a>
	<a href="products.php">Products</a>
	<a href="products.php">Items on offer</a>
	<a href="products.php">Best Sellers</a>
	<a href="newnews.html">News</a>
	<a href="newcontact.html">Contact Us</a>
	<a href="index.php">Basket</a>
	<div class="search-container">
		<form action="C:\Users\odara\Desktop\kids accessories\index.html">
			<input type="text" placeholder="Search.." name="search">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
</div>


<h1 align="center">Products</h1><br/>

<center><img src="product-images/ab.jpg" alt="Italian Trulli" height="400" width="900"></center>

<br/>
<center><button class="button">BABY GIRL</button>&emsp;&emsp;
<button class="button">BABY BOY</button>&emsp;&emsp;

<br/>
<br/>


    
<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM item WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>





<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	

		

<?php 
}
?>
</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM item ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>

<img src="product-images/zxc.PNG" alt="list">

</body>
</html>