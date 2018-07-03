<?php 
session_start();
include 'header.php';?>
<link rel="stylesheet" type="text/css" href="css/admin.css?ver=1">
<div class="admin-top">
	<p id="admin-title">Administration Page</p>
</div>
<div class="yellow">
</div>
<?php
if($_SESSION['uname']='test') { ?>
<div class="adminresult">
	<?php
	include 'auth.php';

	$sql2 = mysql_query("select count(booking_id) as total from booking");
	if(mysql_num_rows($sql2) > 0) {
		while($row = mysql_fetch_array($sql2)) {
			?>
			<p id="totalbooking">Total booking : <span id="result"><?php echo $row['total'];?></span></p>
	<?php	}
	}
	?>
</div>
	<div class="bookingdetails">
		<div>
		<table class="bookingtable">
			<thead>
				<tr>
				<th>Booking No.</th>
				<th>Check In</th>
				<th>Check Out</th>
				<th>Adults</th>
				<th>Children</th>
				<th>Special Requirement</th>
				<th>Total Amount</th>
				<th>Payment Status</th>
				<th>Booking Date</th>
				<th>User Name</th>
				<th>Room</th>
				<th>Extra Bed</th>
			</tr>
			</thead>
			<tbody class="bookinginfo">
				<?php
				include 'auth.php';
					$sql = mysql_query("select * from booking left join roombook on booking.booking_id = roombook.booking_id;");
					if(mysql_num_rows($sql) > 0) {				
						while($row = mysql_fetch_array($sql)) {
							echo "<tr><td>".$row['booking_id']."</td>";
							echo "<td>".$row['checkin_date']."</td>";
							echo "<td>".$row['checkout_date']."</td>";
							echo "<td>".$row['total_adult']."</td>";
							echo "<td>".$row['total_children']."</td>";
							echo "<td>".$row['special_requirement']."</td>";
							echo "<td>".$row['total_amount']."</td>";
							echo "<td>".$row['payment_status']."</td>";
							echo "<td>".$row['booking_date']."</td>";
							echo "<td>".$row['uname']."</td>";
							echo "<td>".$row['room_id']."</td>";
							echo "<td>".$row['extrabed']."</td>";
						}
					}
			?>
			</tbody>
		</table>
	</div>
	</div>
<?php } else {
	$errormsg = "This is administration page. Wrong connection.";
	echo "<script type='text/javascript'>
	if('$errormsg'!='') {
		self.window.alert('$errormsg');
	}
	location.href='home.php';</script>";
}?>
<?php include 'footer.php';?>
