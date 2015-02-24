<?php
	if (isset($_GET['status']) AND ($_GET['status'] == "logout")) {
		$status = $_GET['status'];
		setcookie("loggedin", "", time()-7200);	
		$past = time() - 3600;
		foreach ( $_COOKIE as $key => $value )
		{
 				setcookie( $key, $value, $past, '/' );	
		}
		header("Location: index.php");
	}
	else if(isset($_COOKIE['loggedin'])) {
		 header("Location: home.php");
	}
?>

<html>
<head>
	<title>TPC Home</title>
</head>
<body>
	<div>
	<form action="login.php" method="post">
      <table>
         <caption>Student Login</caption>
         <tr>
		      <td>Username :</td>
		      <td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password"></td>
		   </tr>
		   <tr>
				<td align="center">
				   <button name="login" value="1" type="submit">Login</button>
				</td>
		   </tr>
	   </table> 
	 </form>
	   <hr> 
	 <form action="login.php" method="post">
	   <table>
         <caption>Company Login</caption>
         <tr>
		      <td>Username :</td>
		      <td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password"></td>
		   </tr>
		   <tr>
				<td align="center">
				   <button name="login" value="2" type="submit">Company Login</button>
				</td>
		   </tr>
		 </table> 
		</form> 
	 <hr> 
	 <form action="login.php" method="post">
	   <table>
         <caption>Admin Login</caption>
         <tr>
		      <td>Username :</td>
		      <td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password"></td>
		   </tr>
		   <tr>
				<td align="center">
				   <button name="login" value="0" type="submit">Admin Login</button>
				</td>
		   </tr>
	   </table>  
	</form>
	</div>
</body>
</html>