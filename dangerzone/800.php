<?php include '../routes.php';
session_start();
$con=connection();
$checkquery=mysqli_query($con,"SELECT * from `snaps`");
$nomo=0;
while($test=mysqli_fetch_array($checkquery)){
  $data[$nomo]=$test['id'];
  $nomo++;
}
$rows=mysqli_num_rows($checkquery);
if($rows!=0){
  for($i=0; $i<$rows; $i++){
    $query=mysqli_query($con,"DELETE from `snaps` WHERE id=$data[$i]");
    if($query){$_SESSION['message']="TABLE SNAPS CLEANED !";}
  }
}else{
  $_SESSION['message']="TABLE SNAPS ALREADY CLEAN !";
}
for($i=1; $i<=50; $i++){
  $filepath='../snippets/snap'.$i.'.txt';
  $filepointer=fopen($filepath,"w");
  fclose($filepointer);
}
flyto('tbdropper');
?>
