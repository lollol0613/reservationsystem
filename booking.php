<?php session_start(); ?>
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
	<?php
		if((isset($_SESSION["logged"]))
		and ($_SESSION["logged"] == "yes")) {
	?>
	<div class="center_container">
	<h1>BOOKING YOUR STAY</h1>
	<div class="container">
		<form method="post" action="booking_welcome.php">
		<table class="h_table">
			<tr>
				<th></th>
				<td class="ass" style="text-align:right;">*required filed</td>
			</tr>
			<tr>
				<th>First Name</th>
				<td><input type="text" placeholder="Enter your first name" name="fname" required autofocus></td>
				<td class="ass">*</td>
				</tr>
			<tr>
				<th>Last Name</th>
				<td><input type="text" name="lname" placeholder="Enter your last name" required></td>
				<td class="ass">*</td>
			</tr>
			<tr>
				<th>Contact</th>
				<td><input type="text" name="contact" placeholder="Enter your contact number without hypen(-)" required></td>
				<td class="ass">*</td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="email" name="email" placeholder="Enter your email address" required></td>
				<td class="ass">*</td>
			</tr>
			<tr>
				<th>Room Type</th>
				<td><select name="rtype">
					<option selected>Room A</option>
					<option>Room B</option>
					<option>Room C</option>
					<option>Room D</option>
				</select></td>
			</tr>
			<tr>
				<th>Comment</th>
				<td><textarea placeholder="Enter your comment" name="comment"></textarea></td>
			</tr>
			<tr>
				<th></th>
				<td style="text-align:right;"><input type="submit" name="submit" value="Make a reservation"></td>
			</tr>
		</table>
	</form>
</div>
</div>
<?php
	} else {
?>
	<script>
		alert("Sorry, you must be logged in to book a room.");
		window.history.back();
	</script>
	<?php
}
?>
</body>
</html>