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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/crud">Students</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/studentlist/"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentadd.php">Add New</a>
            </li>
        </ul>
        </div>
      </nav>

<form action="" method="GET">
	<div class="row">
    <div class="col-md-4">
    <div class="input-group mb-3">
    <select name="sort alphabet" class="form-control">
    <option value="">--Select Option--</option>
<option value="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] =="a-z"){echo"selected"; } ?>>A-Z (Ascending Order)</option>
<option value="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] =="z-a") {echo"selected"; } ?> >Z-A(Descending Order)</option>
    </select>
     <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Sort</button>
</div>
</div>
</div>
</form>
<form action="search.php" method="POST">
    <div class="input-group mb-3">
    <input type="text" name="search" placeholder="Search">
     <button type="submit" class="btn btn-primary" name="submit">Search</button>
</div>
</form>
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
    <td>Edit</td>
    <td>Delete</td>
  </tr>
   <?php 
	$sql = "SELECT *FROM student";
	$result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result)){?> 
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
    <td><?php 
	$lastupdated = $row['LastUpdated'];
	$myDateTime = DateTime::createFromFormat('Y-m-d', $lastupdated);
	echo $myDateTime; ?></td>
    <td><button class=""><a href="studentedit.php" <?php  $row['StudentID']; ?>>Edit</a></button></td>
    <td><button class=""><a href="studentDelete.php" <?php  $row['StudentID']; ?>>Delete</a></button></td>
  </tr>
     <?php  }  die( mysqli_error($con)) ?>

</table>
</div>
</div>
</div>

</body>
</html>