<?php include '../connection/connection.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Search</title>
</head>

<body>
<h3>Results</h3>

<?php
if (isset($_POST['submit'])) {
	$search = mysqli_real_escape_string($con, $_POST['search']);
	$sql = "SELECT * FROM student WHERE Surname LIKE '%$search%' OR FirstName LIKE '%$search%' OR StudentID LIKE '%$search%' OR Height LIKE '%$search%' OR Weight LIKE '%$search%' OR TitleID LIKE '%$search%' OR myGuid LIKE '%$search%' ";
	$result = mysqli_query($con, $sql);
	$queryResult = mysqli_num_rows($result);
	?>
    <div class="col-md-12">
     <div class="card mt-4">
       <div class="card-body">
 <table class="table table-bordered">  
 <tr>
    <td>StudentID</td>
    <td>FirstName</td>
    <td>Surname</td>
    <td>DateOfBirth</td>
    <td>TitleID</td>
    <td>Height</td>
    <td>Weight</td>
    <td>myGuid</td>
    <td>Inactive</td>
    <td>Lastupdated</td>
    <td>Add</td>
    <td>Edit</td>
  </tr>
  <?php
	if($queryResult > 0) {
		while($row = mysqli_fetch_assoc($result)) {?>
	<tr>
    <td><?php echo $row['StudentID'];  ?></td>
    <td><?php echo $row['FirstName'];  ?></td>
    <td><?php echo $row['Surname'];  ?></td>
    <td><?php echo $row['DateOfBirth'];  ?></td>
    <td><?php echo $row['TitleID'];  ?></td>
    <td><?php echo $row['Height'];  ?></td>
    <td><?php echo $row['Weight'];  ?></td>
    <td><?php echo $row['MyGuid'];  ?></td>
    <td><?php echo $row['InActive'];  ?></td>
    <td><?php echo $row['LastUpdated'];  ?></td>
   <td><button class="btn btn-primary mb1 black bg-yellow"><a href="studentAdd.php">Add</a></button></td>
    <td><button class="btn btn-primary mb1 black bg-yellow"><a href="studentDelete.php">Delete</a></button></td>
  </tr>
	     <?php  } }  else {
	echo "No Results Matching your Search";
}
} ?>

</table>
</div>
</div>
</div>
</body>
</html>	