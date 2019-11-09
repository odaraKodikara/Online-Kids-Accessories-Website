 <?php

// Create connection
$conn = new mysqli("localhost","root","","kids' accessory store");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>









<?php
session_start();
include_once 'dbconnect.php';

if (isset($_POST['btn_delete']){
    $username = $_POST('username_delete');
    $sql = mysql_query("DELETE * FROM users WHERE user_id='$username'");

    if($sql){
        echo "Deleted";
    }
}


if(isset($_POST['btn_delete']){
        // Initialise PDO connection (May need to abstract connection to an include)
        $pdo = new PDO('mysql:host=localhost;dbname=xxx', 'xxx', 'xxxxx');

        $statement = $pdo->prepare("DELETE FROM users WHERE username = ?");
        $username = $_POST['username_delete'];
        $statement->execute(array($username));

        echo "Deleted.";
    }
	
	?>
	