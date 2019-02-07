<?php
  include 'routes.php';
  $con=connection();
  $id=$_REQUEST['id'];
  if(empty($id)){
    flyto('index');
  }
  else{
    $idea=idea();
    $query=mysqli_query($con,"SELECT * from `helpdesk` WHERE `id`='$id'");
    $result=mysqli_fetch_array($query);

      $a=1;
      for($i=0; $i<=10; $i++){
        $data[$i]=$result[$idea[$a]];
        $a++;
      }

      if(insertintotable($con,'trashed',$data)){
        mysqli_query($con,"DELETE FROM `helpdesk` WHERE `id`='$id'");
        flyto('index');
      }else{
        flyto('404');
      }
  }
 ?>
