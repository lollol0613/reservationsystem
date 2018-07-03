<?php
session_start();
include 'header.php';

	$fnameErr=$lnameErr=$conErr=$emailErr=$addErr=$idErr=$passErr=$repassErr=$addErr="";
	$fname=$lname=$contact=$email=$address=$uname=$password=$repassword="";

	if(isset($_POST['conf'])==1) {
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$contact=$_POST["contact"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		$uname=$_POST["uname"];
		$password=$_POST["password"];
		$repassword=$_POST["repassword"];
		
		if(empty($_POST["fname"])) {
	 	$fnameErr="First Name is required";
	 }else if(empty($_POST["lname"])) {
	 	$lnameErr="Last Name is required";
	} else if(empty($_POST["uname"])) {
	 	$idErr="ID is required";
	 } else if(empty($_POST["password"])) {
	 	$passErr="Password is required";
	 } else if(empty($_POST["repassword"])) {
	 	$repassErr="Must be confirmed password";
	 } else if($password != $repassword) {
	 	$repassErr="Wrong Password, Please try again";
	 } else if(empty($_POST["contact"])) {
	 	$conErr="Contact number is required";
	 } else if(empty($_POST["email"])) {
	 	$emailErr="Email is required";
	 } else if(empty($_POST["address"])) {
	 	$addErr="Address is required";
	 } else {

	$fname=trim($_POST["fname"]);
	$lname=trim($_POST["lname"]);
	$contact=trim($_POST["contact"]);
	$email=trim($_POST["email"]);
	$address=trim($_POST["address"]);
	$uname=trim($_POST["uname"]);
	$password=trim($_POST["password"]);
	
	// Create connection
	$db = mysqli_connect('localhost','root','','hotel');
	// Check connection
	if ($db->connect_error) {
    	die("Connection failed: ".$db->connect_error);
	}

	$errors=array();

	if (isset($_POST['uname'])) {
		$uname=mysqli_real_escape_string($db, $_POST['uname']);
		$email=mysqli_real_escape_string($db, $_POST['email']);
	}
	$user_check_query="SELECT * FROM member WHERE uname='$uname' or email='$email' LIMIT 1";
	$result=mysqli_query($db, $user_check_query);
	$user=mysqli_fetch_assoc($result);

	if($user) {
		if($user['uname']===$uname) {
			array_push($errors, 'Your ID has already been exist.');
			echo "<script type='text/javascript'>alert('Your ID has already been exist.');</script>";
		}
		if($user['email']===$email) {
			array_pusth($errors, 'Your Email has already been exist.');
			echo "<script type='text/javascript'>alert('Your Eamil has been exist.');";
		}
	}
	if(count($errors)==0) {
		$sql="INSERT INTO member(fname,lname,contact,email,address,uname,password) VALUES('$fname','$lname','$contact','$email','$address','$uname','$password');";
		if($db->query($sql) === TRUE) {
			$okmsg='Complete Successfully';
			echo "<script type='text/javascript'>
			if('$okmsg' != '') {
				self.window.alert('$okmsg');
			}
			location.href = 'home.php';</script>";
		} else {
			echo "<script type='text/javascript'>alert('Error : $db->error');</script>";
		}
		$db->close();
	}
}
}
?>
<link rel="stylesheet" type="text/css" href="css/signup.css?ver=1">
<div class="wrap-form">
<div class="signup-top">
	<p class="signup-title">JOIN US</p>
</div>
<div class="yellow"></div>
<div class="signup_details">
</div>
<div class="signup-form">
	<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="joinForm">
			<p><img src="icon/user.png" class="reg_icon" alt="First Name"><input type="text" placeholder="First Name" name="fname" pattern="[A-Za-z]{1,20}" value="<?php echo $fname;?>"><span class="comp">*<?php echo $fnameErr;?></span></p>
			<p><img src="icon/user.png" class="reg_icon" alt="Last Name"><input type="text" placeholder="Last Name" name="lname" pattern="[A-Za-z]{1,20}" value="<?php echo $lname;?>"><span class="comp">*<?php echo $lnameErr;?></span><br></p>
			<p><img src="icon/user.png" class="reg_icon" alt="User Name"><input type="text" placeholder="ID" name="uname" pattern="[A-Za-z0-9]{4,12}" value="<?php echo $uname;?>"><span class="comp">*<?php echo $idErr;?></span><br></p>
			<p><img src="icon/password.png" class="reg_icon" alt="Password"><input type="password" placeholder="Your Password" name="password" pattern="[A-Za-z0-9]{8,20}" value="<?php echo $password;?>"><span class="comp">*<?php echo $passErr;?></span><br></p>
			<p><img src="icon/repassword.png" class="reg_icon" alt="Confirm Password"><input type="password" placeholder="Confirm Your Password" name="repassword" pattern="[A-Za-z0-9]{8,20}" value="<?php echo $repassword;?>"><span class="comp">*<?php echo $repassErr;?></span><br></p>
			<p><img src="icon/contact.png" class="reg_icon" alt="Contact"><input type="number" placeholder="Contact Number except hypen(-)" name="contact" value="<?php echo $contact;?>"><span class="comp">*<?php echo $conErr;?></span><br></p>
			<p><img src="icon/email.png" class="reg_icon" alt="Email"><input type="email" placeholder="Email Address" name="email" value="<?php echo $email;?>"><span class="comp">*<?php echo $emailErr;?></span><br></p>
			<p><img src="icon/address.png" class="reg_icon" alt="Address"><input type="text" placeholder="Address" name="address" value="<?php echo $address;?>"><span class="comp">*<?php echo $addErr;?></span><br></p>
			<input type="hidden" name="conf" value="1">
			<button type="submit" id="SignupB">SIGN UP</button>
		</form>
		</div>
	</div>
<?php include 'footer.php';?>