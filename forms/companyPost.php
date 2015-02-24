
<?php
/*

*	File:			companyPost.php
*
*=====================================
*/

if ($dbSuccess) {
	if(isset($_POST["save"])) {
		{  //   collect the data with $_POST
			$subject = $_POST["subject"];	
			$text = $_POST["text"];	
				
		}
			
		{  //   SQL:     $tCompany_SQLinsert	
		
			$tCompany_SQLinsert = "INSERT INTO News (";			
			$tCompany_SQLinsert .=  "postedby, ";
			$tCompany_SQLinsert .=  "subject, ";
			$tCompany_SQLinsert .=  "text ";
			$tCompany_SQLinsert .=  ") ";
			
			$tCompany_SQLinsert .=  "VALUES (";
			$tCompany_SQLinsert .=  "'".$name."', ";
			$tCompany_SQLinsert .=  "'".$subject."', ";
			$tCompany_SQLinsert .=  "'".$text."' ";
			$tCompany_SQLinsert .=  ") ";
		}
		
		{	//		check the data and process it 
			
			if (empty($name)) {
				echo '<span style="color:red; ">Failed to make post.</span><br /><br />'; 
			} else {
			//		echo '<span style = "text-decoration: underline;">SQL statement:</span><br />'.$tCompany_SQLinsert.'<br /><br />';
							
					if (mysql_query($tCompany_SQLinsert))  {	
						echo 'Successfully Posted.<br /><br />';
					} else {
						echo '<span style="color:red; ">FAILED to make POST.</span><br /><br />';
						
					}	
			}
		}

	}
}

?>
<html>
        <h2 style="font-family: arial, helvetica, sans-serif;" >
				New Post
			</h2>

	<br /> 
	<form name="postCompany" action="home.php?content=forms/companyPost.php" method="post">
						<table>
					<tr>
						<td>Subject</td>
						<td><input type="text" name="subject" size="60"/></td>
					</tr>
					<tr>
						<td valign="top">Body</td>
						<td align="right"><textarea cols="60" rows="15" name="text"></textarea></td>
					</tr>
					<tr>
						<td align="right" colspan="2"><input type="submit" name="save" value="Save" /></td>
					</tr>
				</table>
					
	 </form>
</html>