<?php
/*
*	File:			company/oldPosts.php
*
*	Display old Posts 
*
*
*=====================================
*/


{
	if(isset($_GET['value'])) {
		$id = $_GET['value'];
		$selectQuery = "SELECT subject, time, text FROM News WHERE ID='".$id."'";
	}else {
		$column = array(
					"subject",
					"time",
					"text"
					);
		$numcol = 2;
		$count = 1;
		$selectQuery = "SELECT ID, subject, time";
		$selectQuery.=" FROM News WHERE postedBy='".$name."' ORDER BY time ASC";
	}
	$posts = mysql_query($selectQuery);
}
?>
<html>
<head>

	<!-- HTML Headers and Links to CSS -->

</head>
<body>

	<h2 style="font-family: arial, helvetica, sans-serif;" >
				Posts
			</h2>
	<?php
		if(isset($_GET['value'])){
			$row = mysql_fetch_array($posts, MYSQL_ASSOC);
			echo '<table>
				<tr>
					<td>Subject :</td>
					<td>'.$row['subject'].'</td>
				</tr>	
				<tr>
					<td>Time :</td>
					<td>'.$row['time'].'</td>
				</tr>
				</table>
				<hr>
				'.$row['text'];		
			exit;
		}
		echo '<table border="1">
				<tr>
					<th>Subject</th>
					<th>Time</th>
				</tr>';
		while($row = mysql_fetch_array($posts, MYSQL_ASSOC)) {
			echo '<tr>
					<td><a href="home.php?content=company/oldPosts.php&value='.$row['ID'].'">'
					.$row['subject'].'</a></td>
					<td>'.$row['time'].'</td>
				</tr>
				</table>';
		}
	?>

</body>
</html>
