<?php 
include 'connect.php';
  session_start();

   $name=$_SESSION['name'];
   $email=$_SESSION['email'];

$sql = "SELECT * from donar where email='$email' and name='$name'";
$result= mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$blood = $row['blood'];
$gender = $row['gender'];
$birth = $row['birth'];
$last = $row['last'];
$phone = $row['phone'];
$location = $row['location'];
$disease = $row['disease'];


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Donor Profile</title>
	<link rel="stylesheet" href="stylep.css">
</head>
<body>
 <h1>Donor Profile</h1>
<form>
 <div class="donar"><b>Name:</b> <?php echo $name ?>  </div><br>
 <div class="donar"><b>Blood Group:</b> <?php echo $blood ?></div><br>
 <div class="donar"><b>Gender:</b> <?php echo $gender ?></div><br>
 <div class="donar"><b>Date of Birth:</b> <?php echo $birth ?></div><br>
 <div class="donar"><b>Last Donated:</b> <?php echo $last ?></div><br>
 <div class="donar"><b>Email Address:</b> <?php echo $email ?></div><br>
 <div class="donar"><b>Phone Number:</b> <?php echo $phone ?></div><br>
 <div class="donar"><b>Disease:</b> <?php echo $disease ?></div><br>
 <div class="donar"><b>Location:</b> <?php echo $location ?></div>
</form><br><br><br>
 <div><a href="update.php?id=<?php echo $row['id'];?>">Edit Information</a></div><br><br><br>
 <div><a href="delete.php?id=<?php echo $row['id'];?>">Delete Account</a></div><br><br><br>
 <div><a href="first.php">Signout</a></div>
</body>
</html>