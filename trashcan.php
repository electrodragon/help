<?php include 'routes.php'; pagehead('Trash Can','mystyle.css'); ?>
<?php session_start(); ?>
<?php
	if($_SESSION['connection']==false && $_SESSION['query1']==false && $_SESSION['query2']==false && $_SESSION['query3']==false && $_SESSION['query4']==false){
        flyto('runner');
    }
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<a class="btn btn-lg" id="welcome" href="<?php echo DrawRouteTo('index'); ?>"><span class="glyphicon glyphicon-home"></span> Welcome <span class="glyphicon glyphicon-home"></span></a>
			<a class="btn btn-lg" id="snippet" href="<?php echo DrawRouteTo('snaps'); ?>"><span class="glyphicon glyphicon-plus"></span> Add Snippet <span class="glyphicon glyphicon-plus"></span></a>
			<a class="btn btn-lg" id="active" href="<?php echo DrawRouteTo('trashcan'); ?>"><span class="glyphicon glyphicon-trash"></span> View Trash <span class="glyphicon glyphicon-trash"></span></a>
		</div>
	</div>
	<hr>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<a class="btn btn-xs" id="tabledropperbtn" href="<?php echo DrawRouteTo('tbdropper.php'); ?>"><span class="glyphicon glyphicon-cog"></span> Table Dropper <span class="glyphicon glyphicon-cog"></span></a>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
<?php
	$con=connection();
	$idea=idea();
	$query=mysqli_query($con,"SELECT * from `trashed` ORDER BY `sites`");
	$ultrarows=mysqli_num_rows($query);
	if($ultrarows!=0){
		echo '<table class="table table-bordered table-hover">';
		showheadings(null);
		$number=1;
		while($test=mysqli_fetch_array($query)){
			for($i=0; $i<=11; $i++){
				$data[$i]=$test[$idea[$i]];
			}
			echo '<tr>';
			for($i=0; $i<=11; $i++){
					if($i==0){
						echo '<td id="gintibox"><span id="ginti">'.$number.'</span></td>';
						echo '<td id="sitebox">';
						echo '<a href="';
						echo DrawRouteTo('restore');
						echo '?id='.$data[$i];
						echo '">';
						echo '<span id="restoregly" class="glyphicon glyphicon-plus"></span></a> ';
						echo '<span id="sitetext">';
						echo $data[1];
						echo '</span>';
						echo '<a href="';
						echo DrawRouteTo('delete');
						echo '?id='.$data[$i];
						echo '">';
						echo '<span id="mvtotrashgly" class="glyphicon glyphicon-trash"></span></a>';
						echo '</td>';
						}
					else{
							if($i>1){
							$boxids=boxids();
							$txtids=txtids();
							echo '<td id="'.$boxids[$i].'"><span id="'.$txtids[$i].'">'.$data[$i].'</span></td>';
							}
					}
			}
			echo '</tr>';
			$number++;
		}// END WHILE LOOP
		echo '</table>';
	}else{
		echo '<div id="notrashfound">';
		echo '<img id="notrashfoundimage" src="'.DrawRouteTo('trashbin').'" alt="Trash is Empty !">';
		echo '<h2>NOTHING IN TRASH !</h2>';
		echo '</div>';
	}


?>
		</div>
	</div>
</div>

<?php
// Writing Data IN Local Files
// WRITING IN INSERTION
$idea=idea();
$filename=DrawPath('helpdeskdb');
$myfile = fopen($filename, "w");

$txt="/*".whattime()."*/".PHP_EOL;
fwrite($myfile, $txt);

$txt='  $con=mysqli_connect("localhost","root","","ghona");'.PHP_EOL;
fwrite($myfile, $txt);

$query=mysqli_query($con,"SELECT * from `helpdesk` ORDER BY `sites`");
while($test=mysqli_fetch_array($query)){
    for($i=0; $i<=11; $i++){
      $d[$i]=$test[$idea[$i]];
    }
    $txt=PHP_EOL;
    fwrite($myfile, $txt);
    $txt='$query=mysqli_query($con,"INSERT INTO `helpdesk`(`sites`, `usernames`, `email`, `pass`, `domain`, `customerno`, `firstname`, `lastname`, `phoneno`, `dob`, `gen`) VALUES (';
    fwrite($myfile, $txt);
    $txt="'$d[1]','$d[2]','$d[3]','$d[4]','$d[5]','$d[6]','$d[7]','$d[8]','$d[9]','$d[10]','$d[11]'";
    fwrite($myfile, $txt);
    $txt=')");';
    fwrite($myfile, $txt);
    $txt=PHP_EOL;
    fwrite($myfile, $txt);
    $txt='if($query){echo "Inserted !";}else{echo "Failed !";}';
    fwrite($myfile, $txt);
}
fclose($myfile);

// Writing Data IN Local Files
// WRITING IN INSERTION
$idea=idea();
$filename=DrawPath('trashed');
$myfile = fopen($filename, "w");

$txt="/*".whattime()."*/".PHP_EOL;
fwrite($myfile, $txt);

$txt='  $con=mysqli_connect("localhost","root","","ghona");'.PHP_EOL;
fwrite($myfile, $txt);

$query=mysqli_query($con,"SELECT * from `trashed` ORDER BY `sites`");
while($test=mysqli_fetch_array($query)){
    for($i=0; $i<=11; $i++){
      $d[$i]=$test[$idea[$i]];
    }
    $txt=PHP_EOL;
    fwrite($myfile, $txt);
    $txt='$query=mysqli_query($con,"INSERT INTO `trashed`(`sites`, `usernames`, `email`, `pass`, `domain`, `customerno`, `firstname`, `lastname`, `phoneno`, `dob`, `gen`) VALUES (';
    fwrite($myfile, $txt);
    $txt="'$d[1]','$d[2]','$d[3]','$d[4]','$d[5]','$d[6]','$d[7]','$d[8]','$d[9]','$d[10]','$d[11]'";
    fwrite($myfile, $txt);
    $txt=')");';
    fwrite($myfile, $txt);
    $txt=PHP_EOL;
    fwrite($myfile, $txt);
    $txt='if($query){echo "Inserted !";}else{echo "Failed !";}';
    fwrite($myfile, $txt);
}
fclose($myfile);
?>

<?php pagefoot(); ?>
