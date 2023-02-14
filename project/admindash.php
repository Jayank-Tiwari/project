<?php
    session_start();
    $fullName = $_SESSION["username"]; 
                $shortName = ProfilePicFromName($fullName);
                function ProfilePicFromName($fullName) {
                      
                     $fullNameArr = explode(" ", $fullName);
                     $firstWord = current($fullNameArr);
                     $firstCharacter = substr($firstWord, 0, 1);
                     $defaultProfile = strtoupper($firstCharacter);
                     return $defaultProfile;
                    
                }
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="dashboard.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
    <style>
        .edit{
            height:100% !important;
            width:100% !important;
            background: none !important;
            text-transform: none !important;
            font-size: 1.6rem !important;
            padding:0 1.5rem !important;
            margin-bottom: 13px !important;
            border: none !important;
            border-radius: 9px !important;
            color: white !important;
            background: #ff9933 !important;
        }
        
        
    </style>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <div class="profile image" style="border-radius:100%; background:orange;">
                    <div class="profile-image" style="color:white; font-size:40px;">
                        <?php echo $shortName; ?>
                    </div>
                </div>

                <div class="text logo-text">
                    <span class="name" >&nbsp;&nbsp;<?php echo $_SESSION['username']; ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links" style="margin-left:-35px;">
                    <li class="nav-link">
                        <a href="index.php#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="javascript:myFunction()">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Counsellors</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text"><b>Admin Dashboard</b></div><br><br>
        <div id="counsellors" style="display:none;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong" style="margin-bottom: 22px;
    margin-top: -41px;
    margin-left: 88%;" >Add Counsellor</button>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Counsellor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="addcounsellor.php" method="POST">
        <input type="email" id="email" name="email" placeholder="Email" class="form-control input-md c-square sign-up"><br>
        <input type="text" id="fname" name="fname" placeholder="Full Name" class="form-control input-md c-square sign-up"><br>
        <input type="text" id="city" name="City" placeholder="City" class="form-control input-md c-square sign-up"><br>
        <input type="text" id="Number" name="Number" placeholder="Number" class="form-control input-md c-square sign-up"><br>

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" style="background:#3388FF; border:none;" >Add New Counsellor</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <table class="table table-bordered" style="width:96%; margin-left:40px;">
  <thead>
    <tr>
      <th scope="col">S.no.</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">Date and Time of joining</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php 
                                    
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
    <tr>
  </tbody>
</table>
<!-- Edit Counsellor Popup -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="editcounsellor.php" method="POST">
            <input type="hidden"  class="edit" name="Sno" value="<?php echo $_SESSION['UserID'] ?>">
            <input type="number"  class="edit" name="Sno" value="<?php echo $_SESSION['UserID'] ?>">
            <input type="text"  class="edit" name="Name" value="<?php echo $_SESSION['UserName'] ?>">
            <input type="text"  class="edit" name="City" value="<?php echo $_SESSION['UserEmail'] ?>">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" style="background:#3388FF; border:none;" >Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </section>
    

    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>
    <script>
        function myFunction() {
        var x = document.getElementById("counsellors");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        }
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
