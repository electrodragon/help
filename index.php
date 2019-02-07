<?php
 include 'routes.php';
 session_start();
 $hostname="localhost";
 $username="root";
 $password="";
 $databasename="ghona";
 $con=mysqli_connect($hostname,$username,$password,$databasename);
 if(!$con){
 	flyto('runner');
 }else{
 	flyto('welcome');
 }
?>