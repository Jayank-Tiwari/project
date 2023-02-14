<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "counsellor";  
  
$con = mysqli_connect($host, $user, $password, $db_name);  
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}
$query = " select * from counsellor ";
$result = mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($result))
                                    {
                                        $_SESSION['UserID'] = $row['sno'];
                                        $_SESSION['UserName'] = $row['Name'];
                                        $_SESSION['UserEmail'] = $row['City'];
                                        $_SESSION['UserAge'] = $row['DT'];
                                        ?>
                                    <tr>
                                        <td><?php echo $_SESSION['UserID'] ?></td>
                                        <td><?php echo $_SESSION['UserName'] ?></td>
                                        <td><?php echo $_SESSION['UserEmail'] ?></td>
                                        <td><?php echo $_SESSION['UserAge'] ?></td>
                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Edit</button></td>
                                        <td><a href="delete.php?id='<?php echo $_SESSION['UserID'] ?>'" class="btn btn-danger">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>      
?>