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

	if (isset($_GET['status']) AND ($_GET['status'] == "logout")) {
				$status = $_GET['status'];
				setcookie("loggedin", "", time()-7200);
				echo "logged out";
				$_COOKIE = array();	
				header("Location: index.php");
			}	
	$allow = false;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordRetrieved = "";
	if(isset($_COOKIE['loggedin'])) {
			$allow=true;
	}
	if( $_POST['login']==1 ) {
		$tablename="students";
		$tUser_SQLselect = "SELECT name, password FROM $tablename ";
		$tUser_SQLselect .= "WHERE rollno = '$username' ";	
		$type = "student";

		$tUser_SQLselect_Query = mysql_query($tUser_SQLselect); 	
		if ($row = mysql_fetch_array($tUser_SQLselect_Query, MYSQL_ASSOC)) {
		    $name = $row['name'];
		    $passwordRetrieved = $row['password'];
		}

		mysql_free_result($tUser_SQLselect_Query);
		
		if ($password == $passwordRetrieved) { 
				setcookie("loggedin", "loggedin", time()+7200, "/");	
				setcookie("type", $type, time()+7200, "/");
				setcookie("name", $name, time()+7200, "/");
				setcookie("rollno", $username, time()+7200, "/");
				$allow = true;	
				
		}else {
			echo "Access denied.<br /><br />";		
			echo '<a href="index.html">Try again</a>';			
		}
		
	}else if($_POST['login']==2 ) {
		$tablename = "companys";
		$tUser_SQLselect = "SELECT password, ID FROM $tablename ";
		$tUser_SQLselect .= "WHERE companyname = '$username'";	

		$tUser_SQLselect_Query = mysql_query($tUser_SQLselect); 	
		if($row = mysql_fetch_array($tUser_SQLselect_Query, MYSQL_ASSOC)) {
		    $passwordRetrieved = $row['password'];
		    $id = $row['ID'];
		}
		echo "passs/".$password."/ and ret/".$passwordRetrieved."<br>";
		mysql_free_result($tUser_SQLselect_Query);
		if($password == $passwordRetrieved ) { 
				setcookie("loggedin", "loggedin", time()+7200, "/");	
				setcookie("type", "company", time()+7200, "/");
				setcookie("name", $username, time()+7200, "/");	
				setcookie("companyID", $id, time()+7200, "/");
				$allow = true;
		}else {
			echo "Access denied.<br /><br />";
			echo '<a href="index.html">Try again</a>';		
		}
	}
	else{
		//if admin logs in
		$tablename = "admins";
		$type = "admin";
		$tUser_SQLselect = "SELECT password FROM $tablename ";
		$tUser_SQLselect .= "WHERE username = '$username'";	

		$tUser_SQLselect_Query = mysql_query($tUser_SQLselect); 	
		if($row = mysql_fetch_array($tUser_SQLselect_Query, MYSQL_ASSOC)) {
		    $passwordRetrieved = $row['password'];
		}

		mysql_free_result($tUser_SQLselect_Query);
		echo 'pass/'.$password.' ret/'.$passwordRetrieved."/";
		if($password == $passwordRetrieved ) { 
				setcookie("loggedin", "loggedin", time()+7200, "/");	
				setcookie("type", $type, time()+7200, "/");
				setcookie("name", $username, time()+7200, "/");	
				$allow = true;
		}else {
				echo "Access denied.<br /><br />";		
			echo '<a href="index.php">Try again</a>';
		}
		
	}
	if($allow) {
		header("Location: home.php");
	}
}
?>