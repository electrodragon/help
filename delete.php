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

      $myfilepath=DrawPath('trashjunk');
      $myfilepointer=fopen($myfilepath,"a");
      $txt=PHP_EOL;
      fwrite($myfilepointer,$txt);
      $txt=PHP_EOL."/*".whattime()."*/".PHP_EOL;
      fwrite($myfilepointer,$txt);

      // WRITING IN INSERTION

        $query=mysqli_query($con,"SELECT * from `trashed` WHERE `id`='$id'");
          $test=mysqli_fetch_array($query);
            for($i=0; $i<=11; $i++){
              $d[$i]=$test[$idea[$i]];
            }
            $txt='$query=mysqli_query($con,"INSERT INTO `trashed`(`sites`, `usernames`, `email`, `pass`, `domain`, `customerno`, `firstname`, `lastname`, `phoneno`, `dob`, `gen`) VALUES (';
            fwrite($myfilepointer,$txt);
            $txt="'$d[1]','$d[2]','$d[3]','$d[4]','$d[5]','$d[6]','$d[7]','$d[8]','$d[9]','$d[10]','$d[11]'";
            fwrite($myfilepointer,$txt);
            $txt=')");';
            fwrite($myfilepointer,$txt);
            $txt=PHP_EOL;
            fwrite($myfilepointer,$txt);
            $txt='if($query){echo "Inserted !";}else{echo "Failed !";}';
            fwrite($myfilepointer,$txt);

            fclose($myfilepointer);

        $query=mysqli_query($con,"DELETE FROM `trashed` WHERE `id`='$id'");
        if($query){
        flyto('trashcan');
        }else{
        flyto('404');
      }
  }
 ?>
