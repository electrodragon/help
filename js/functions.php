<?php
// Function For Database Connection
function connection(){
	$con=mysqli_connect("localhost","root","","ghona");
	return $con;
}
// Function For Site-Name Correction
function correct($strval){
	$strval=strtolower($strval);
  $strval=str_replace("http://","","$strval");
  $strval=str_replace("https://","","$strval");
  $strval=str_replace("www.","","$strval");
  $strval=str_replace("sso.godaddy.com","godaddy.com","$strval");
  $strval=str_replace("old.reddit.com","reddit.com","$strval");
  return $strval;
}
// Function To Get Current Time
function whattime(){
  date_default_timezone_set("Asia/Karachi");
  $time=PHP_EOL.'(Y/M/D) '.date("Y/m/d").' '.date("l").' (H/M/S) '.date("h:i:sa").PHP_EOL;
  return $time;
}
function histtime(){
	date_default_timezone_set("Asia/Karachi");
  $time='(Y/M/D) '.date("Y/m/d").' '.date("l").' (H/M/S) '.date("h:i:sa");
  return $time;
}
// Function IDEA TO GET DATABASE TABLE NAMES
function idea(){
  $idea[0]='id';
  $idea[1]='sites';
  $idea[2]='usernames';
  $idea[3]='email';
  $idea[4]='pass';
  $idea[5]='domain';
  $idea[6]='customerno';
  $idea[7]='firstname';
  $idea[8]='lastname';
  $idea[9]='phoneno';
  $idea[10]='dob';
  $idea[11]='gen';
  return $idea;
}
// Function IDS to GET ids
function boxids(){
  $ids[0]='primaryid';
  $ids[1]='urls';
  $ids[2]='usernamebox';
  $ids[3]='emailbox';
  $ids[4]='passwordbox';
  $ids[5]='domainbox';
  $ids[6]='customernobox';
  $ids[7]='firstnamebox';
  $ids[8]='lastnamebox';
  $ids[9]='phonenobox';
  $ids[10]='dobbox';
  $ids[11]='genderbox';
  return $ids;
}
// FUNCTION TXTIDS TO GET TEXT IDS
function txtids(){
	$ids=array('','','usernametext','emailtext','passwordtext','domaintext','customernotext','firstnametext','lastnametext','phonetext','dobtext','gendertext');
	return $ids;
}
// Function To Get Database Rows Count
function Count_Database_Rows($con,$database){
	$query='SELECT * from '.$database;
	$execute=mysqli_query($con,$query);
	$rows=mysqli_num_rows($execute);
	return $rows;
}
// Function To Insert Data In DataBase
function insertintotable($con,$database,$values){
	$count=count($values);
	$count--;
	$lastcount=$count;
	if($database=='helpdesk'){
		$query="INSERT INTO `$database`(`sites`, `usernames`, `email`, `pass`, `domain`, `customerno`, `firstname`, `lastname`, `phoneno`, `dob`, `gen`) VALUES (";
		for($i=0; $i<=$count; $i++){
			$query.='\''.$values[$i].'\'';
			if($i!=$lastcount){$query.=',';}
		}
		$query.=')';
	}
	if($database=='trashed'){
		$query="INSERT INTO `$database`(`sites`, `usernames`, `email`, `pass`, `domain`, `customerno`, `firstname`, `lastname`, `phoneno`, `dob`, `gen`) VALUES (";
		for($i=0; $i<=$count; $i++){
			$query.='\''.$values[$i].'\'';
			if($i!=$lastcount){$query.=',';}
		}
		$query.=')';
	}
	if($database=='helper'){
		$query="INSERT INTO `$database`(`sites`) VALUES (";
		for($i=0; $i<=0; $i++){
			$query.='\''.$values[$i].'\'';
		}
		$query.=')';
	}
	$Execute=mysqli_query($con,$query);
	if($Execute){return true;}else{return false;}
}
// Function To Fetch All Data from HelpDesk and store in array and return array
function Fetch_All_helpdesk_data($con){
	$query=mysqli_query($con,"SELECT * From `helpdesk` ORDER BY `sites`");
	$rows=Count_Database_Rows($con,'helpdesk');
	for($i=0; $i<=$rows; $i++){
		$test=mysqli_fetch_array($query);
		for($j=0; $j<=11; $j++){
			$datahelpdesk[$i][$j]= isset($test[$j]) ? $test[$j] : 0;
		}
	}
	return $datahelpdesk;
}
// Function To Fetch All Data from Helper and store in array and return array
function Fetch_All_helper_data($con){
	$query=mysqli_query($con,"SELECT * From `helper` ORDER BY `sites`");
	$rows=Count_Database_Rows($con,'helper');
	for($i=0; $i<=$rows; $i++){
		$test=mysqli_fetch_array($query);
		for($j=0; $j<=1; $j++){
			$datahelpdesk[$i][$j]= isset($test[$j]) ? $test[$j] : 0;
		}
	}
	return $datahelpdesk;
}
/* Functions which fetch data from helpdesk and stores only multiple sites in helper */
function helperfixeryes($con){
    $helper=mysqli_query($con,"SELECT * from `helper`");
    $r1=mysqli_num_rows($helper);
    $i=1;
    while($test=mysqli_fetch_array($helper)){
      $helpersites[$i]=$test['sites'];
      $i++;
    }
      $desk=mysqli_query($con,"SELECT * from `helpdesk`");
      $drow=mysqli_num_rows($desk);
      $i=1;
      while($test2=mysqli_fetch_array($desk)){
        $dsites[$i]=$test2['sites'];
        $i++;
      }
    for($i=1; $i<=$r1; $i++){
      $query=mysqli_query($con,"SELECT * from `helpdesk` WHERE `sites`='$helpersites[$i]'");
      $row=mysqli_num_rows($query);
      if($row<=1){
        mysqli_query($con,"DELETE FROM `helper` WHERE `sites`='$helpersites[$i]'");
      }
    }
}
function FetchDeskSetHelper($con){
  helperfixeryes($con);
  $fetchdesk=mysqli_query($con,"SELECT * from `helpdesk` ORDER BY `sites`");
    while($arranged=mysqli_fetch_array($fetchdesk)){
      $site=$arranged['sites'];
        $sitefetch=mysqli_query($con,"SELECT * from `helpdesk` WHERE `sites`='$site'");
        $row=mysqli_num_rows($sitefetch);
        if($row>1){
          $query="INSERT INTO `helper`(`sites`) VALUES ('$site')";
          $result=mysqli_query($con,"SELECT * from `helper` WHERE `sites`='$site'");
          $row=mysqli_num_rows($result);
          if($row<1){mysqli_query($con,$query);}
        }
    }
}
// Function To Show Specific Headings For Specific Site
function showheadings($site){
	if($site=='godaddy.com'){
		echo '<tr id="godaddyheadings">
			  <th id="gintiboxheading"><span id="gintitextheading">N</span></th>
			  <th id="siteboxheading"><span id="sitetextheading">Sites</span></th>
			  <th id="usernameboxheading"><span id="usernametextheading">UN</span></th>
			  <th id="emailboxheading"><span id="emailtextheading">Email</span></th>
			  <th id="passwordboxheading"><span id="passwordtextheading">Key</span></th>
			  <th id="domainboxheading"><span id="domaintextheading">Domains</span></th>
			  <th id="customernoboxheading"><span id="cnotextheading">C.NO</span></th>
			  <th id="firstnameboxheading"><span id="firstnametextheading">FN</span></th>
			  <th id="lastnameboxheading"><span id="lastnametextheading">LN</span></th>
			  <th id="phoneboxheading"><span id="phonetextheading">P.NO</span></th>
			  <th id="dobboxheading"><span id="dobtextheading">DOB</span></th>
			  <th id="genderboxheading"><span id="gentextheading">Gen</span></th>
			  </tr>'.PHP_EOL;
  echo '<!-- HEADINGS -->'.PHP_EOL;
	}else{
		echo '<tr id="headings">
			  <th id="gintiboxheading"><span id="gintitextheading">N</span></th>
			  <th id="siteboxheading"><span id="sitetextheading">Sites</span></th>
			  <th id="usernameboxheading"><span id="usernametextheading">UN</span></th>
			  <th id="emailboxheading"><span id="emailtextheading">Email</span></th>
			  <th id="passwordboxheading"><span id="passwordtextheading">Key</span></th>
			  <th id="domainboxheading"><span id="domaintextheading">Note</span></th>
			  <th id="customernoboxheading"><span id="cnotextheading">Note</span></th>
			  <th id="firstnameboxheading"><span id="firstnametextheading">FN</span></th>
			  <th id="lastnameboxheading"><span id="lastnametextheading">LN</span></th>
			  <th id="phoneboxheading"><span id="phonetextheading">P.NO</span></th>
			  <th id="dobboxheading"><span id="dobtextheading">DOB</span></th>
			  <th id="genderboxheading"><span id="gentextheading">Gen</span></th>
			  </tr>'.PHP_EOL;
  echo '<!-- HEADINGS -->'.PHP_EOL;
	}
}
// Function To Print Values in tables of Multiples Accounts
function sendvaluestoPPMult($j,$data,$number,$uroute,$droute){
	$idea=idea();
	if($j==0){
		echo '<td id="gintibox"><span id="ginti">'.$number.'</span></td>';
		echo '<td id="sitebox">';
		echo '<a href="';
		echo $uroute;
		echo '?id='.$data[$idea[$j]];
		echo '">';
		echo '<span id="updatepencilgly" class="glyphicon glyphicon-pencil"></span></a> ';
		echo '<span id="sitetext">';
		echo $data[$idea[1]];
		echo '</span>';
		echo '<a href="';
		echo $droute;
		echo '?id='.$data[$idea[$j]];
		echo '">';
		echo '<span id="mvtotrashgly" class="glyphicon glyphicon-trash"></span></a>';
		echo '</td>';
	}
	if($j>1){
		$boxids=boxids();
		$txtids=txtids();
		echo '<td id="'.$boxids[$j].'"><span id="'.$txtids[$j].'">'.$data[$idea[$j]].'</span></td>';
	}
}


?>
