<?php
session_start();
include 'routes.php';
// Creating DataBase
for($i=1; $i<=5; $i++){
    $con=mysqli_connect("localhost","root","","ghona");
    if(!$con){
      $conn = mysqli_connect("localhost","root","");
      $sql = "CREATE DATABASE ghona";
      if (mysqli_query($conn, $sql)) {
      echo "Database created successfully";
      } else {
      echo "Error creating database: " . mysqli_error($conn);
      }
    }else{
      $_SESSION['connection']=true;
    }
}

// Creating Database Table1
$query1=mysqli_query($con,"SELECT * from `helpdesk`");
if($query1){
  $_SESSION['query1']=true;
}else{
  $sql="CREATE TABLE helpdesk (
  id INT(150) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  sites VARCHAR(150) NOT NULL,
  usernames VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL,
  pass VARCHAR(150) NOT NULL,
  domain VARCHAR(150) NOT NULL,
  customerno VARCHAR(150) NOT NULL,
  firstname VARCHAR(150) NOT NULL,
  lastname VARCHAR(150) NOT NULL,
  phoneno VARCHAR(150) NOT NULL,
  dob VARCHAR(150) NOT NULL,
  gen VARCHAR(150) NOT NULL
  )";
  mysqli_query($con,$sql);
}

// Creating Database Table2
$query2=mysqli_query($con,"SELECT * from `helper`");
if($query2){
  $_SESSION['query2']=true;
}else{
  $sql="CREATE TABLE helper (
  id INT(150) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  sites VARCHAR(150) NOT NULL
  )";
  mysqli_query($con,$sql);
}

// Creating Database Table3
$query3=mysqli_query($con,"SELECT * from `trashed`");
if($query3){
  $_SESSION['query3']=true;
}else{
  $sql="CREATE TABLE trashed (
  id INT(150) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  sites VARCHAR(150) NOT NULL,
  usernames VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL,
  pass VARCHAR(150) NOT NULL,
  domain VARCHAR(150) NOT NULL,
  customerno VARCHAR(150) NOT NULL,
  firstname VARCHAR(150) NOT NULL,
  lastname VARCHAR(150) NOT NULL,
  phoneno VARCHAR(150) NOT NULL,
  dob VARCHAR(150) NOT NULL,
  gen VARCHAR(150) NOT NULL
  )";
  mysqli_query($con,$sql);
}
// Creating Database Table4
$query4=mysqli_query($con,"SELECT * from `snaps`");
if($query4){
  $_SESSION['query4']=true;
}else{
  $sql="CREATE TABLE snaps (
  id INT(150) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  snippet VARCHAR(150) NOT NULL,
  pass1 VARCHAR(150) NOT NULL,
  pass2 VARCHAR(150) NOT NULL,
  pass3 VARCHAR(150) NOT NULL,
  pass4 VARCHAR(150) NOT NULL,
  pass5 VARCHAR(150) NOT NULL,
  pass6 VARCHAR(150) NOT NULL
  )";
  mysqli_query($con,$sql);
}
flyto('index');
 ?>
