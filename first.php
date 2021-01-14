<?php 
include 'connect.php';
$msg='';
$newemail='';
$newname='';
 if (isset($_POST['signup'])) {
 	$name=$_POST['name'];
 	$email=$_POST['email'];

 	session_start();
 	$_SESSION['name']=htmlentities($name);
 	$_SESSION['email']=htmlentities($email);

 	$search_query= "select * from donar where email='$email' and name='$name'";
     $search_result= mysqli_query($connect,$search_query);
     if($search_result){ 
        //echo "works";
     while($rows=mysqli_fetch_assoc($search_result)){
        $newemail=$rows['email'];
        $newname=$rows['name'];
        }
       }


    if(!empty($name) && !empty($email)){
             // passed 1
             if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                //passed 2

                if($newname==$name && $newemail==$email){
                	//passed3
                	header("Location: /project/donar.php");
                }
              else{
              	//failed 3
              	$msg="Incorrect name or email";
              }  
             }
             else{
                //failed 2
                $msg='Email is Invalid';
             }
       }
       else {
           // failed 1
          $msg='Fill out the required fields';
       }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Online Blood Bank</title>
	<link rel="stylesheet" href="stylep.css">
</head>
<body>
	<h1>Online Blood Bank</h1>

<div>
	<form method="post">
		<h2>Login as a Donor</h2>

		<?php if($msg != ''): ?>
        <div class="alertmsg"><?php echo $msg ?></div>
        <?php endif; ?>

		<div><label>Enter Name:</label>
			<input type="text" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" required/>
		</div>

		<div><label>Enter Email:</label>
			<input type="text" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" required/>
		</div>
		<div><input type="submit" name="signup" value="Sign Up"></div>
	</form><br><br><br>
</div>
<div><a href="register.php">Register as a Donor!</a></div><br><br><br>
<div><a href="find.php">Find a Donar</a></div>
</body>
</html>