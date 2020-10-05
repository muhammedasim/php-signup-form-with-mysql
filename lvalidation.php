<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="lvstyle.css">
</head>

<body>
	
	<div id="RegisterForm">
		
	
		<!-- <?php
	// include('dbconnect.php');
	?> -->
	<?php
	if(isset($_GET['user_Submit']))
	{
		$errorCount=0;
		$errorMsg="<ul>";
		$fname=$_GET['user_FirstName'];
		$lname=$_GET['user_LastName'];
		$phone=$_GET['user_Mobile'];
		$email=$_GET['user_Email'];
		$password=$_GET['Password'];
		$confrmpassword=$_GET['user_Password2'];
		if(isset($_GET['checkbx']))
		{
			$checkbx=$_GET['checkbx'];
		}
		else
		{
			$checkbx="";
		}
		if(isset($_GET['gender']))
		{
			$gender=$_GET['gender'];
		}
		else
		{
			$gender="";
		}
		if(empty($fname))
		{
			$errorMsg=$errorMsg ."<li>please enter your firstname</li>";
			$errorCount++;
		}
		if(empty($lname))
		{
			$errorMsg=$errorMsg ."<li>please enter your lastname</li>";
			$errorCount++;
		}
		if(empty($phone))
		{
			$errorMsg=$errorMsg ."<li>please enter your phone number</li>";
			$errorCount++;
		}
	/*	else
		{
			$phonereg=(!preg_match("/^(\+[9][1])??([789]\d{2})?\-?(\d{7})$/",$phone))
		}*/
		if(empty($email))
		{
			$errorMsg=$errorMsg ."<li>please enter your email";
			$errorCount++;
		}
		elseif(!preg_match('/\A[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}\z/', $email))
		{
			$errorMsg=$errorMsg ."<li>please enter a valid email";
			$errorCount++;
		}
		if(empty($password))
		{
			$errorMsg=$errorMsg ."<li>please enter your password";
			$errorCount++;
		}
		
		if(empty($confrmpassword))
		{
			$errorMsg=$errorMsg ."<li>please re enter your password";
			$errorCount++;
		}
		if(empty($gender))
		{
			$errorMsg=$errorMsg ."<li>please select your gender";
			$errorCount++;
		}
		if(empty($checkbx))
		{
			$errorMsg=$errorMsg ."<li>please agree the terms and conditions";
			$errorCount++;
		}
		$errorMsg=$errorMsg ."</ul>";
		
		if($errorCount>0)
		{
			echo "<div class='error'>You have {$errorCount} no of errors {$errorMsg}</div>";
		}
		else
		{
			echo "<div class='sucess'>sucessfully registered</div>";
		}
		$query="INSERT INTO `useraccount`(`fname`, `lname`, `phone`, `password`, `gender`, `subscription`, `email`) VALUES ('".$fname."','".$lname."','".$phone."','".$password."','".$gender."','".$email."')";
		$res=mysqli_query($link,"$query");
	
				function encryptpwd()
				{
					$pwd=$_GET['Password'];
					$hash_format="$#5$";
					$encryptd=$hash_format.$pwd;
					$salt=generateSalt();
					$mixture=crypt($encryptd,$salt);
					//echo $mixture;
				}
				function generateSalt()
				{
					$uniqueString=md5(uniqid(mt_rand()),true);
					$base64String=base64_encode($uniqueString);
					$substring=substr($base64String, 0,22);
					return($substring);
				}
				return(encryptpwd());
		
		}

		
	?>

		<form name="signUpReg" action="" method="get">
		<h2>SignUp Your Account</h2>
		<label for="user_FirstName">First Name</label>
		<input type="text" id="user_FirstName" name="user_FirstName" placeholder="Enter your First Name">
		<label for="user_LastName">Last Name</label>
		<input type="text" id="user_LastName" name="user_LastName" placeholder="Enter your Last Name">
		<label for="user_Mobile">Mobile Number</label>
		<input type="text" id="user_Mobile" name="user_Mobile" placeholder="+91-">
		<label for="user_Email">Email Address</label>
		<input type="text" id="user_Email" name="user_Email" placeholder="Enter your email">
		<label for="user_Password">Password</label>
		<input type="password" id="user_Password" name="Password" placeholder="Enter Password">
		<label for="user_Password">Confirm Password</label>
		<input type="password" id="user_Password" name="user_Password2" placeholder="Confirm Password">
		<input type="radio" name="gender">male
		<input type="radio" name="gender">female 
		<label></label>
		<input type="checkbox" name="checkbx">I am agree the terms and condition
		<input type="submit" id="user_Submit" name="user_Submit" value="Submit">
		</form>
	</div>
	

</body>
</html>