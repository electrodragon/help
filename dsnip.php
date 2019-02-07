<?php include 'routes.php'; pagehead('Snippets','mystyle.css'); ?>
<?php session_start(); ?>
<?php
	if($_SESSION['connection']==false && $_SESSION['query1']==false && $_SESSION['query2']==false && $_SESSION['query3']==false && $_SESSION['query4']==false){
        flyto('runner');
    }
?>

<?php
  $snippath=$_REQUEST['snip'];
  $con=connection();
  $querysnip=mysqli_query($con,"DELETE FROM `snaps` WHERE `snippet`='$snippath'");
  $filepointer=fopen($snippath,"w");
  fclose($filepointer);
  flyto('snaps.php');
 ?>

<?php pagefoot(); ?>
