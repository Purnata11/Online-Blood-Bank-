<?php 
include 'connect.php';
 $msg='';
 if (isset($_POST['register'])) {
       $name=$_POST['name'];
       $email=$_POST['email'];
       $blood=$_POST['blood'];
       $gender=$_POST['gender'];
       $birth=$_POST['birth'];
       $phone=$_POST['phone'];
       $last=$_POST['last'];
       $disease=$_POST['disease'];
       $location=$_POST['location'];
   
    session_start();
     $_SESSION['email']=$email;
     $_SESSION['name']=$name;

     $search_query= "select * from donar where email='$email'";
     $search_result= mysqli_query($connect,$search_query);
     if($search_result){ 
        //echo "works";
     while($rows=mysqli_fetch_assoc($search_result)){
        $newemail=$rows['email'];
        }
       }

       if(!empty($name) && !empty($email) && !empty($blood) && !empty($gender) && !empty($last) && !empty($location)){
             // passed 1
             if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                //passed 2
                if (filter_var($phone, FILTER_VALIDATE_INT)) {
                        # passed 3

                   if ($newemail==$email){
                                // failed 4
                         $msg='This email already has an account';
                        }
                     else{
                        // passed 4
                         // sql kaaj start 
                         if(!$connect){
                          die("Connection failed: ". mysqli_connect_error());
                            }
                         $query = "INSERT INTO donar(name,email,blood,gender,birth,phone,last,disease,location) VALUES ('$name', '$email', '$blood', '$gender', '$birth', '$phone', '$last', '$disease', '$location')";
                         $run=mysqli_query($connect,$query);
                       if($run){
                          header("Location: /project/donar.php");

                        }
                        else{
                          echo "error";
                         }
                         mysqli_close($connect);
                         // sql er kaaj end
                        }
                  
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

  //header("Location: /project/donar.php");
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Resgistration</title>
     <link rel="stylesheet" href="stylep.css">
</head>
<body>
	<h1>Register as a Donar</h1>

<div>
	<form method="post">
		<h2>Enter The Following Information</h2>

    <?php if($msg != ''): ?>
    <div class="alertmsg"><?php echo $msg ?></div>
    <?php endif; ?>

		<div>
             <label>Name:<span>*</span></label>
			<input type="text" name="name" placeholder="Enter Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" required/>
        </div>
        <div>
        	<label>Email:<span>*</span></label>
        	<input type="text" name="email" placeholder="Enter Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" required/>
        </div>
        <div>
        	<label>Blood Group:<span>*</span></label>
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
        	<label>Gender:<span>*</span></label>
        	<input list="gender" type="text" name="gender" placeholder="Select Gender" value="<?php echo isset($_POST['gender']) ? $gender : ''; ?>" required/>
                <datalist id="gender">
                        <option value="Male"></option>
                        <option value="Female"></option>
                        <option value="Other"></option>
                </datalist>
        	
        </div>
        <div>
        	<label>Date Of Birth:<span>*</span></label>
        	<input type="date" name="birth" value="<?php echo isset($_POST['birth']) ? $birth : ''; ?>" required/>
        </div>
        <div>
        	<label>Phone Number:</label>
        	<input type="text" name="phone" placeholder="Enter phone number" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>">
        </div>
        <div>
        	<label>Last Donated:<span>*</span></label>
        	<input type="date" name="last" value="<?php echo isset($_POST['last']) ? $last : ''; ?>" required/>
        </div>
        <div>
        	<label>Underlying disease:</label>
        	<input type="text" name="disease" placeholder="Enter if any" value="<?php echo isset($_POST['disease']) ? $disease : ''; ?>">
        </div>
        <div>
                <label>Location:<span>*</span></label>
                <input type="text" name="location" placeholder="Enter Your City" value="<?php echo isset($_POST['location']) ? $location : ''; ?>" required/>
        </div>
		<input type="submit" name="register" value="Register">
	</form><br><br><br>
</div>
<a href="first.php">Cancel</a>
</body>
</html>