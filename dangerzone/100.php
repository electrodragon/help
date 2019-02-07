<?php include '../routes.php';
session_start();
$con=connection();
for($i=1; $i<=5; $i++){
  $query=mysqli_query($con,"DROP TABLE helpdesk");
  if($query){$_SESSION['message']="TABLE HELPDESK DROPPED !";}
}
flyto('tbdropper');
?>
