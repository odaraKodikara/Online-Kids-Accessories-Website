<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "kids' accessory store");
?>


<!DOCTYPE html>
<html>
<head>
    <style>
    p.solid {
    border-style: solid;
    border-color:black;
         border-width: 8px 8px 8px 8px;
        border-radius: 15px;
}
       table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    text-align: center;
    padding: 10px;
}

tr:nth-child(even){background-color: #f2f2f2}
    
    
    </style>
    </head>
<body>
    
    <body background = "image/triangle.jpg">
        <center><h1><strong><p class="solid">Order Details</p></strong></h1></center>
			<center><div style="overflow-x:auto;">
				<table class="table table-bordered">
					<tr><h2>
                        <th width="15%"><h2>Purchase ID</h2></th>
                        <th width="15%"><h2>First Name</h2></th>
                        <th width="15%"><h2>Last Name</h2></th>
                        <th width="15%"><h2>Country</h2></th>
                        <th width="15%"><h2>Card Type</h2></th>
                        </h2>
                        </tr>
              
                    <?php
				$query = "SELECT * FROM purchase_details";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
					<tr>
						<td align="center"><?php echo $row["id"]; ?></td>
						<td align="center"><?php echo $row["first_name"]; ?></td>
						<td align="center"><?php echo $row["last_name"]; ?></td>
                        <td align="center"><?php echo $row["country_id"]; ?></td>
                        <td align="center"><?php echo $row["type_id"]; ?></td>
						
					</tr>
					
		
					<?php
					}
				}
			?>
						
				</table>
                </div></center>
</body>
</html>