<?php include 'routes.php'; pagehead('Help - Welcome','mystyle.css'); ?>
<?php session_start(); ?>
<?php
	if($_SESSION['connection']==false && $_SESSION['query1']==false && $_SESSION['query2']==false && $_SESSION['query3']==false && $_SESSION['query4']==false){
        flyto('runner');
    }
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<a class="btn btn-lg" id="active" href="<?php echo DrawRouteTo('index'); ?>"><span class="glyphicon glyphicon-home"></span> Welcome <span class="glyphicon glyphicon-home"></span></a>
			<a class="btn btn-lg" id="snippet" href="<?php echo DrawRouteTo('snaps'); ?>"><span class="glyphicon glyphicon-plus"></span> Add Snippet <span class="glyphicon glyphicon-plus"></span></a>
			<a class="btn btn-lg" id="trashcan" href="<?php echo DrawRouteTo('trashcan'); ?>"><span class="glyphicon glyphicon-trash"></span> View Trash <span class="glyphicon glyphicon-trash"></span></a>
		</div>
	</div>
	<hr>
</div>

<div class="container">
			<?php include DrawPath('form.php'); ?>
			<hr id="lasthrofsubmitform">
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
<?php
	// Getting Connection
	$con=connection();
	// For Empty DataBase
	$rows=Count_Database_Rows($con,'helpdesk');
	if($rows!=0){$time=whattime();echo $time;}
	if($rows==0){
		echo '<div id="norecordfoundinhelpdesk">';
		echo '<img id="norecordfoundinhelpdeskimage" src="'.DrawRouteTo('norecord').'" alt="No Record Found !">';
		$time=whattime();
		echo '<p>'.$time.'</p>';
		echo '</div>';
	}
	if($rows==0){echo '<a id="demobtn" class="btn form-control" href="'.DrawRouteTo('demo.php').'?demo=myhelpandtrashdemo"><span class="glyphicon glyphicon-cog"></span> Import Demo</a>';}
?>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 text-center">
<?php
if($rows==0){}else{
	$idea=idea();
	$number=1;
	$datahelpdesk=Fetch_All_helpdesk_data($con);
	FetchDeskSetHelper($con);
	// show Tables where Site equal to site in Helper
	$helperdata=Fetch_All_helper_data($con);
	$count=count($helperdata);
	$count--;
	$helperquery=mysqli_query($con,"SELECT * from `helper`");
	$helperqueryrows=mysqli_num_rows($helperquery);
	if($helperqueryrows>0){
		for($i=0; $i<count($helperdata); $i++){
			for($j=1; $j<=1; $j++){$site=$helperdata[$i][$j];}
				$query=mysqli_query($con,"SELECT * from `helpdesk` where `sites`='$site'");
				echo '<table class="table table-bordered table-hover">';
				if($i!=$count){showheadings($site);}
				while($selection=mysqli_fetch_array($query)){
					echo '<tr id="tablerows">';
					for($j=0; $j<=11; $j++){
						$uroute=DrawRouteTo('update');
						$droute=DrawRouteTo('mvtotrash');
						sendvaluestoPPMult($j,$selection,$number,$uroute,$droute);
					}
					echo '</tr>';
					$number++;
				}
				echo '</table>';
		}
	}

	// Show Table Where site Not Equal to site in helper
	$query=mysqli_query($con,"SELECT * from `helpdesk` ORDER BY `sites`");
	echo '<table class="table table-bordered table-hover">';
	showheadings(null);
	while($test=mysqli_fetch_array($query)){
		for($i=0; $i<=11; $i++){
			$datahelpdesk[$i]=$test[$idea[$i]];
		}
		$query2=mysqli_query($con,"SELECT * from `helper` WHERE `sites`='$datahelpdesk[1]'");
		$rows2=mysqli_num_rows($query2);

		if($rows2<1){
			echo '<tr id="tablerows">';

				for($j=0; $j<=11; $j++){
					if($j==0){
						echo '<td id="gintibox"><span id="ginti">'.$number.'</span></td>';
						echo '<td id="sitebox">';
						echo '<a href="';
						echo DrawRouteTo('update');
						echo '?id='.$datahelpdesk[$j];
						echo '">';
						echo '<span id="updatepencilgly" class="glyphicon glyphicon-pencil"></span></a> ';
						echo '<span id="sitetext">';
						echo $datahelpdesk[1];
						echo '</span>';
						echo '<a href="';
						echo DrawRouteTo('mvtotrash');
						echo '?id='.$datahelpdesk[$j];
						echo '">';
						echo '<span id="mvtotrashgly" class="glyphicon glyphicon-trash"></span></a>';
						echo '</td>';
					}
					if($j>1){
						$boxids=boxids();
						$txtids=txtids();
						echo '<td id="'.$boxids[$j].'"><span id="'.$txtids[$j].'">'.$datahelpdesk[$j].'</span></td>';
					}
				}

			echo '</tr>';
			$number++;
		}
	}
	echo '</table>';

	echo '<sup>_________________</sup><span id="totalcardinals">  Total Cardinals: '.Count_Database_Rows($con,'helpdesk').'</span>  <sup>_________________</sup>';


}// END OF ELSE
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
