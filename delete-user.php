<?php 
session_start();
$con = mysqli_connect("localhost", "root", "", "kids' accessory store");



	

	if (isset($_GET['id'])) 
	{
		// getting the user information
		$id = mysqli_real_escape_string($con, $_GET['id']);

		if ( $id == $_SESSION['id'] )
		{
			// should not delete current user
			header('Location: users.php?err=cannot_delete_current_user');
		} 
		else 
		{
			// deleting the user
			$query = "DELETE FROM purchase_details WHERE id = '$id' ";

			$result = mysqli_query($con,$query);

			if ($result) 
			{
				// user deleted
				header('Location:order.php?msg=user_deleted');
			} 
			else 
			{
				header('Location:order.php?err=delete_failed');
			}
		}
		
	} 
	else
	{
		header('Location:order.php');
	}
?>