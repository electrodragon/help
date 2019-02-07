<?php include '../routes.php';
session_start();
$con=connection();
for($i=1; $i<=5; $i++){
  $query=mysqli_query($con,"DROP TABLE helper");
  if($query){$_SESSION['message']="TABLE HELPER DROPPED !";}
}
flyto('tbdropper');
?>
