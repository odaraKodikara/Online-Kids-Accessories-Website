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
<html>
<head>
<title>Basket</title>
<link href="style1.css" type="text/css" rel="stylesheet" />
<style>
.header-area {
    background: none repeat scroll 0 0 #f4f4f4;
}
.header-area a {
    color: #888;
}
.user-menu ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.user-menu li {
    display: inline-block;
}
.user-menu li a {
    display: block;
    font-size: 13px;
    margin-right: 5px;
    padding: 10px;
}
.user-menu li a i.fa {
    margin-right: 5px;
}

		.topnav {
		  overflow: hidden;
		  background-color: grey;
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




		.topnav input[type=text] {
		  padding: 6px;
		  margin-top: 8px;
		  font-size: 17px;
		  border: none;
		}


		  .topnav input[type=text] {
			border: 1px solid #ccc;  
		  }
		}
</style>
</head>
<body background="product-images/triangle.jpg" >

<div class="topnav">
	<a href="newindex.html">Store Home</a>
	<a href="products.php">Products</a>
	<a href="products.php">Items on offer</a>
	<a href="products.php">Best Sellers</a>
	<a href="order.php">Shopping History</a>
	<div class="search-container">
		
	</div>
</div>

 
<div id="shopping-cart">
    <div class="txt-heading"><h1  align="center">Shopping Cart</h1></div>
    

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><b>Description</b></th>
<th style="text-align:left;"><b>Code</b></th>
<th style="text-align:right;" width="5%"><b>Quantity</b></th>
<th style="text-align:right;" width="10%"><b>Unit Price</b></th>
<th style="text-align:right;" width="10%"><b>Price</b></th>
<th style="text-align:center;" width="5%"><b>Remove</b></th>


</tr>	
<a id="btnEmpty1" href="index.php?action=empty"><img src="product-images/empty-cart.png" alt="empty"></a>&nbsp;
<a id="btnEmpty1" href="checkout.php"><img src="product-images/checkout.png" alt="checkout" height="25" width="32"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="product-images/icon-delete.png" alt="Remove Item" /></a></td>
               
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>	

  <?php
} else {
?>
    <div class="no-records"><img src="product-images/c1.png" height="50" width="70"/><br/><font size=4.5>You don't have any items in your cart.</font><br/>Have an account? Sign in to see your items.<br/><br/>
    <a id="btnEmpty" href="products.php">Start Shopping</a>
    <a id="btnEmpty" href="login.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign in&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>
<?php 
}
?>
</div>

<div id="product-grid">
    <div class="txt-heading"><h2 align="center">You May Be Interested In</h2></div>
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
</body>
</html>