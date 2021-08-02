<?php include '../connection/connection.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Student List</title>
</head>

<body>
<h3> Student Information </h3>
<form action="" method="GET">
    <div class="input-group mb-3">
    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"
     class="form-control" placeholder="Search data">
     <button type="submit" class="btn btn-primary">Search</button>
</div>
</form>
<br />
<br />
  <div class="col-md-12">
     <div class="card mt-4">
       <div class="card-body">
 <table class="table table-bordered">
 <thead>
  <tr>
    <td>StudentID</td>
    <td>FirstName</td>
    <td>Surname</td>
    <td>DateOfBirth</td>
    <td>TitileID</td>
    <td>Height</td>
    <td>Weight</td>
    <td>myGuid</td>
    <td>Inactive</td>
    <td>Lastupdated</td>
    <td>Add</td>
    <td>Edit</td>
  </tr>
<?php
if(count($_POST)>0) {
$filtervalues=$_POST['search'];
$result = mysqli_query($con,"SELECT * FROM student where FirstName='$filtervalues' ");
}
?>
/* if(isset($_GET['search']))
 {
     $filtervalues = $_GET['search'];
     $query = "SELECT * FROM student WHERE CONCAT(StudentID, FirstName,LastName,) LIKE '%$filtervalues%' ";
     $query_run = mysqli_query($con, $query);
*/
<?php
 $i=0;
while($row = mysqli_fetch_array($result)) {
	?>
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
    <td><button><a href="studentAdd.php">Add  </a></button></td>
    <td><button><a href="studentDelete.php">Delete</a></button></td>
  </tr>
<?php
$i++;
}
?>     
</thead>
</table>
</div>
</div>
</div>
</body>
</html>
