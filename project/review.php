<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['firstname'];
    $comment = $_POST['subject'];


    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $database = "review";
    # create a connection
    $con = mysqli_connect($servername,$username,$dbpassword,$database);
    //  if(!$con) {
    //    die("Sorry we failed to connect" . mysqli_connect_error($con));
    // }
    // else{
    //     echo "Connection Established<br><br>";
    // }
   $sql= "INSERT INTO `review` (`sno`, `Name`, `review`) VALUES (NULL, '$Name', '$comment');";
   $result=mysqli_query($con, $sql);
   if($result)
   {
    header("Location:index.php#");

   }
   else{
    echo"failed";
   }
}
?>