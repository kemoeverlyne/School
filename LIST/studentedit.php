<?php include '../connection/connection.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="row justify-content-center">
   <form name="frmUser" method="post" action="">
	<div style="width:500px;">
		<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
		<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
			<tr class="tableheader">
				<td colspan="2">Add New Student</td>
			</tr>
            <tr>
				<td><label>StudentID</label></td>
				<td><input type="number" name="StudentID" class="txtField" id="StudentID"></td>
			</tr>
			<tr>
				<td><label>First Name</label></td>
				<td><input type="text" name="FirstName" class="txtField" id="FirstName"></td>
			</tr>
			<tr>
				<td><label>	Surname</label></td>
				<td><input type="text" name="Surname" class="txtField" id="Surname"></td>
			</tr>
				<td><label>TitleID</label></td>
				<td><input type="number" name="TitleID" class="txtField" id="TitleID"></td>
			</tr>
            <tr>
				<td><label>	MyGuid</label></td>
				<td><input type="text" name="MyGuid" class="txtField" id="MyGuid"></td>
			</tr>
            <tr>
				<td><label>	Weight</label></td>
				<td><input type="text" name="Weight" class="txtField" id="Weight"></td>
			</tr>
            <tr>
				<td><label>Height</label></td>
				<td><input type="text" name="Height" class="txtField" id="Height"></td>
			</tr>
            <tr>
				<td><label>Date Of Birth:</label></td>
				<td><input type="date" name="DateOfBirth" class="txtField" id="DateOfBirth"></td>
			</tr>
            <tr>
				<td><label>Inactive:</label></td>
				<td><input type="number" name="InActive" class="txtField" id="InActive"></td>
			</tr>
            <tr>
				<td><label>Last updated:</label></td>
				<td><input type="date" name="LastUpdated" class="txtField" id="LastUpdated"></td>
			</tr>
            <tr>
				<td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
			</tr>
		</table>
	</div>
</form>
<?php
if(count($_POST)>0) {
	$sql = "UPDATE student set FirstName='" . $_POST["FirstName"] . "', Surname='" . $_POST["Surname"] . "', TitleID='" . $_POST["TitleID"] . "', MyGuid='" . $_POST["MyGuid"] . "' , Weight='" . $_POST["Weight"] . "', Height='" . $_POST["Height"] . "' , DateOfBirth='" . $_POST["DateOfBirth"] . "', InActive='" . $_POST["InActive"] . "', LastUpdated='" . $_POST["LastUpdated"] . "' WHERE StudentID='" . $_POST["StudentID"] . "'";
	mysqli_query($con,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM student WHERE StudentID='" . $_GET["StudentID"] . "'";
$result = mysqli_query($con,$select_query);
$row = mysqli_fetch_array($result);
?>
