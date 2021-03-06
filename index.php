<?php
session_start();
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
<body>
  <div class = "col-lg-3 col-xl-3 col-xs-3 col-sm-3 side-jumbotron">
    <img class = "img-logo" src = images/logo.png alt="University Logo">
  </div>
  <div class="col-lg-9 col-xl-9 col-sm-9 col-xs-9">
    <div class="container">
<!-- Login form -->
    <div class="jumbotron">
        <center id='form-title'>University of Michigan <div></div> Login</center>
        <div class="login-form">
          <form class='form-group' method="post" action="">
            <div class="row">
              <div class="form-group col-lg-6 col-xl-6 col-sm-6 col-xs-12">
                <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="UMID" name="uname" id="input-userid-text" required />
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6 col-xl-6 col-sm-6 col-xs-12">
                <label class="control-label"></label>
                    <input type="password" class="form-control" placeholder="Password" name="pword" id="input-password-text" required />
              </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-xl-6 col-sm-6 col-xs-12">
                    <input class="btn btn-primary" type="submit" name="submit" value="Log in !!"/>
                </div>
              </div><br>
              <div class="row">
                  <a href="forgotpassword.php" class="left-link"/>Forgot Password?</a >
                  <a href="registration.php" class="right-link"/>Register</a >
              </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
include('include\db_connection.php');
if($connection) {
  //echo "Db connected successfully";
}
if(isset($_POST['uname'])){
$ts_uname=$_POST['uname'];
$ts_upass=$_POST['pword'];
if(($_POST['uname']!="") && ($_POST['pword'] !="")){
     $sql="select User_Type,User_ID,UPassword,Sno from new_user where User_ID='$ts_uname' and UPassword='$ts_upass'";
     $stmt = $connection->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      var_dump($row);
    //  $res=mysql_query($sql);
         if($row){
              $_SESSION['tokenid'] = $row['Sno'];
          		$_SESSION['userid']=$row['User_ID'];
              $_SESSION['role'] = $row['User_Type'];
              echo $_SESSION['tokenid'] . $_SESSION['userid'] . $_SESSION['role'];
         }
          else{
          echo "
            <script>
              alert('Invalid Credentials !');
            </script>
          ";
          //header("Location:index.php?a=1");
        }
        if($_SESSION['role'] == "Student"){
          header("Location:home.php");
        }
        else{
          header("Location:instructor_dashboard.php");
        }
        // }

    }
}
?>
