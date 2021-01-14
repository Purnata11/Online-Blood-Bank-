<?php 
include 'connect.php';
  session_start();
   $blood=$_SESSION['blood'];
   $phone=$_SESSION['phone'];

   $body="Blood needed URGENTLY! Contact: ".$phone;

 $sql="select * from donar where blood='$blood'";
 $result=mysqli_query($connect,$sql)
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>List of Available Donars</title>
	<link rel="stylesheet" href="stylep.css">
</head>
<body>
 <h1>List of Donars</h1>
  
  <table>
  	<tr>
  		<th>Name</th>
  		<th>Gender</th>
  		<th>Blood Group</th>
  		<th>Last Donated</th>
  		<th>Location</th>
  		<th>Contact</th>
  	</tr>
    <?php 
          while($rows=mysqli_fetch_assoc($result)){
         ?>
  	<tr>
  		<td><?php echo $rows['name'] ?></td>
      <td><?php echo $rows['gender'] ?></td>
      <td><?php echo $rows['blood'] ?></td>
      <td><?php echo $rows['last'] ?></td>
      <td><?php echo $rows['location'] ?></td>
      <td><a class="edi" href="mailto:<?php echo $rows['email']; ?> ?body=<?php echo $body; ?>">Send Mail</a></td>
  	</tr>
    <?php } ?>
  </table><br><br><br>

  <div><a href="first.php">Exit</a></div>

</body>
</html>