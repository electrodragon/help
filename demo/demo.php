<?php include '../routes.php'; pagehead('Help - Welcome','mystyle.css'); ?>
<?php session_start(); ?>
<?php
	if($_SESSION['connection']==false && $_SESSION['query1']==false && $_SESSION['query2']==false && $_SESSION['query3']==false){
        flyto('runner');
    }
?>
<?php

	/* /////////// //////////////////*/
	// Do this For Just 6 VALUES
	// Insert Data into Snaps.txt
	// Keep path and password Fields Preserved
	for($i=1; $i<=6; $i++){
		$myfilepath[$i]="../snippets/snap".$i.".txt";
		$myfilepointer=fopen($myfilepath[$i],"w");
		$txt[1]="Hello World !<br>".PHP_EOL."=> I am a Simple Snippet.";
		$txt[2]="Are We Best?<br>".PHP_EOL."=> We are best !";
		$txt[3]="What can we do?<br>".PHP_EOL."=> We can save as much text as you want.";
		$txt[4]="What Hot?<br>".PHP_EOL."=> We are powerful, We save Locally !";
		$txt[5]="Are We Fast?<br>".PHP_EOL."=> We are Fastest !";
		$txt[6]="Maximum Range?<br>".PHP_EOL."=> We are Just 50 !";
		fwrite($myfilepointer,$txt[$i]);
		fclose($myfilepointer);
		$abc=array('A','B','C','D','a','z','k','m');
		$pass1[$i]=rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5).rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5);
		$pass2[$i]=rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5).rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5);
		$pass3[$i]=rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5).rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5);
		$pass4[$i]=rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5).rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5);
		$pass5[$i]=rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5).rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5);
		$pass6[$i]=rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5).rand(2,5).$abc[rand(0,7)].$abc[rand(0,7)].rand(2,5);
		$myfilepath[$i]="snippets/snap".$i.".txt";
	}
	// Insert Preserved Passwords and Their File Path in `snaps`;
	$query[1]="INSERT INTO `snaps`(`snippet`, `pass1`, `pass2`, `pass3`, `pass4`, `pass5`, `pass6`) VALUES ('$myfilepath[1]','$pass1[1]','$pass1[2]','$pass1[3]','$pass1[4]','$pass1[5]','$pass1[6]')";
	$query[2]="INSERT INTO `snaps`(`snippet`, `pass1`, `pass2`, `pass3`, `pass4`, `pass5`, `pass6`) VALUES ('$myfilepath[2]','$pass2[1]','$pass2[2]','$pass2[3]','$pass2[4]','$pass2[5]','$pass2[6]')";
	$query[3]="INSERT INTO `snaps`(`snippet`, `pass1`, `pass2`, `pass3`, `pass4`, `pass5`, `pass6`) VALUES ('$myfilepath[3]','$pass3[1]','$pass3[2]','$pass3[3]','$pass3[4]','$pass3[5]','$pass3[6]')";
	$query[4]="INSERT INTO `snaps`(`snippet`, `pass1`, `pass2`, `pass3`, `pass4`, `pass5`, `pass6`) VALUES ('$myfilepath[4]','$pass4[1]','$pass4[2]','$pass4[3]','$pass4[4]','$pass4[5]','$pass4[6]')";
	$query[5]="INSERT INTO `snaps`(`snippet`, `pass1`, `pass2`, `pass3`, `pass4`, `pass5`, `pass6`) VALUES ('$myfilepath[5]','$pass5[1]','$pass5[2]','$pass5[3]','$pass5[4]','$pass5[5]','$pass5[6]')";
	$query[6]="INSERT INTO `snaps`(`snippet`, `pass1`, `pass2`, `pass3`, `pass4`, `pass5`, `pass6`) VALUES ('$myfilepath[6]','$pass6[1]','$pass6[2]','$pass6[3]','$pass6[4]','$pass6[5]','$pass6[6]')";

	$con=mysqli_connect("localhost","root","","ghona");
		for($i=1; $i<=6; $i++){
			mysqli_query($con,$query[$i]);
		}
	/* /////////////////////////// */
	// Getting Connection
	$con=connection();
	// For Empty DataBase
	$rows=Count_Database_Rows($con,'helpdesk');
	if($rows==0){
		$demo=$_REQUEST['demo'];
		 	if($demo=='myhelpandtrashdemo'){
		 		$abc=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','a','b','c','d');
		 		$emaccounts=array('gmail.com','yahoo.com','hotmail.com','protonmail.com');
		 		$accounts=array('reddit.com','facebook.com','godaddy.com','udemy.com');
		 		$singleacc=array('twitter.com','instagram.com','imgur.com','amazon.com','aol.com');
		 		$webend=array('.com','.net','.io','.biz');
		 		$date=array(13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28);
		 		$month=array('Jan','Feb','Mar','Apr','May','jun','Jul','Aug','Sep','Oct','Nov','Dec');
		 		$pcodes=array('+1','+92','+91','+62','+96');
		 		$gender=array('Male',"Female");
		 		// HELP DESK DEMO
		 		for($i=0; $i<=25; $i++){
		 			for($n=0; $n<=3; $n++){
		 			$site=$accounts[rand(0,3)];
		 			$firstname=ucfirst($abc[rand(0,25)]).$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$lastname=ucfirst($abc[rand(0,25)]).$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$username=$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$email=strtolower($firstname)."_".$username."@".$emaccounts[rand(0,3)];
		 			$password=strrev($username).$username.$date[rand(0,15)].strrev($month[rand(0,11)]);
		 			$customerno=$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)]." simple Note";
		 			$phoneno=$pcodes[rand(0,4)]." ".$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)];
		 			$domain="www.".$firstname.$lastname.$webend[rand(0,3)];
		 			$domain=strtolower($domain);
		 			$dob=$date[rand(0,15)].'-'.$month[rand(0,11)].'-'.rand(1947,2019);
		 			$gen=$gender[rand(0,1)];
		 			if($site!=$accounts[2]){$domain="Any Note";}
		 			$allvalues=array($site,$username,$email,$password,$domain,$customerno,$firstname,$lastname,$phoneno,$dob,$gen);
		 			insertintotable($con,'helpdesk',$allvalues);
		 			}
		 		}
		 		for($i=0; $i<=4; $i++){
		 			$site=$singleacc[$i];
		 			$firstname=ucfirst($abc[rand(0,25)]).$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$lastname=ucfirst($abc[rand(0,25)]).$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$username=$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$email=strtolower($firstname)."_".$username."@".$emaccounts[rand(0,3)];
		 			$password=strrev($username).$username.$date[rand(0,15)].strrev($month[rand(0,11)]);
		 			$customerno=$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)]." simple Note";
		 			$phoneno=$pcodes[rand(0,4)]." ".$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)];
		 			$domain="www.".$firstname.$lastname.$webend[rand(0,3)];
		 			$domain=strtolower($domain);
		 			$dob=$date[rand(0,15)].'-'.$month[rand(0,11)].'-'.rand(1947,2019);
		 			$gen=$gender[rand(0,1)];
		 			if($site!=$accounts[2]){$domain="Any Note";}
		 			$allvalues=array($site,$username,$email,$password,$domain,$customerno,$firstname,$lastname,$phoneno,$dob,$gen);
		 			insertintotable($con,'helpdesk',$allvalues);
		 		}
		 		// Trash DEMO
		 		for($i=0; $i<=25; $i++){
		 			$site=$accounts[rand(0,3)];
		 			$firstname=ucfirst($abc[rand(0,25)]).$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$lastname=ucfirst($abc[rand(0,25)]).$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$username=$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$email=strtolower($firstname)."_".$username."@".$emaccounts[rand(0,3)];
		 			$password=strrev($username).$username.$date[rand(0,15)].strrev($month[rand(0,11)]);
		 			$customerno=$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)]." simple Note";
		 			$phoneno=$pcodes[rand(0,4)]." ".$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)];
		 			$domain="www.".$firstname.$lastname.$webend[rand(0,3)];
		 			$domain=strtolower($domain);
		 			$dob=$date[rand(0,15)].'-'.$month[rand(0,11)].'-'.rand(1947,2019);
		 			$gen=$gender[rand(0,1)];
		 			if($site!=$accounts[2]){$domain="Any Note";}
		 			$allvalues=array($site,$username,$email,$password,$domain,$customerno,$firstname,$lastname,$phoneno,$dob,$gen);
		 			insertintotable($con,'trashed',$allvalues);
		 		}
		 		for($i=0; $i<=4; $i++){
		 			$site=$singleacc[$i];
		 			$firstname=ucfirst($abc[rand(0,25)]).$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$lastname=ucfirst($abc[rand(0,25)]).$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$username=$abc[rand(0,25)].$abc[rand(0,25)].$abc[rand(0,25)];
		 			$email=strtolower($firstname)."_".$username."@".$emaccounts[rand(0,3)];
		 			$password=strrev($username).$username.$date[rand(0,15)].strrev($month[rand(0,11)]);
		 			$customerno=$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)]." simple Note";
		 			$phoneno=$pcodes[rand(0,4)]." ".$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)].$date[rand(0,15)];
		 			$domain="www.".$firstname.$lastname.$webend[rand(0,3)];
		 			$domain=strtolower($domain);
		 			$dob=$date[rand(0,15)].'-'.$month[rand(0,11)].'-'.rand(1947,2019);
		 			$gen=$gender[rand(0,1)];
		 			if($site!=$accounts[2]){$domain="Any Note";}
		 			$allvalues=array($site,$username,$email,$password,$domain,$customerno,$firstname,$lastname,$phoneno,$dob,$gen);
		 			insertintotable($con,'trashed',$allvalues);
		 		}
		 	}else{flyto('index');}
		}else{flyto('index');}
	flyto('index');
?>

<?php pagefoot(); ?>
