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
	<link rel="stylesheet" type="text/css" href="css/basic.css?ver=1">
	<link rel="stylesheet" href="css/jquery-ui.css?ver=1">
	<script type="text/javascript" src="js/nav.js"></script>
	<!--<script type="text/javascript" src="button_animation.js"></script>-->
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<title>Welcome to O'HOTEL</title>
</head>
<body>
	<header>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="home.php">HOME</a>
			<a href="#">About</a>
			<a href="#">Room</a>
			<a href="booking.php">Booking</a>
			<a href="#">Contact</a>
		</div>
		<div class="backimg" id="main">
		<div id="main_top">
			<span onclick="openNav()" id="menu_icon">&#9776;</span>
			<a href="home.php"><img src="images/hotel_logo.gif" id="logo" alt="O'HOTEL"></a>
		</div>
			<div id="login_bar">
		<?php
		if((isset($_SESSION["logged"]))
		and ($_SESSION["logged"] == "yes")) {
			?>
		<button class="sub_menu" onmouseover="this.innerText='LOGOUT'" onmouseout="this.innerText='OUT'" onclick="location.href='logout.php'">OUT</button>
		<?php
		include 'auth.php';
		if($_SESSION['uname']=='test') {?>
		<button class="sub_menu" onmouseover="this.innerText='ADMIN PAGE'" onmouseout="this.innerText='ADMIN'" onclick="location.href='admin.php'">ADMIN</button>
		<?php
	}} else {
		include 'login.php';
		?>
		<button class="sub_menu" onmouseover="this.innerText='LOGIN'" onmouseout="this.innerText='IN'" onclick="document.getElementById('loginModal').style.display='block'" style="width:auto;">IN</button>
		<a href="signup.php"><button class="sub_menu" onmouseover="this.innerText='SIGN UP'" onmouseout="this.innerText='UP'">UP</button></a>
		<?php
	}
	?>
	</div>
</header>