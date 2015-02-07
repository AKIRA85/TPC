
<?php
/*

*	File:			companySave.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script collects data from companyCreate.php
*	and processes it
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
		
		{  //   collect the data with $_POST
		
			$Name = $_POST["name"];	
			$grade = $_POST["grade"];	
			$category = $_POST["category"];	
			$website = $_POST["website"];	
		}
			
		{  //   SQL:     $tCompany_SQLinsert	
		
			$tCompany_SQLinsert = "INSERT INTO companys (";			
			$tCompany_SQLinsert .=  "companyname, ";
			$tCompany_SQLinsert .=  "grade, ";
			$tCompany_SQLinsert .=  "category, ";
			$tCompany_SQLinsert .=  "website ";
			$tCompany_SQLinsert .=  ") ";
			
			$tCompany_SQLinsert .=  "VALUES (";
			$tCompany_SQLinsert .=  "'".$Name."', ";
			$tCompany_SQLinsert .=  "'".$grade."', ";
			$tCompany_SQLinsert .=  "'".$category."', ";
			$tCompany_SQLinsert .=  "'".$website."' ";
			$tCompany_SQLinsert .=  ") ";
		}
		
		{	//		check the data and process it 
			
			if (empty($Name)) {
				echo '<span style="color:red; ">Cannot add company with no name.</span><br /><br />'; 
			} else {
					echo '<span style = "text-decoration: underline;">
							SQL statement:</span>
							<br />'.$tCompany_SQLinsert.'<br /><br />';
							
					if (mysql_query($tCompany_SQLinsert))  {	
						echo 'used to Successfully add new company.<br /><br />';
					} else {
						echo '<span style="color:red; ">Company Name already exist.<br>
						     FAILED to add new company.</span><br /><br />';
						
					}	
			}
		}

}

echo "<br /><hr /><br />";

echo '<a href="companyCreate.html">Create another company</a>';
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<a href="../index.php">Quit - to homepage</a>';

?>