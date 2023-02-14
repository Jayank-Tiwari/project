<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "signup";  
$con = mysqli_connect($host, $user, $password, $db_name);  
$username = $_POST['email'];  
$pass = $_POST['pass'];  
                $sql = "select * from user where email = '$username' and Password = '$password'";  
                $result = mysqli_query($con, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);  
          
                if($count == 1){  
                    if(is_array($row)){
                        $username = $row['Name'];
                        $Password = $row['Password'];
                        $rol = $row['rol'];
                    }  
                }  
                else{
                    echo "<h1> Login failed. Invalid username or password.</h1>";  
                }
?>