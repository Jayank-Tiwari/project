<?php
session_start();
$servername='localhost';
$username='root';
$password='';
$dbname = "counsellor";
$id = $_SESSION['UserID'];
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE `counsellor` SET `sno` = '" . $_POST['sno'] . "', `Name` = '" . $_POST['Name'] . ", `City` = '" . $_POST['City'] . "', `DT` = '" . $_POST['DT'] . "' WHERE `sno` = '$id'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM counsellor WHERE sno='$id'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
</div>
sno<br>
<input type="hidden" name="sno" class="txtField" value="<?php echo $row['sno']; ?>">
<input type="number" name="sno"  value="<?php echo $row['sno']; ?>">
<br>
Name: <br>
<input type="text" name="Name" class="txtField" value="<?php echo $row['Name']; ?>">
<br>
City:<br>
<input type="text" name="City" class="txtField" value="<?php echo $row['City']; ?>">
<br>
DT:<br>
<input type="datetime-local" name="DT" class="txtField" value="<?php echo $row['DT']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>