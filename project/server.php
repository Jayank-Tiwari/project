<?php

require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $Name = $_POST['fname'];
    $Phone = $_POST['number'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $higest_edu=$_POST['higest_edu'];
    $cty_code=$_POST['cty_code'];
    $City=$_POST['City'];
    
   $check = "SELECT * from user where email = '$email' ";
   $result = mysqli_query($con, $check);
   $count=mysqli_num_rows($result); 

   if($count>0){
    echo "Username and email already exists";
   }
   else{
    $sql="INSERT INTO `user` (`sno`, `Name`, `email`, `Password`, `HEL`, `CC`, `Number`, `City`, `DT`) VALUES (NULL, '$Name', '$email', '$password', '$higest_edu', '$cty_code', '$Phone', '$City', current_timestamp())"; 
   
  $result = mysqli_query($con, $sql);
  
  if($result) {
    header("Location:index.php#"); 
  }
  else {
    echo "Registration was not successful! Please try after some time";

    //   echo "Row not inserted in table succesfully because of this error ---> " . mysqli_error($conn);
  }
   }
}   
       
?>