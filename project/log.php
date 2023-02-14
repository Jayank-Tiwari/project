<?php
    session_start();      
    include('config.php');  
    $username = $_POST['email'];  
    $password = $_POST['pass'];  
      
        
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
                $sql = "select * from user where email = '$username' and Password = '$password'";  
                $result = mysqli_query($con, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);  
          
                if($count == 1){  
                    if(is_array($row)){
                        $_SESSION["username"] = $row['Name'];
                        $_SESSION["Password"] = $row['Password'];
                        $_SESSION["rol"] = $row['rol'];
                    }  
                }  
                else{
                    header("Location: index.php?error=Incorect User name or password");  
                }
                if(isset($_SESSION["username"])){
                    if($_SESSION["rol"] == 1){
                        header("Location: admindash.php");    
                    }
                    else{  
                    header("Location: dashboard.php");
                }
                }
                
        
?>