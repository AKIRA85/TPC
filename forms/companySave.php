
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

if ($dbSuccess) {
		if(isset($_POST["save"])) 
		{
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
				//	echo '<span style = "text-decoration: underline;">SQL statement:</span><br />'.$tCompany_SQLinsert.'<br /><br />';
							
					if (mysql_query($tCompany_SQLinsert))  {	
						echo 'Successfully add new company.<br /><br />';
					} else {
						echo '<span style="color:red; ">Company Name already exist.<br>
						     FAILED to add new company.</span><br /><br />';
						
					}	
			}
		}

}

}
?>
<html>
        <h2 style="font-family: arial, helvetica, sans-serif;" >
				New Company Creation Form
			</h2>

	<br /> 
	<form name="postCompany" action="home.php?content=forms/companySave.php" method="post">
				<table>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" /></td>
					</tr>
					<tr>
						<td>Grade</td>
						<td><input type="text" name="grade" /></td>
					</tr>
					<tr>
						<td>Category</td>
						<td><input type="text" name="category" /></td>
					</tr>
					<tr>
						<td>website</td>
						<td><input type="text" name="website" /></td>
					</tr>
					<tr>
						<td align="right"><input type="submit"  name="save" value="Save" /></td>
					</tr>
				</table>
					
	 </form>
</html>