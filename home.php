<?php
		/*

*	File:			home.php
*	
*	this page load home page from company, students, and admin 
*  using the type cookie
*  
*
*=====================================
*/

	if(!isset($_COOKIE["loggedin"])) {
		header("Location: index.php");
		exit;
	}
	$name = $_COOKIE['name'];
	$type = $_COOKIE["type"]; 
	if(isset($_GET['content'])) {
		$content = $_GET['content']; 
	}else {
		$content = $type."/home.php";
	}
	$menu = $type."/menu.php";
	
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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../../bootstrap-3.3.2/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/layout.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<ul class="nav navbar-nav navbar-right" >
			<li><a href="home.php">Home</a></li>
         <li><a href="index.php?status=logout">Logout</a></li>
      </ul>
	</nav>
		<div id="outerWrapper" >
			
    		<div id="innerWrapper">
    		
      		<div id="menuColumn">		
      		<?php	
      			if(file_exists($menu)) {		
      				include_once($menu); 
      			}else {
      				echo $menu.'File not found';
      				
      			}
      		?>
		      </div><!-- end menuColumn -->

      		<div id="contentColumn">
      			<?php 			
      			if(file_exists($content)) {		
      				include_once($content); 
      			}else {
      				echo $content.'File not found';
      			}
      			?>
      		</div><!-- end contentColumn -->
      		
    		</div><!-- end innerWrapper -->
    
  </div><!-- end outerWrapper -->
</body>
</html>