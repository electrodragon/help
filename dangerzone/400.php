<?php include '../routes.php';
session_start();
$con=connection();
for($i=1; $i<=5; $i++){
  $query=mysqli_query($con,"DROP TABLE snaps");
  if($query){$_SESSION['message']="TABLE SNAPS DROPPED !";}
}
flyto('tbdropper');
?>
