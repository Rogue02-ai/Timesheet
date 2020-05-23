<?php
// $conn = mysql_connect('localhost','root','');
// if($conn) {
//     echo "success";
// }
// mysql_select_db('timesheet');
// echo phpinfo();
$servername = "localhost";
$usrername = "root";
$password = "";
$dbname = "timesheet";
try {
    $connection = new PDO("mysql:host=localhost; dbname=timesheet", $usrername, $password);
    // if($connection) {
    //     echo "yes";
    // }
} catch (PDOException $e) {
    echo "Fail: ";
}


// $connection = new mysqli('localhost','root','','timesheet') or die("connection failure");

?>