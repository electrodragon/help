<?php include 'routes.php'; pagehead('Help - Welcome','mystyle.css'); ?>
<?php session_start(); ?>
<?php
	if($_SESSION['connection']==false && $_SESSION['query1']==false && $_SESSION['query2']==false && $_SESSION['query3']==false){
        flyto('runner');
    }
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<a class="btn btn-lg" id="welcome" href="<?php echo DrawRouteTo('index'); ?>"><span class="glyphicon glyphicon-home"></span> Welcome <span class="glyphicon glyphicon-home"></span></a>
			<a class="btn btn-lg" id="snippet" href="<?php echo DrawRouteTo('snaps'); ?>"><span class="glyphicon glyphicon-plus"></span> Add Snippet <span class="glyphicon glyphicon-plus"></span></a>
			<a class="btn btn-lg" id="trashcan" href="<?php echo DrawRouteTo('trashcan'); ?>"><span class="glyphicon glyphicon-trash"></span> View Trash <span class="glyphicon glyphicon-trash"></span></a>
		</div>
	</div>
	<hr>
</div>

<?php
  $id=$_REQUEST['id'];
  $con=connection();
  $query=mysqli_query($con,"SELECT * from `helpdesk` WHERE `id`='$id'");
  $test=mysqli_fetch_array($query);
  $idea=idea();
  for($i=0; $i<=11; $i++){$d[$i]=$test[$idea[$i]];}
?>

<div class="container">
	<form class="form-group" method="post">
	  <div class="row">
	    <div class="col-sm-12 form-group">
	      <input class="form-control" type="text" placeholder="Site" name="sites" value="<?php echo $d[1] ?>" required>
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-sm-3 form-group">
	      <input class="form-control" type="text" placeholder="Username" name="username" value="<?php echo $d[2] ?>">
	    </div>
	    <div class="col-sm-3 form-group">
	      <input class="form-control" type="email" placeholder="email" name="email" value="<?php echo $d[3] ?>">
	    </div>
	    <div class="col-sm-2 form-group">
				<input class="form-control" type="text" placeholder="password" name="pass" value="<?php echo $d[4] ?>">
	    </div>
	    <div class="col-sm-2 form-group">
				<input class="form-control" type="domain" placeholder="Domain / Note" name="domain" value="<?php echo $d[5] ?>">
	    </div>
	    <div class="col-sm-2 form-group">
				<input class="form-control" type="text" placeholder="customer no / Note" name="cno" value="<?php echo $d[6] ?>">
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-sm-3 form-group">
				<input class="form-control" type="text" placeholder="First Name" name="fn" value="<?php echo $d[7] ?>">
	    </div>
	    <div class="col-sm-3 form-group">
				<input class="form-control" type="text" placeholder="Last Name" name="ln" value="<?php echo $d[8] ?>">
	    </div>
	    <div class="col-sm-2 form-group">
				<input class="form-control" type="text" placeholder="Phone No" name="phone" value="<?php echo $d[9] ?>">
	    </div>
	    <div class="col-sm-2 form-group">
				<input class="form-control" type="text" placeholder="DOB" name="dob" value="<?php echo $d[10] ?>">
	    </div>
	    <div class="col-sm-2 form-group">
				<input class="form-control" type="text" placeholder="Gender" name="gender" value="<?php echo $d[11] ?>">
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-sm-12 form-group">
	      <input type="submit" class="btn btn-primary btn-md form-control" name="updatebtn" Value="Update">
	    </div>
	  </div>
	</form>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<a class="btn btn-lg" id="welcome" href="<?php echo DrawRouteTo('index'); ?>"><span class="glyphicon glyphicon-home"></span> Back <span class="glyphicon glyphicon-home"></span></a>
		</div>
	</div>
</div>

<?php
if(isset($_POST['updatebtn'])){
  $a[0]=$_POST['sites'];
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
	$asterisk='';
  $txt=histtime().PHP_EOL."Updated !".PHP_EOL;
  fwrite($myfilepointer,$txt);
  $txt='STAT        |     OLD   |   New'.PHP_EOL;fwrite($myfilepointer,$txt);
  $txt='~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~'.PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[1]!=$a[0]){$asterisk='** ';}else{$asterisk='';}
  $txt=$asterisk.'SITE        | '.$d[1].'   |   '.$a[0].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[2]!=$a[1]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'USERNAME    | '.$d[2].'   |   '.$a[1].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[3]!=$a[2]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'EMAIL       | '.$d[3].'   |   '.$a[2].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[4]!=$a[3]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'PASSWORD    | '.$d[4].'   |   '.$a[3].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[5]!=$a[4]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'DOMAIN/NOTE | '.$d[5].'   |   '.$a[4].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[6]!=$a[5]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'CNO/NOTE    | '.$d[6].'   |   '.$a[5].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[7]!=$a[6]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'FIRST_NAME  | '.$d[7].'   |   '.$a[6].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[8]!=$a[7]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'LAST_NAME   | '.$d[8].'   |   '.$a[7].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[9]!=$a[8]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'PHONE_NO    | '.$d[9].'   |   '.$a[8].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[10]!=$a[9]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'D_O_B       | '.$d[10].'   |   '.$a[9].PHP_EOL;fwrite($myfilepointer,$txt);
	if($d[11]!=$a[10]){$asterisk='** ';}else{$asterisk='';}
	$txt=$asterisk.'GENDER      | '.$d[11].'   |   '.$a[10].PHP_EOL;fwrite($myfilepointer,$txt);
  $txt='~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~'.PHP_EOL.PHP_EOL.PHP_EOL;fwrite($myfilepointer,$txt);
  fclose($myfilepointer);
  $query=mysqli_query($con,"UPDATE `helpdesk` SET `sites`='$a[0]',`usernames`='$a[1]',`email`='$a[2]',`pass`='$a[3]',`domain`='$a[4]',`customerno`='$a[5]',`firstname`='$a[6]',`lastname`='$a[7]',`phoneno`='$a[8]',`dob`='$a[9]',`gen`='$a[10]' WHERE `id`='$id'");
  if($query){flyto('index');}else{flyto('404');}
}
 ?>

<?php pagefoot(); ?>
