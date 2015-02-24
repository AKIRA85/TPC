<?php
/*

*	File:			company/home.php
*
*	home page of company account
*
*
*=====================================
*/


{
	$column = array(
				"rollno",
				"name",
				"email",
				"mobileNo",
				"programme",
				"cpi",
				);
	$numcol = 6;
	$count = 1;
	$selectQuery = "SELECT ";
	foreach ( $column as $value ){
			$selectQuery.= "students.".$value;
			if($count!=$numcol){
				$selectQuery.=", ";
			}
			$count++;
	}
	$selectQuery.=" FROM register
						INNER JOIN students ON register.rollno=students.rollno 
						WHERE register.companyID='".$_COOKIE['companyID']."'";
	
	$studlist = mysql_query($selectQuery);
	
}
?>
<html>
<head>

	<!-- HTML Headers and Links to CSS -->

</head>
<body>
	<h2 style="font-family: arial, helvetica, sans-serif;" >
				Students List
			</h2>
	<table border="1">
	<?php
		echo "<tr>";
		foreach ( $column as $value ){
			echo '<th>'.$value.'</th>';
		}
		echo "</tr>";
		while($row = mysql_fetch_array($studlist, MYSQL_ASSOC)) {
			echo "<tr>";
			foreach ( $row as $value ){
			echo '<td>'.$value.'</td>';
			}	
			echo "</tr>";
		}
	?>
	</table>

</body>
</html>
