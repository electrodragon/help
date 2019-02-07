<?php include '../routes.php';
session_start();
$filepath='../'.DrawPath('junk');
if(filesize($filepath)!=0){
  for($i=1; $i<=5; $i++){
	$file=fopen($filepath,"w");
	fclose($file);
	}
  $_SESSION['message']="JUNK CLEANED !";
}else{
  $_SESSION['message']="JUNK ALREADY CLEAN !";
}
flyto('tbdropper');
?>
