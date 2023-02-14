<?php
session_start();
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "counsellor"; 
    $id = $_SESSION['UserID'];
$con=mysqli_connect($host,$user,$password,$db_name);
$sql = "DELETE FROM counsellor WHERE `counsellor`.`sno` = '$id' ";
$result = mysqli_query($con, $sql);
if($result) {
    header("Location:admindash.php#"); 
  }
  else {
    echo "Registration was not successful! Please try after some time";
  }
mysqli_close($con);
?>