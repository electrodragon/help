<?php include '../routes.php';
session_start();
$con=connection();
for($i=1; $i<=5; $i++){
  $query=mysqli_query($con,"DROP TABLE trashed");
  if($query){$_SESSION['message']="TABLE TRASHED DROPPED !";}
}
flyto('tbdropper');
?>
