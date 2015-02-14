<?php
		/*

*	File:			home.php
*	
*	this page load home page using the type cookie
*
*
*=====================================
*/

	if(!isset($_COOKIE["loggedin"])) {
		header("index.php");
	}else {
		$name = $_COOKIE["name"];
		$type = $_COOKIE["type"];
		echo "Welcome, $name<br>";
		include_once($type."/home.php");
		echo '<a href="index.php?status=logout">Logout</a>';
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	
</head>
<body>
	<?php
			
	?>
</body>
</html>