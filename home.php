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
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Welcome to O'HOTEL</title>
	<style>
	.home_logo {
		color: #ffffff;
	}
	.home_logo:hover {
		color: #ffd02b;
	}
	.sub_menu {
		color: #ffffff;
	}
	.sub_menu:hover {
		color: #ffd02b;
	}
	</style>
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
	<div id="main">
			<div id="m_con">
				<p id="h_name">O'hotel</p>
				<p id="h_sum"><span style="font-size:108%; font-style:italic; font-weight:bold;">An iconic hotel near central Auckland attractions.</span><br><br>Sleek rooms, gorgeous views, the perfect location - have it all at Hilton Auckland. Our waterfront hotel has sundecks, private balconies and walls of windows for views of the harbour you won't find anywhere else. We're a quick walk from the central business district and Quay Street restaurants, shops and nightlife. Our 24-hour concierge team is happy to set up sightseeing tours during your stay.</p>
				<a href="booking.php" id="b_button"><p id="go_b">BOOK NOW</p></a>
			</div>
	</div>
	<div id="main_a">
		<h1>overview</h1>
		<div id="flex_div">
			<div>
				<img src="images/auckland.jpg" alt="auckland">
				<p class="div_title">Good to know</p>
				<ul>
					<li>2015 TripAdvisor Certificate of Excellence Award winner</li>
					<li>Nautical-style hotel in Princes Wharf set 300 m out to sea</li>
					<li>Outdoor lap pool with underwater viewing window of the harbour</li>
					<li>25 minutes from Auckland Airport (AKL)</li>
				</ul>
		</div>
		<div>
			<img src="images/room.jpg" alt="room">
			<p class="div_title">Light and bright rooms
			</p><br>
			<p class="div_details">Each guest room and suite has floor-to-ceiling windows and a balcony. Enjoy a 32-inch TV, work desk and DVD player, plus a cozy bathrobe and slippers. Book a Bow Suite for a balcony shaped like a luxury cruise liner. Relaxation Suite has a living room, two TVs and 160-degree views of the water.</p>
		</div>
		<div>
			<img src="images/pool.jpg" alt="pool">
			<p class="div_title">Pool with a view
			</p><br>
			<p class="div_details">
			Head for the 4th Floor for one of the most spectacular sights in town. Our heated outdoor lap pool has a window at one end for amazing views of the harbour - the only underwater viewing point in Auckland. After a swim, relax on the sundeck in a lounge chair and enjoy the nice sea breeze.
			</p>
		</div>
		</div>
	</div>
	<footer>
		<div class="footer_wrap">
			<div>
				<p class="footer_title">Learn More</p>
				<ul>
					<li>
						About O'HOTEL
					</li>
					<li>Privacy Policy</li>
					<li>Contact Us</li>
				</ul>
			</div>
			<div>
				<p class="footer_title">Membership</p>
				<ul>
					<li>
						Membership Packages
					</li>
					<li>Events</li>
					<li>Booking</li>
				</ul>
			</div>
			<div>
				<p class="footer_title">Get Inspired</p>
				<ul>
					<li>facebook</li>
					<li>instagram</li>
					<li>twitter</li>
					<li>Youtube</li>
				</ul>
			</div>
		</div>
		<div id="copyright">
			<p>© Copyright Riana. All Rights Reserved.</p>
		</div>
	</footer>
</body>
</html>