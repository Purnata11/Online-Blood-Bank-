<?php 
include 'connect.php';
$id=$_REQUEST['id'];
 
 if (isset($_POST['delete'])) {
  
  $sql="DELETE FROM donar WHERE id='$id'";
  $run=mysqli_query($connect,$sql); 

   if($run){
    // echo "Successful";
    header("Location: /project/first.php");
   }
   else{
    // echo "eror";
   }
 	}
  if (isset($_POST['cancel'])){
    header("Location: /project/donar.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Delete Acoount</title>
	<link rel="stylesheet" href="stylep.css">
</head>
<body>
	<h1>Online Blood Bank!</h1>

<div>
	<form method="post">
		<h2>Are you sure you want to delete your account?</h2>

    <div><input type="submit" name="delete" value="Delete">
		<input type="submit" name="cancel" value="Cancel"></div>
	</form>
</div>

</body>
</html>