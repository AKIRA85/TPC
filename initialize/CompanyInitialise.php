<?php
/*

*	File:			CompanyInitialise.php
*	
*	This script initialises the Company TABLE
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
		$tableName = "companys";	
		$CSVfilename = "csvCompany";

		$tableField = array(
					'companyname',
					'category',
					'grade',			
					'website'				
		);
      $numFields = 4;
		$createTable_SQL = "
					CREATE TABLE tpc.companys 
					( ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
					companyname VARCHAR( 250 ) NOT NULL, grade VARCHAR( 5 )NULL, 
					category VARCHAR( 50 ) NULL, website VARCHAR( 50 ) NULL 
		)";
		echo $createTable_SQL.'<br>';
	}
	
	//	=======^^^^^^^^^^^^^^^^^^^^^^^=========  End of Definition Part ======^^^^^^^^^=====

										
		{  //		read CSV data file
	
			$file = fopen($CSVfilename, "r"); 		
			$i = 0;
			while(!feof($file))
			  {		  	
				$thisLine = fgets($file);		
				$tableData[$i] = explode(",", $thisLine);
				$i++; 
			  }
			fclose($file);
			
			$numRows = sizeof($tableData);
		}
		echo '$numRows : '.$numRows.'<br />';
		echo '$tableField[$numFields-1] : '.$tableField[$numFields-1].'<br />';

		{	//		DROP table		
	
		
			$drop_SQL = "DROP TABLE '$tableName'";
			
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
			
			$table_SQLinsert = "INSERT INTO ".$tableName." (";
			
			//$table_SQLinsert .=   "x"; 
			foreach($tableField as $tableFieldName) {
				$table_SQLinsert .=  $tableFieldName;
				if($tableFieldName <> $tableField[$numFields-1]) {
					$table_SQLinsert .=  ", ";
				}
			}
			$table_SQLinsert .=  ") VALUES ";

			$indx = 0;		
			while($indx < $numRows) {			
				$table_SQLinsert .=  "(";
				
				foreach($tableField as $key => $tableFieldName) {
					
					$table_SQLinsert .=  "'".$tableData[$indx][$key]."'";
					if($tableFieldName <> $tableField[$numFields-1]) {
						$table_SQLinsert .=  ", ";
					}

				}

				$table_SQLinsert .=  ") ";
				if ($indx < ($numRows - 1)) {
					$table_SQLinsert .=  ",\n";
				}
				
				$indx++;
			}
		
			{	//	Echo and Execute the SQL and test for success   
			
						echo "<strong><u>SQL:<br /></u></strong>";
						echo $table_SQLinsert."<br /><br />";
							
						if (mysql_query($table_SQLinsert))  {				
							echo "was SUCCESSFUL.<br /><br />";
						} else {
							echo "FAILED.<br /><br />";		
						}
			}
}

?>