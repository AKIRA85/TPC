<?php
		/*

*	File:			student/home.php
*	
*	home page of student's account
*
*
*=====================================
*/
{
		//check login
		if(!isset($_COOKIE["loggedin"])||$_COOKIE['type']!="student") {
		header("Location: ../index.html",false);
		}
	
}
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
{
	$rollno = $_COOKIE['rollno'];
	$allow = true;
	if(isset($_POST['companyID'])) {
		$selectQuery = "SELECT companyID FROM register WHERE rollno = '$rollno'";
		$company = mysql_query($selectQuery);
		while($row = mysql_fetch_array($company, MYSQL_ASSOC)) {
			if($row['companyID'] == $_POST['companyID']) {
				echo "Already registered for this company.";	
				$allow = false;
			}
		}
		if($allow) {
			$insertQuery = "INSERT INTO register (rollno, companyID) 
			                 VALUES ('".$rollno."', '".$_POST['companyID']."')";
			if(mysql_query($insertQuery)){
				echo "Registered successfully<br>";			
			}else {
				echo "Unable to register.<br>$insertQuery";
			}
		}
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

	<!-- HTML Headers and Links to CSS -->

</head>
<body>

	<?php
	$regcompanys = "";
	$selectQuery = "SELECT companys.companyname FROM register 
						INNER JOIN companys ON register.companyID=companys.ID 
						WHERE register.rollno = '$rollno'";
			$company = mysql_query($selectQuery);
			while($row = mysql_fetch_array($company, MYSQL_ASSOC)) {
				$regcompanys.="<tr><td>".$row['companyname']."</td></tr>";
			}
	echo '
		<table border="1">
			'.$regcompanys.'
		</table>	<br>
	';
	echo '<form action="home.php" method="post">';
		{	//	create the companyname DROPDOWN  FIELD 
		$companyName_SQL =  "SELECT ID, companyname FROM companys";
		
		$company_SQL_Query = mysql_query($companyName_SQL);	
		$current_company="";
		echo '<select name="companyID">';
 	
			while ($row = mysql_fetch_array($company_SQL_Query, MYSQL_ASSOC)) {
				$companyID = $row['ID'];
			    echo '<option value="'.$companyID.'">'.$row['companyname'].'</option>';
			}

		echo '</select>';
		echo '<button type="submit" name="register">Register</button>';
	echo '</form>';
	
	//	END: create the company DROPDOWN  FIELD 
	}
	?>


</body>
</html>