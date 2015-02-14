<?php
/*

*	File:			StudentsInitialise.php
*	
*	This script initialises the students TABLE
*
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

	
	{	//		Table Definition 
		$tableName = "register";	

		$tableField = array(
					'rollno',
					'companyID',
					'time'			
		);
      $numFields = 3;
		$createTable_SQL = "CREATE TABLE tpc.register ( 
		ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		rollno varchar(8) NOT NULL, 
		companyID int(11) NOT NULL, 
		time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP )";
		echo $createTable_SQL.'<br>';
	}
	
	//	=======^^^^^^^^^^^^^^^^^^^^^^^=========  End of Definition Part ======^^^^^^^^^=====

		{	//		DROP table		
		
			$drop_SQL = "DROP TABLE $tableName";
			
			if (mysql_query($drop_SQL))  {	
				echo "DROP ".$tableName."' -  Successful.";
			} else {
				echo "DROP $tableName - Failed.";
			}
		}
		
		echo "<br /><hr /><br />";
	
		{	//		CREATE table		
			
			if (mysql_query($createTable_SQL))  {	
				echo "'CREATE ".$tableName."' -  Successful.";
			} else {
				echo "'CREATE ".$tableName."' - Failed.";
			}
		}		
		echo "<br /><hr /><br />";
		
}

?>