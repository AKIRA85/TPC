<?php
/*
*	File:			login.php
*	
*	This script checks login entries
*
*=====================================
*/

{ 		//	Secure Connection Script
		$dbSuccess = false;
		$dbConnected = mysql_connect('localhost','root','');
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db('tpc',$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} 	
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {
	$tablename="students";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordRetrieved = "";
	if( $_POST['login']==1 ) {
		
		$tUser_SQLselect = "SELECT name, password FROM $tablename ";
		$tUser_SQLselect .= "WHERE rollno = '$username' ";	

		$tUser_SQLselect_Query = mysql_query($tUser_SQLselect); 	
		if ($row = mysql_fetch_array($tUser_SQLselect_Query, MYSQL_ASSOC)) {
		    $name = $row['name'];
		    $passwordRetrieved = $row['password'];
		}

		mysql_free_result($tUser_SQLselect_Query);
		
		if ($password == $passwordRetrieved) { 
				setcookie("loginAuthorised", "loginAuthorised", time()+7200, "/");	
				setcookie("type", "student", time()+7200, "/");
				setcookie("name", $username, time()+7200, "/");
				setcookie("rollno", $username, time()+7200, "/");	
				echo 'logged in';
				
		} else {
			echo "Access denied.<br /><br />";		
			echo '<a href="index.html">Try again</a>';			
		}
		
	}else if($_POST['login']==2 ) {
		$tablename = "companys";
		$tUser_SQLselect = "SELECT password FROM $tablename ";
		$tUser_SQLselect .= "WHERE companyname = '$username'";	

		$tUser_SQLselect_Query = mysql_query($tUser_SQLselect); 	
		if($row = mysql_fetch_array($tUser_SQLselect_Query, MYSQL_ASSOC)) {
		    $passwordRetrieved = $row['password'];
		}

		mysql_free_result($tUser_SQLselect_Query);
		if($password == $passwordRetrieved ) { 
				setcookie("loginAuthorised", "loginAuthorised", time()+7200, "/");	
				setcookie("type", "company", time()+7200, "/");
				setcookie("name", $username, time()+7200, "/");	
				echo 'logged in as '.$username ."\n";
		}else {
			echo "Access denied for this company .<br /><br />";
			echo '<a href="index.html">Try again</a>';			
		}
	}
	else{
		$tablename = "admin ";
		$tUser_SQLselect = "SELECT password FROM $tablename ";
		$tUser_SQLselect .= "WHERE username = '$username'";	

		$tUser_SQLselect_Query = mysql_query($tUser_SQLselect); 	
		if($row = mysql_fetch_array($tUser_SQLselect_Query, MYSQL_ASSOC)) {
		    $passwordRetrieved = $row['password'];
		}

		mysql_free_result($tUser_SQLselect_Query);
		if($password == $passwordRetrieved ) { 
				setcookie("loginAuthorised", "loginAuthorised", time()+7200, "/");	
				setcookie("type", "admin", time()+7200, "/");
				setcookie("name", $username, time()+7200, "/");	
				header("Location: home.php");
		}else {
			echo "Access denied for this company .<br /><br />";
			echo '<a href="index.html">Try again</a>';			
		}
	}
}
?>