<?php include 'routes.php'; pagehead('Snippets','mystyle.css'); ?>
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
			<a class="btn btn-lg" id="active" href="<?php echo DrawRouteTo('snaps'); ?>"><span class="glyphicon glyphicon-plus"></span> Add Snippet <span class="glyphicon glyphicon-plus"></span></a>
			<a class="btn btn-lg" id="trashcan" href="<?php echo DrawRouteTo('trashcan'); ?>"><span class="glyphicon glyphicon-trash"></span> View Trash <span class="glyphicon glyphicon-trash"></span></a>
		</div>
	</div>
	<hr>
</div>

<div class="container">
	<form method="post" class="form-group">
		<div class="row">
			<div class="col-sm-12 form-group">
			<textarea name="snap" rows="5" class="form-control" placeholder="Some Text Here" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2 form-group">
				<input type="text" class="form-control" name="password1" value="" placeholder="Password 1">
			</div>
			<div class="col-sm-2 form-group">
				<input type="text" class="form-control" name="password2" value="" placeholder="Password 2">
			</div>
			<div class="col-sm-2 form-group">
				<input type="text" class="form-control" name="password3" value="" placeholder="Password 3">
			</div>
			<div class="col-sm-2 form-group">
				<input type="text" class="form-control" name="password4" value="" placeholder="Password 4">
			</div>
			<div class="col-sm-2 form-group">
				<input type="text" class="form-control" name="password5" value="" placeholder="Password 5">
			</div>
			<div class="col-sm-2 form-group">
				<input type="text" class="form-control" name="password6" value="" placeholder="Password 6">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 form-group">
				<input type="submit" class="btn btn-md btn-primary form-control" name="snapaddr" value="Add Snap">
			</div>
		</div>

	</form>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">

		</div>
	</div>
</div>

<!-- Submission Process -->
<?php
	if(isset($_POST['snapaddr'])){
		/* BLOCK OF CODE START  */
		$text=$_POST['snap'];
		$text=str_replace(PHP_EOL,"<br>".PHP_EOL,$text);
		$password[1]=$_POST['password1'];
		$password[2]=$_POST['password2'];
		$password[3]=$_POST['password3'];
		$password[4]=$_POST['password4'];
		$password[5]=$_POST['password5'];
		$password[6]=$_POST['password6'];
		// NOW I HAVE ALL VALUES

		// NOW I AM CHECKING SNAPS TXT FILES TO FIGUREOUT WHICH ONE IS EMPTY
		$validpath=null;
		for($i=1; $i<=50; $i++){
			 $filepath='snippets/snap'.$i.'.txt';
			 if(filesize($filepath)==0){$validpath=$filepath; break;}
		}

		// Now I am ADDING DATA IN VALID FILE
		if($validpath!==null){
			if(empty($text)){
				echo 'Text Field Must Be Filled';
			}else{
			$filepointer=fopen($validpath,"w");
			fwrite($filepointer,$text);
			fclose($filepointer);
			$con=connection();
			mysqli_query($con,"INSERT INTO `snaps`(`snippet`, `pass1`, `pass2`, `pass3`, `pass4`, `pass5`, `pass6`) VALUES ('$validpath','$password[1]','$password[2]','$password[3]','$password[4]','$password[5]','$password[6]')");
			// Writing IN HISTORY
			$filepath=DrawPath('history');
	    $myfilepointer=fopen($filepath,"a");

	    $txt=histtime().PHP_EOL."New SNAPSHOT ADDED !".PHP_EOL;
	    fwrite($myfilepointer,$txt);
	    $txt='STAT         |     New SNIPPET'.PHP_EOL;fwrite($myfilepointer,$txt);
	    $txt='++++++++++++++++++++++++++++++++++++++++++++++++++++++++'.PHP_EOL;fwrite($myfilepointer,$txt);
			$text=str_replace("<br>".PHP_EOL,PHP_EOL.'               ',$text);
	    $txt='SNIPPET      | '.$text.PHP_EOL;fwrite($myfilepointer,$txt);
	    $txt='PASSWORD 1   | '.$password[1].PHP_EOL;fwrite($myfilepointer,$txt);
	    $txt='PASSWORD 2   | '.$password[2].PHP_EOL;fwrite($myfilepointer,$txt);
	    $txt='PASSWORD 3   | '.$password[3].PHP_EOL;fwrite($myfilepointer,$txt);
	    $txt='PASSWORD 4   | '.$password[4].PHP_EOL;fwrite($myfilepointer,$txt);
	    $txt='PASSWORD 5   | '.$password[5].PHP_EOL;fwrite($myfilepointer,$txt);
	    $txt='PASSWORD 6   | '.$password[6].PHP_EOL;fwrite($myfilepointer,$txt);
	    $txt='++++++++++++++++++++++++++++++++++++++++++++++++++++++++'.PHP_EOL.PHP_EOL.PHP_EOL;fwrite($myfilepointer,$txt);
	    fclose($myfilepointer);
			// Wroted
			flyto('snaps.php');
			}
		}else{
			echo "All 50 Slots are Full !";
		}
		/* BLOCK OF CODE END  */
	}
 ?>
<!-- /Submission Process -->

<!-- Snippets Showing Process -->
<div class="container">
<?php
	// SHOWING IMAGE IF NO SNIPPET FOUND
	$con=connection();
	$query=mysqli_query($con,"SELECT * from `snaps`");
	$rows=mysqli_num_rows($query);
	if($rows==0){
		echo '<div id="nosnippetfound">';
		echo '<img id="nosnippetsimage" class="img" src="'.DrawRouteTo('snippets.png').'" alt="SNIPPETS">';
		echo '<h2>No SNIPPETS FOUND !</h2>';
		echo '</div>';
	}else{
			// Fetching Data From DataBase And Showing Results
			$snipnum=1;
			while($test=mysqli_fetch_array($query)){
				for($i=1; $i<=6; $i++){
					$pass='pass'.$i;
					$password[$i]=$test[$pass];
				}
				$snip=$test['snippet'];
				echo '<div class="row jumbotron">';
				echo '<div class="col-sm-12">';
				echo '<div class="jumbotron">';
				echo '<div class="col-sm-3">';
				echo '<div id="snippng">';
				echo '<a href="'.DrawRouteTo('usnip.php').'?snip='.$snip.'"><img src="'.DrawRouteTo('snip.png').'" alt="snip"></a>';
				echo $snipnum;$snipnum++;
				echo '</div>';
				echo '</div>';
				echo '<div class="col-sm-6">';
				$filepointer=fopen($snip,"r");
				echo fread($filepointer,filesize($snip));
				echo '</div>';
				echo '<div class="col-sm-3 text-center">';
				echo '<a class="" href="'.DrawRouteTo('dsnip.php').'?snip='.$snip.'"><span class="glyphicon glyphicon-trash"></span></a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				$empty=0;
				for($i=1; $i<=6; $i++){if(empty($password[$i])){$empty++;}}
				if($empty==6){
					echo '<div class="col-sm-12">';
					echo '<hr>';
					echo '</div>';
				}
				if($empty!=6){
				echo '<div class="col-sm-12">';
				echo '<table id="snippettable" class="table table-hover">';
				echo '<tr>';
				for($i=1; $i<=6; $i++){
					echo '<td id="passwordbox"><span id="passwordtext">'.$password[$i].'</span></td>';
				}
				echo '</tr>';
				echo '</table>';
				echo '</div>';
				}
				echo '</div>';
			}
	}


 ?>
</div> <!-- End OF COntainer -->
<!-- /Snippets Showing Process -->


<?php pagefoot(); ?>
