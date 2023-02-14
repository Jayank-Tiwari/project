<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $database = "counsellor";
    $id=$_SESSION['UserID'];
      $Name=$_POST['Name'];
      $City=$_POST['City'];
      $sno=$_POST['Sno'];
    # create a connection
    $con = mysqli_connect($servername,$username,$dbpassword,$database);
    //  if(!$con) {
    //    die("Sorry we failed to connect" . mysqli_connect_error($con));
    // }
    // else{
    //     echo "Connection Established<br><br>";
    // }
   $sql= "UPDATE `counsellor` SET `sno` = '$sno', `Name` = '$Name', `City` = '$City' WHERE `sno` = '$id'";
   $result = mysqli_query($con, $sql);
   if($result)
   {
    header("Location:admindash.php");
   }
   else{
    echo"failed";
   }
}
?>