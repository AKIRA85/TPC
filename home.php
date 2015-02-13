<?php
	if(!isset($_COOKIE["loginAuthorised"])) {
		header("index.php");
	}
	$name = $_COOKIE["name"];
	$type = $_COOKIE["type"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	
</head>
<body>
	<?php
		if($type == "admin"){
			echo "Welcome, $name<br>";
			echo '<a href="forms/companyCreate.html">Add Company</a><br>';
			echo '<a href="forms/studentCreate.html">Add Student</a><br>';
			
		}
	?>
</body>
</html>