<?php
session_start();
include 'header.php';
include 'auth.php';
if(!isset($_SESSION['room_id'])) {
	$_SESSION['room_id'] = array();
	$_SESSION['roomname'] = array();
	$_SESSION['roomqty'] = array();
	$_SESSION['bedqty'] = array();
	$_SESSION['ind_rate'] = array();
	$_SESSION['total_amount'] = 0;
	$_SESSION['extra_amount'] = 0;
	//$_SESSION['deposit'] = 0;
}
$result=mysql_query("select * from room");
if(mysql_num_rows($result)>0) {
	$count=0;
	while ($row = mysql_fetch_array($result)) {
		if(isset($_POST["qtyroom".$row['room_id'].""])&&!empty($_POST["qtyroom".$row['room_id'].""])) {
			$_SESSION['room_id'][$count] = $_POST["selectedroom".$row['room_id'].""];
			$_SESSION['roomqty'][$count] = $_POST["qtyroom".$row['room_id'].""];
			$_SESSION['bedqty'][$count] = $_POST["extrabed".$row['room_id'.""]];
			$_SESSION['roomname'][$count] = $_POST["room_name".$row['room_id'].""];
			$_SESSION['ind_rate'][$count] = $row['rate']  * $_POST["qtyroom".$row['room_id'].""];
			$_SESSION['extra_amount'] = $row['extrabed_rate'] * $_POST["extrabed".$row['room_id'].""];
			$_SESSION['total_amount'] =  ( $row['rate']  * $_POST["qtyroom".$row['room_id'].""] * $_SESSION['total_night'] ) + ($row['extrabed_rate']*$_POST["extrabed".$row['room_id'].""]*$_SESSION['total_night']) + $_SESSION['total_amount'] ;
			//$_SESSION['deposit'] = $_SESSION['total_amount'] * 0.15;
			$count = $count + 1;
		}
	}
}
?>
<link rel="stylesheet" tyep="text/css" href="css/reservation.css?ver=1">
<div id="reservation-top">
	<p id="reservation-message">VISIT US CLOSELY</p>
</div>
<div class="yellow">
</div>
<div id="reservation-main">
	<div id="re-flex">
		<div id="re-check">
<p id="reservation-title">Your Reservation</p>
<form id="re-bar" name="details" action="unsetroomchosen.php" method="post">
<p><span class="rmenu">Check In : </span><?php echo $_SESSION['checkin_date'];?></p>
<p><span class="rmenu">Check Out : </span><?php echo $_SESSION['checkout_date'];?></p>
<p><span class="rmenu">Adults : </span><?php echo $_SESSION['adults'];?></p>
<p><span class="rmenu">Childrens : </span><?php echo $_SESSION['childrens'];?></p>
<p><span class="rmenu">No. of Night Stay(s) : </span><?php echo $_SESSION['total_night'];?></p>
<p><span class="rmenu">Room Selected : </span><?php
foreach ($_SESSION['roomname'] as $value0 ) {
	echo $value0;
	echo "<br>";
};?></p>
<p><span class="rmenu">Qty :
	</span><?php 
foreach ($_SESSION['roomqty'] as $value1 ) {
	echo $value1;
	echo "<br>";
};?></p>
<p><span class="rmenu">No. of Extra beds : </span>
<?php 
foreach ($_SESSION['bedqty'] as $value2 ) {
	echo $value2;
	echo "<br>";
};?></p>
<!--<p>15% Deposit Due Now : NZD <?php //echo $_SESSION['deposit'];*/?></p>-->
<p><span class="rmenu">Total : NZD </span><b><?php echo $_SESSION['total_amount'];?></b></p>
<p style="text-align:center;"><button id="editB" name="submit" href="#">Edit Reservation</button></p>
</form>
</div>
<div id="re-guestinfo">
<h1>GUEST Information</h1>
	<p id="confirmmsg">" Please check your information same as below "</p>
<div id="guestinfo">
<form action="insertbooking.php" method="post" onSubmit="return validateForm(this);">
	<?php
	$id=$_SESSION['uname'];
	$userrecord = mysql_query("select * from member where uname='$id'");
	if(mysql_num_rows($userrecord)>0) {
		while($row=mysql_fetch_array($userrecord)) {
			?>
			<p>First Name : <span class="guest"><?php echo $row['fname'];?></span></p>
			<p>Last Name : <span class="guest"><?php echo $row['lname'];?></span></p>
			<p>Contact No. : <span class="guest"><?php echo $row['contact'];?></span></p>
			<p>Email : <span class="guest"><?php echo $row['email'];?></span></p>
<?php
	}
}
?>
<br>
<p><span class="guest">Special requirement</span></p>
<textarea name="srequiry"></textarea>
<br>
<p style="text-align:right;"><button id="bookB" type="submit">Confirm</button></p>
</form>
</div>
</div>
</div>
</div>
<?php include 'footer.php';?>