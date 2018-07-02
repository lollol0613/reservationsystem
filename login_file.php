<?php session_start();
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
</head>
<body>
	<header>
	<div id="logo">
	<a href="home.php" class="home_logo">H</a>
	</div>
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
	<div id="s_bar">
	<a href="#" class="menu" id="about">about</a>
	<a href="booking.php" class="menu" id="booking">booking</a>
	<a href="#" class="menu" id="room">room</a>
	<a href="#" class="menu" id="contact">contact</a>
	</div>
	</header>
	<form action="login_connect_file.php" method="post">
	<h1>LOGIN</h1>
	<div class="container">
	<table>
		<tr>
		<th>User Name</th>
		<td><input type="text" placeholder="Enter your User Name" name="uname" required></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input type="password" name="password" placeholder="Enter your password" required></td>
	</tr>
	<tr>
		<th></th>
		<td><input type="submit" name="login" value="LOGIN">
		</td></tr>
	</table>
</div>
	</form>
</body>
</html>
