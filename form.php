  <form class="form-group" method="post">
    <div class="row">
      <div class="col-sm-12 form-group">
        <input type="text" class="form-control" placeholder="Site" name="sites" value="" required>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3 form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" value="">
      </div>
      <div class="col-sm-3 form-group">
        <input type="email" class="form-control" placeholder="Email" name="email" value="">
      </div>
      <div class="col-sm-2 form-group">
        <input type="text" class="form-control" placeholder="Password" name="pass" value="">
      </div>
      <div class="col-sm-2 form-group">
        <input type="domain" class="form-control" placeholder="Domain / Note" name="domain" value="">
      </div>
      <div class="col-sm-2 form-group">
        <input type="text" class="form-control" placeholder="Customer No / Note" name="cno" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3 form-group">
        <input type="text" class="form-control" placeholder="First Name" name="fn" value="">
      </div>
      <div class="col-sm-3 form-group">
        <input type="text" class="form-control" placeholder="Last Name" name="ln" value="">
      </div>
      <div class="col-sm-2 form-group">
        <input type="text" class="form-control" placeholder="Phone No" name="phone" value="">
      </div>
      <div class="col-sm-2 form-group">
        <input type="text" class="form-control" placeholder="Date of Birth" name="dob" value="">
      </div>
      <div class="col-sm-2 form-group">
        <input type="text" class="form-control" placeholder="Gender" name="gender" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 form-group">
        <input type="submit" class="btn btn-primary btn-md form-control" name="submitbtn" Value="Submit">
      </div>
    </div>
  </form>
<?php
  if(isset($_POST['submitbtn'])){
    $a[0]=correct($_POST['sites']);
    $a[1]=$_POST['username'];
    $a[2]=$_POST['email'];
    $a[3]=$_POST['pass'];
    $a[4]=$_POST['domain'];
    $a[5]=$_POST['cno'];
    $a[6]=$_POST['fn'];
    $a[7]=$_POST['ln'];
    $a[8]=$_POST['phone'];
    $a[9]=$_POST['dob'];
    $a[10]=$_POST['gender'];

    $filepath=DrawPath('history');
    $myfilepointer=fopen($filepath,"a");

    $txt=histtime().PHP_EOL."New Added !".PHP_EOL;
    fwrite($myfilepointer,$txt);
    $txt='STAT        |     New'.PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='++++++++++++++++++++++++++++++++++++++++++++++++++++++++'.PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='SITE        | '.$a[0].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='USERNAME    | '.$a[1].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='EMAIL       | '.$a[2].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='PASSWORD    | '.$a[3].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='DOMAIN/NOTE | '.$a[4].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='CNO/NOTE    | '.$a[5].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='FIRST_NAME  | '.$a[6].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='LAST_NAME   | '.$a[7].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='PHONE_NO    | '.$a[8].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='D_O_B       | '.$a[9].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='GENDER      | '.$a[10].PHP_EOL;fwrite($myfilepointer,$txt);
    $txt='++++++++++++++++++++++++++++++++++++++++++++++++++++++++'.PHP_EOL.PHP_EOL.PHP_EOL;fwrite($myfilepointer,$txt);
    fclose($myfilepointer);

    $counterofform=0;
    for($i=0; $i<=10; $i++){if(!empty($a[$i])){$counterofform++;}}
    if($counterofform!=0){
      $con=connection();
      insertintotable($con,'helpdesk',$a);
      flyto('index');
    }
  }
?>
