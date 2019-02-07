<?php include '../routes.php';
session_start();
$con=connection();
$checkquery=mysqli_query($con,"SELECT * from `helper`");
$nomo=0;
while($test=mysqli_fetch_array($checkquery)){
  $data[$nomo]=$test['id'];
  $nomo++;
}
$rows=mysqli_num_rows($checkquery);
if($rows!=0){
  for($i=0; $i<$rows; $i++){
    $query=mysqli_query($con,"DELETE from `helper` WHERE id=$data[$i]");
    if($query){$_SESSION['message']="TABLE HELPER CLEANED !";}
  }
}else{
  $_SESSION['message']="TABLE HELPER ALREADY CLEAN !";
}
flyto('tbdropper');
?>
