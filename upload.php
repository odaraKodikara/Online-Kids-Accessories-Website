<?php
$user="sanjay"; //you can fetch username here
$db=new mysqli("localhost","root","","kids' accessory store");
if($db->connect_errno){
echo $db->connect_error;
}
$pull="select * from userimage where user='$user'";
$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
$extension = @end(explode(".", $_FILES["file"]["name"]));
if(isset($_POST['pupload'])){
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))
{
 if ($_FILES["file"]["error"] > 0)
 {
 echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
 }
 else
 {
 echo '<div class="plus">';
 echo "Uploaded Successully";
 echo '</div>';echo"<br/><b><u>Image Details</u></b><br/>";
 echo "Name: " . $_FILES["file"]["name"] . "<br/>";
 echo "Type: " . $_FILES["file"]["type"] . "<br/>";
 echo "Size: " . ceil(($_FILES["file"]["size"] / 1024)) . " KB";
 if (file_exists("upload/" . $_FILES["file"]["name"]))
 {
 unlink("upload/" . $_FILES["file"]["name"]);
 }
 else{
 $pic=$_FILES["file"]["name"];
 $conv=explode(".",$pic);
 $ext=$conv['1'];
 move_uploaded_file($_FILES["file"]["name"],"upload/". $user.".".$ext);
 echo "Stored in as: " . "upload/".$user.".".$ext;
 $url=$user.".".$ext;
 $query="update userImage set url='$url', lastUpload=now() where user='$user'";
 if($upl=$db->query($query)){
echo "<br/>Saved to Database successfully";
 }
 }
 }
}else{
 echo "File Size Limit Crossed 200 KB Use Picture Size less than 200 KB";
}
}
?>
<form action="" method="post" enctype="multipart/form-data">
<?php
$res=$db->query($pull);
$pics=$res->fetch_assoc();
echo '<div class="imgLow">';
echo "<img src='upload/$pics[url]' alt='profile picture' width='80 height='64' class='doubleborder'/></div>";
?>
<input type="file" name="file" />
<input type="submit" name="pupload" class="button" value="Upload"/>
</form></span>