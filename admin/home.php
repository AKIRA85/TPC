<?php
	if(!isset($_COOKIE["loginAuthorised"])) {
		header("index.html");
	}
	echo '<a href="forms/companyCreate.html">Add Company</a><br>';
	echo '<a href="forms/studentCreate.html">Add Student</a><br><hr>';
?>