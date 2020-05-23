<?php
session_start();
if($_SESSION['userid']){
include 'include\db_connection.php';

$userid = $fname = $lname = $gender = $email = $semester= $role = "";
if(isset($_SESSION['userid'])){
$userid = $_SESSION['userid'];
}
$sql = "select User_Type, First_Name, Last_Name, Gender, Email, Semester from new_user where User_ID = '$userid'";
$stmt = $connection->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row)
{
    $role = $row['User_Type'];
    $fname = $row['First_Name'];
    $lname = $row['Last_Name'];
    $gender = $row['Gender'];
    $email = $row['Email'];
    $semester =$row['Semester'];
}}
else {
  header("Location: index.php");
}
 ?>
<html>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/index.js"></script>
</html>
<body style="background-color: #ecf0f1;">
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Personal Info</a>
  <a href="newtimesheet.php">Add Timesheet</a>
  <a href="edittimesheet.php">Edit Timesheet</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div><br><br><br>
	<div class="container">
    <div class="sample">
    <h2><strong>Personal Information</strong></h2>
    <br>
</div>
<br>
    <div class="sss">
      <div class="row">
        <div class="col-sm-4 col-lg-4 col-xl-4 col-md-4">
          <strong>First Name :</strong>
        </div>
        <div class="col-sm-8 col-lg-8 col-xl-8 col-md-8">
          <?php echo $fname; ?>
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-4 col-lg-4 col-xl-4 col-md-4">
          <strong>Last name :</strong>
        </div>
        <div class="col-sm-8 col-lg-8 col-xl-8 col-md-8">
          <?php echo $lname; ?>
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-4 col-lg-4 col-xl-4 col-md-4">
          <strong>Instructor Id :</strong>
        </div>
        <div class="col-sm-8 col-lg-8 col-xl-8 col-md-8">
          <?php echo $userid; ?>
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-4 col-lg-4 col-xl-4 col-md-4">
          <strong>Email :</strong>
        </div>
        <div class="col-sm-8 col-lg-8 col-xl-8 col-md-8">
          <?php echo $email; ?>
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-4 col-lg-4 col-xl-4 col-md-4">
          <strong>Semester :</strong>
        </div>
        <div class="col-sm-8 col-lg-8 col-xl-8 col-md-8">
          <?php echo $semester; ?>
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-4 col-lg-4 col-xl-4 col-md-4">
          <strong>Gender :</strong>
        </div>
        <div class="col-sm-8 col-lg-8 col-xl-8 col-md-8">
          <?php echo $gender; ?>
        </div>
      </div><br>
<script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>


</body>
