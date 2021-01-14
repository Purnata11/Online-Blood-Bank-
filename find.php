<?php 
include 'connect.php';
$msg='';
  if (isset($_POST['find'])) {
  	$name=$_POST['name'];
  	$blood=$_POST['blood'];
  	$disease=$_POST['disease'];
  	$email=$_POST['email'];
  	$phone=$_POST['phone'];
  	$location=$_POST['location'];

  	session_start();
  	$_SESSION['blood']=$blood;
  	$_SESSION['phone']=$phone;
     
    if(!empty($name) && !empty($email) && !empty($blood) && !empty($phone)){
             // passed 1
             if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                //passed 2
                if (filter_var($phone, FILTER_VALIDATE_INT)) {
                        # passed 3
                	// sql kaaj start 
                  if(!$connect){
                          die("Connection failed: ". mysqli_connect_error());
                            }
                   $query = "INSERT INTO seeker(name,blood,disease,email,phone,location) VALUES ('$name', '$blood', '$disease', '$email', '$phone', '$location')";
                   $run=mysqli_query($connect,$query);
                   if($run){
                        header("Location: /project/list.php");
                   }
                   else{
                        echo "error";
                   }
                   // sql er kaaj end
                }
                else{
                // failed 3
                  $msg='Invalid Phone number';
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

  	//header("Location: /project/list.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Finding Donar</title>
	<link rel="stylesheet" href="stylep.css">
</head>
<body>
	<h1>Enter The Following Information To Find A Donar</h1>

<div>
	<form method="post">

	<?php if($msg != ''): ?>
    <div class="alertmsg"><?php echo $msg ?></div>
    <?php endif; ?>
		<div>
			<span>*</span><label>Name:</label>
			<input type="text" name="name" placeholder="Enter Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" required/>
		</div>
		<div>
			<span>*</span><label>Blood Group:</label>
			<input list="blood" type="text" name="blood" placeholder="Enter Blood Type" value="<?php echo isset($_POST['blood']) ? $blood : ''; ?>" required/>
        	<datalist id="blood">
        		<option value="A+"></option>
        		<option value="B+"></option>
        		<option value="O+"></option>
        		<option value="AB+"></option>
        		<option value="A-"></option>
        		<option value="B-"></option>
        		<option value="O-"></option>
        		<option value="AB-"></option>
        	</datalist>
		</div>
		<div>
			<label>Disease:</label>
			<input type="text" name="disease" placeholder="Enter" value="<?php echo isset($_POST['disease']) ? $disease : ''; ?>">
		</div>
		<h3>Contact Information:</h3>
		<div>
			<span>*</span><label>Email:</label>
			<input type="text" name="email" placeholder="Enter email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" required/>
		</div>
		<div>
			<span>*</span><label>Phone:</label>
			<input type="text" name="phone" placeholder="Enter Phone Number" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>" required/>
		</div>
		<div>
			<label>Location:</label>
			<input type="text" name="location" placeholder="Enter Your City" value="<?php echo isset($_POST['location']) ? $location : ''; ?>">
		</div>
		
		<input type="submit" name="find" value="Find Donar">
	</form><br><br><br>
</div>
<a href="first.php">Cancel</a>
</body>
</html>