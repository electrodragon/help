<?php
  function RoutesDB(){
    $idea[0]='db/helpdeskdb.txt';
    $idea[1]='db/trashed.txt';
    $idea[2]='css/bootstrap.min.css';
    $idea[3]='js/bootstrap.min.js';
    $idea[4]='index.php';
    $idea[5]='404.php';     // DONT CHANGE THIS ONE
    $idea[6]='delete.php';
    $idea[7]='js/functions.php';
    $idea[8]='restore.php';
    $idea[9]='routes.php';
    $idea[10]='trashcan.php';
    $idea[11]='update.php';
    $idea[12]='css/mystyle.css';
    $idea[13]='js/jquery.min.css';
    $idea[14]='welcome.php';
    $idea[15]='runner.php';
    $idea[16]='403.php';
    $idea[17]='junk/trashjunk.txt';
    $idea[18]='snaps.php';
    $idea[19]='snippets/snippets-config.php';
    $idea[20]='form.php';
    $idea[21]='js/connecton.php';
    $idea[22]='demo/demo.php';
    $idea[23]='js/tbdropper.php';
    $idea[24]='mvtotrash.php';
    $idea[25]='images/trashbin.png';
    $idea[26]='images/norecord.png';
    $idea[27]='db/history.txt';
    $idea[28]='images/snippets.png';
    $idea[29]='dangerzone/100.php';
    $idea[30]='dangerzone/200.php';
    $idea[31]='dangerzone/300.php';
    $idea[32]='dangerzone/400.php';
    $idea[33]='dangerzone/500.php';
    $idea[34]='dangerzone/600.php';
    $idea[35]='dangerzone/700.php';
    $idea[36]='dangerzone/800.php';
    $idea[37]='dangerzone/900.php';
    $idea[38]='dangerzone/1000.php';
    $idea[39]='images/snip.png';
    $idea[40]='dsnip.php';
    $idea[41]='usnip.php';
    return $idea;
  }

  function GetRoute($route){
    $routes=RoutesDB();
    $count=count($routes);
    $count--;
    $ans=false;
    for($i=0; $i<=$count; $i++){
      if(strpos($routes[$i],$route)!==false){$ans=$i;}
    }
    return $ans;
  }

  function DrawRouteTo($route){
      $routes=RoutesDB();
      $route=strtolower($route);
      $route=GetRoute($route);
      $path='http://localhost/help/'.$routes[$route];
      if($route==4){$path='http://localhost/help/';}
      return $path;
  }
  function DrawPath($route){
      $routes=RoutesDB();
      $route=strtolower($route);
      $route=GetRoute($route);
      $path=$routes[$route];
      return $path;
  }

  function flyto($route){
    $route='location:'.DrawRouteTo($route);
    header($route);
  }

  function pagehead($title,$style_sheet){
  echo '<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>'.$title.'</title>
      <link href="';
      echo DrawRouteTo('bootstrap.min.css');
      echo '" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="';
      echo DrawRouteTo($style_sheet);
      echo '">
    </head>
    <body>'.PHP_EOL;
}

function pagefoot(){
  echo '<script src="';
  echo DrawRouteTo('jquery.min.css');
  echo '"></script>
  <script src="';
  echo DrawRouteTo('bootstrap.min.js');
  echo '"></script>
  </body>
  </html>';
}

include DrawPath('functions.php');
 ?>
