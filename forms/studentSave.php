
<?php
/*

*	File:			studentSave.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script collects data from studentCreate.php
*	and processes it
*
*
*=====================================
*/

if ($dbSuccess) {
	if(isset($_POST["save"])) {
		{  //   collect the data with $_POST
		
			$Name = $_POST["name"];	
			$rollno = $_POST["rollno"];	
			$email = $_POST["email"];	
			$mobile = $_POST["mobile"];
			$programme = $_POST["programme"];
			$cpi = $_POST["cpi"];	
		}
			
		{  //   SQL:     $tCompany_SQLinsert	
		
			$tCompany_SQLinsert = "INSERT INTO students (";			
			$tCompany_SQLinsert .=  "name, ";
			$tCompany_SQLinsert .=  "rollno, ";
			$tCompany_SQLinsert .=  "email, ";
			$tCompany_SQLinsert .=  "mobileNo, ";
			$tCompany_SQLinsert .=  "programme, ";
			$tCompany_SQLinsert .=  "cpi ";
			$tCompany_SQLinsert .=  ") ";
			
			$tCompany_SQLinsert .=  "VALUES (";
			$tCompany_SQLinsert .=  "'".$Name."', ";
			$tCompany_SQLinsert .=  "'".$rollno."', ";
			$tCompany_SQLinsert .=  "'".$email."', ";
			$tCompany_SQLinsert .=  "'".$mobile."', ";
			$tCompany_SQLinsert .=  "'".$programme."', ";
			$tCompany_SQLinsert .=  "'".$cpi."' ";
			$tCompany_SQLinsert .=  ") ";
		}
		
		{	//		check the data and process it 
			
			if (empty($Name)) {
				echo '<span style="color:red; ">Cannot add student with no name.</span><br /><br />'; 
			} else {
			//		echo '<span style = "text-decoration: underline;">SQL statement:</span><br />'.$tCompany_SQLinsert.'<br /><br />';
							
					if (mysql_query($tCompany_SQLinsert))  {	
						echo 'Successfully add new student.<br /><br />';
					} else {
						echo '<span style="color:red; ">FAILED to add new company.</span><br /><br />';
						
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
	<form name="postCompany" action="home.php?content=forms/studentSave.php" method="post">
						<table>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" /></td>
					</tr>
					<tr>
						<td>Roll No.</td>
						<td><input type="text" name="rollno" /></td>
					</tr>
					<tr>
						<td>E-mail ID</td>
						<td><input type="text" name="email" /></td>
					</tr>
					<tr>
						<td>Mobile No.</td>
						<td><input type="text" name="mobile" /></td>
					</tr>
					<tr>
						<td>Programme</td>
						<td><input type="text" name="programme" /></td>
					</tr>
					<tr>
						<td>CPI</td>
						<td><input type="text" name="cpi" /></td>
					</tr>
					<tr>
						<td align="right"><input type="submit" name="save" value="Save" /></td>
					</tr>
				</table>
					
	 </form>
</html>