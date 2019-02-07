<?php include '../routes.php'; pagehead('Help - Dropper','mystyle.css'); ?>
<?php session_start(); ?>
<?php
	if($_SESSION['connection']==false){
        flyto('runner');
    }
$con=connection();
function Drop_DataBase($con){
	$query1=mysqli_query($con,"SELECT * from `helpdesk`");
	$query2=mysqli_query($con,"SELECT * from `helper`");
	$query3=mysqli_query($con,"SELECT * from `trashed`");
	$query4=mysqli_query($con,"SELECT * from `snaps`");
	if(!$query1 && !$query2 && !$query3 && !$query4){return true;}else{return false;}
}
if(Drop_DataBase($con)){
	for($i=1; $i<=5; $i++){
		mysqli_query($con,"DROP DATABASE ghona");
	}
	flyto('index');
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
<!-- Correct -->
<div class="container">
	<div class="row text-center">
		<div class="col-sm-4">

		</div>
		<div class="col-sm-4">
			<?php if(isset($_SESSION['message'])){
				if(strpos($_SESSION['message'],'ALREADY')){
					echo '<div id="imessage" class="alert alert-info" role="alert">
					  '.$_SESSION['message'].'
					</div>';
				}else{
					echo '<div id="smessage" class="alert alert-success" role="alert">
					  '.$_SESSION['message'].'
					</div>';
				}
				$_SESSION['message']=null;
			} ?>
		</div>
		<div class="col-sm-4">

		</div>
	</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div id="droptablestext">
        <h2>DROP TABLES:</h2>
        <p class="text-info">Dropping One Requires Dropping ALL - if all dropped they will be created automatically</p>
      </div>
    </div>
    <div class="col-sm-2">
      <div id="droptablesform">
        <?php
          $query1=mysqli_query($con,"SELECT * from `helpdesk`");
          if($query1){
						echo '<div class="form-group"><a href="'.DrawRouteTo('100.php').'" class="btn btn-xs btn-danger">Drop `helpdesk`</a></div>';
          }
          $query2=mysqli_query($con,"SELECT * from `helper`");
          if($query2){
						echo '<div class="form-group">';echo '<a href="'.DrawRouteTo('200.php').'" class="btn btn-xs btn-danger">Drop `helper`</a>';echo '</div>';
          }
          $query3=mysqli_query($con,"SELECT * from `trashed`");
          if($query3){
						echo '<div class="form-group">';echo '<a href="'.DrawRouteTo('300.php').'" class="btn btn-xs btn-danger">Drop `trashed`</a>';echo '</div>';
        	}
					$query4=mysqli_query($con,"SELECT * from `snaps`");
          if($query4){
						echo '<div class="form-group">';echo '<a href="'.DrawRouteTo('400.php').'" class="btn btn-xs btn-danger">Drop `snaps`</a>';echo '</div>';
        	}
        ?>
      </div>
      </div>
    </div> <!-- ROW END HERE -->
		<hr>
</div>
<!-- Correct -->
<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div id="cleantablestext">
					<h2>Clean Tables:</h2>
				</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group">
						<div class="form-group">
							<?php echo '<a href="'.DrawRouteTo('500.php').'" class="btn btn-xs btn-danger">Clean `helpdesk`</a>'; ?>
						</div>
						<div class="form-group">
							<?php echo '<a href="'.DrawRouteTo('600.php').'" class="btn btn-xs btn-danger">clean `helper`</a>'; ?>
						</div>
						<div class="form-group">
							<?php echo '<a href="'.DrawRouteTo('700.php').'" class="btn btn-xs btn-danger">Clean `trashed`</a>'; ?>
						</div>
						<div class="form-group">
							<?php echo '<a href="'.DrawRouteTo('800.php').'" class="btn btn-xs btn-danger">Clean `Snaps`</a>'; ?>
						</div>
					</div>
			</div>
		</div> <!-- Row END HERE -->
		<hr>
</div>
<!-- Correct -->
<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div id="cleanhistoryandjunktext">
					<h2>Clean History / Junk</h2>
				</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group">
						<div class="form-group">
							<?php echo '<a href="'.DrawRouteTo('900.php').'" class="btn btn-xs btn-danger">Clean `History`</a>'; ?>
						</div>
						<div class="form-group">
							<?php echo '<a href="'.DrawRouteTo('1000.php').'" class="btn btn-xs btn-danger">Clean `Junk`</a>'; ?>
						</div>
					</div>
			</div>
		</div> <!-- Row END HERE -->
		<hr>
</div>

<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="localstoredfilestext">
					<h2>Local Stored Files</h2>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<div class="form-group">
						<div class="form-inline">
							<div class="form-group">
								<a class="btn btn-xs" id="welcome" href="<?php echo DrawRouteTo('helpdeskdb'); ?>">See Helpdesk</a>
							</div>
							<div class="form-group">
								<a class="btn btn-xs" id="welcome" href="<?php echo DrawRouteTo('history'); ?>">See History</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-inline">
							<div class="form-group">
								<a class="btn btn-xs" id="welcome" href="<?php echo DrawRouteTo('junk'); ?>">See Junk</a>
							</div>
							<div class="form-group">
								<a class="btn btn-xs" id="welcome" href="<?php echo DrawRouteTo('trashed'); ?>">See Trash Local</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- Row END HERE -->
		<hr>
  </div> <!-- END CONTAINER -->

<?php pagefoot(); ?>
