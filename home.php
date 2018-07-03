<?php
session_start();
include 'header.php';
unset($_SESSION['room_id']);
unset($_SESSION['roomname']);
unset($_SESSION['roomqty']);
unset($_SESSION['ind_rate']);
unset($_SESSION['total_amount']);
include_once 'createdb.php';
include_once 'createtable.php';
?>
<link rel="stylesheet" type="text/css" href="css/main.css?ver=1">
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
	<?php include 'footer.php';?>