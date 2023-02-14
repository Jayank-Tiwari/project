<?php

$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "counsellor";  
  
$con = mysqli_connect($host, $user, $password, $db_name);  
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $Name = $_POST['fname'];
    $Phone = $_POST['Number'];
    $email=$_POST['email'];
    $City=$_POST['City'];
    
   $check = "SELECT * from counsellor where email = '$email' ";
   $result = mysqli_query($con, $check);
   $count=mysqli_num_rows($result); 

   if($count>0){
    echo "Username and email already exists";
   }
   else{
    $sql="INSERT INTO `counsellor` (`sno`, `Name`, `email`, `Number`, `City`, `DT`) VALUES (NULL, '$Name', '$email', '$Phone', '$City', current_timestamp())"; 
   
  $result = mysqli_query($con, $sql);
  
  if($result) {
    header("Location:admindash.php#"); 
  }
  else {
    echo "Registration was not successful!";

    //   echo "Row not inserted in table succesfully because of this error ---> " . mysqli_error($conn);
  }
   }
}   
       
?>