<?php
  include 'routes.php';
  $con=connection();
  $id=$_REQUEST['id'];
  if(empty($id)){
    flyto('trashcan');
  }
  else{
    $idea=idea();
    $query=mysqli_query($con,"SELECT * from `trashed` WHERE `id`='$id'");
    $result=mysqli_fetch_array($query);

      $a=1;
      for($i=0; $i<=10; $i++){
        $data[$i]=$result[$idea[$a]];
        $a++;
      }

      if(insertintotable($con,'helpdesk',$data)){
        mysqli_query($con,"DELETE FROM `trashed` WHERE `id`='$id'");
        flyto('trashcan');
      }else{
        flyto('404');
      }
  }
 ?>
