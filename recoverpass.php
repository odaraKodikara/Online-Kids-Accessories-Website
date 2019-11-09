<?php
 include 'config.php'; 
 
 $q="select * from user_registration";
 $result=$con->query($q);
 if ($result->num_rows>0)
 {
	 while($row=$result->fetch_assoc())
	 {
		 $question=$row['Security_Question'];
		 $answer=$row['Answer'];
	 }
 }

 $message = "Answer the security question";
echo "<script type='text/javascript'>alert('$message');
var answer = prompt('$question');
if(answer == '$answer')
{
	alert('User verified.Change your password.');
		location.href = 'userprofile.php';
} else 
{
        alert('Access denied.');
		location.href = 'login.php';
}
</script>";
?>


	
	