<?php include '../routes.php';
session_start();
$filepath='../'.Drawpath('history');
if(filesize($filepath)!=0){
  for($i=1; $i<=5; $i++){
	$file=fopen($filepath,"w");
	fclose($file);
	}
  $_SESSION['message']="HISTORY CLEANED !";
}else{
  $_SESSION['message']="HISTORY ALREADY CLEAN !";
}
flyto('tbdropper');
?>
