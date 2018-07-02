<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Mihyun Raina Ji">
	<meta name="Reply-to" content="mhrainaji@gmail.com">
	<!--아이폰 웹페이지에서 전체화면으로 동작하도록 해주는 기능-->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!--이미지에 툴바 안 생기게 하기-->
	<meta http-equiv="Imagetoolbar" content="no">
	<!--자동으로 전화번호 혹은 이메일 주소 링크되는 거(스타일이 안 먹음) 막기-->
	<meta name="format-detection" content="no">	
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<title>Welcome to O'HOTEL</title>
	<style>
	.ass {
	color: red;
	font-size: 70%;
}
label {
	font-family: 'Rajdhani', sans-serif;
	color: #595757;
	width: 150px;
	padding: 5px;
}
.form_wrap {
	margin: 0 auto;
	width: 480px;
	padding-left: 30px;
	line-height: 30px;
}
</style>
</head>
<body>
	<?php
	$fnameErr=$lnameErr=$conErr=$emailErr=$addErr=$idErr=$passErr="";
	$fname=$lname=$contact=$email=$address=$uname=$password=$process="";

	if(isset($_POST['vali'])==1) {
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$contact=$_POST["contact"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		$uname=$_POST["uname"];
		$password=$_POST["password"];
		
		if(empty($_POST["uname"])) {
	 	$idErr="User Name is required";
	 } else if(empty($_POST["password"])){
	 	$passErr="Password is required";
	} else if(empty($_POST["fname"])) {
	 	$fnameErr="First Name is required";
	 } else if(empty($_POST["lname"])) {
	 	$lnameErr="Last Name is required";
	 } else if(empty($_POST["contact"])) {
	 	$conErr="Contact number is required";
	 } else if(empty($_POST["email"])) {
	 	$emailErr="Email is required";
	 } else if(empty($_POST["address"])) {
	 	$address="";
	 } else {

	$fname=trim($_POST["fname"]);
	$lname=trim($_POST["lname"]);
	$contact=trim($_POST["contact"]);
	$email=trim($_POST["email"]);
	$address=trim($_POST["address"]);
	$uname=trim($_POST["uname"]);
	$password=trim($_POST["password"]);

	$myfile=fopen("member.txt","a+");
	fwrite($myfile,$uname.",".$password.",".$fname.",".$lname.",".$contact.",".$email.",".$address."\n");

	fclose($myfile);

	$login=fopen("login.txt","a+");
	fwrite($login,$uname."/".$password."/"."\n");
	fclose($login);
	
	header("location:login_file.php");
}
} 
	?>
	<header>
	<div id="login_bar">
		<?php
		if((isset($_SESSION["logged"]))
		and ($_SESSION["logged"] == "yes")) {
			?>
		<a href="logout.php" class="sub_menu">Logout</a>
		<?php
	}else {
		?>
		<a href="login_file.php" class="sub_menu">LOGIN</a>
		<span class="sub_menu">|</span>
		<a href="reg_file.php" class="sub_menu">JOIN US</a>
		<?php
	}
	?>
	</div>
	<div id="logo">
	<a href="home.php" class="home_logo">H</a>
	</div>
	<div id="s_bar">
	<a href="#" class="menu" id="about">about</a>
	<a href="booking.php" class="menu" id="booking">booking</a>
	<a href="#" class="menu" id="room">room</a>
	<a href="#" class="menu" id="contact">contact</a>
	</div>
	</header>
	<h1>Join O'HOTEL</h1>
	<div class="container">
		<div class="form_wrap">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="joinForm">
			<label>User Name</label><br>
			<input type="text" name="uname" placeholder="Enter your User Name" value="<?php echo $uname;?>" pattern="[A-Za-z0-9]{1,20}" autofocus>
			<span class="ass">*<?php echo $idErr;?></span><br>
			<label>Password</label><br>
			<input type="password" name="password" pattern="[A-Za-z0-9]{1,20}" placeholder="Enter your Password" value="<?php echo $password;?>">
			<span class="ass">*<?php echo $passErr;?></span><br>
			<label>First Name</label><br>
			<input type="text" name="fname" placeholder="Enter your First Name" value="<?php echo $fname;?>" pattern="[A-Za-z]{1,20}">
			<span class="ass">*<?php echo $fnameErr;?></span><br>
			<label>Last Name</label><br>
			<input type="text" name="lname" placeholder="Enter your Last Name" value="<?php echo $lname;?>" pattern="[A-Za-z]{1,20}"></td>
			<span class="ass">*<?php echo $lnameErr;?></span><br>
			<label>Contact No.</label><br>
			<input type="text" name="contact" placeholder="Enter your Contact Number" value="<?php echo $contact;?>" pattern="[0-9]{1,12}"></td>
			<span class="ass">*<?php echo $conErr;?></span><br>
			<label>Email</label><br>
			<input type="email" name="email" placeholder="Enter your Email Address" value="<?php echo $email;?>">
			<span class="ass">*<?php echo $emailErr;?></span><br>
			<label>Address</label><br>
			<input type="text" name="address" placeholder="Enter your Address" value="<?php echo $address;?>"><br>
			<input type="hidden" name="vali" value="1"><br>
			<input type="submit" value="JOIN">
		</form>
	</div>
	</div>
</body>
</html>