<?php
session_start();
include 'header.php';
include 'auth.php';

if(isset($_POST["srequiry"]))
{
$_SESSION['srequiry'] = $_POST["srequiry"];
}else{
$_SESSION['srequiry'] = "";
}

mysql_query("INSERT INTO booking (total_adult, total_children, checkin_date, checkout_date, special_requirement, payment_status, total_amount)
VALUES ('".$_SESSION['adults']."' , '".$_SESSION['childrens']."', '".$_SESSION['checkin_db']."', '".$_SESSION['checkout_db']."', '".$_SESSION['srequiry']."', 'pending', '".$_SESSION['total_amount']."')");
echo mysql_error();

$_SESSION['booking_id'] = mysql_insert_id();

$count = 0;

foreach ($_SESSION['room_id'] as $value0  ) {
mysql_query("INSERT INTO roombook (booking_id, room_id, totalroombook, uname, extrabed) VALUES ('".$_SESSION['booking_id']."', '".$value0."', '".$_SESSION['roomqty'][$count]."', '".$_SESSION['uname']."','".$_SESSION['bedqty'][$count]."');");
echo mysql_error();
$count = $count+1;
};

$id=$_SESSION['uname'];
$userrecord=mysql_query("select * from member where uname='$id'");
if(mysql_num_rows($userrecord)>0) {
	while($row=mysql_fetch_array($userrecord)) {
?>
<link rel="stylesheet" type="text/css" href="css/insertbooking.css?ver=1">
<div id="confirm-top">
	<p id="confirmation-title">Confirmation</p>
</div>
<div class="yellow">
</div>
<div id="confirmbg">
	<div id="confirmationletter-wrap">
		<div id="confletter">
			<p><img src="icon/confirm.png" id="coni" alt=""></p>
<p id="confirmmsg">Your reservation is confirmed</p>
<p id="confno">Your reservation number is: <b><?php echo $_SESSION['booking_id'];?></b></p><hr>
<br><br>
<p><span class="cc">Dear </span><?php echo $row['fname'];?> <?php echo $row['lname'];?></p><br>
<p><span class="cc">Total </span><b><?php echo $_SESSION['total_night'];?></b><span class="cc"> night stay(s)</span></p>
<p><span class="cc">Check-in : </span><b><?php echo $_SESSION['checkin_date'];?></b></p>
<p><span class="cc">Check-out : </span><b><?php echo $_SESSION['checkout_date'];?></b></p>
<p><span class="cc">No. of Guest : </span><b> <?php echo $_SESSION['adults'];?></b> Adult(s) and <b><?php echo $_SESSION['childrens'];?></b> Child(s)</p>
<p><span class="cc">Contact Detail : </span><?php echo $row['contact'];?></p>
<p><span class="cc">Email : </span><?php echo $row['email'];?></p>
<?php
$count = 0;
foreach ($_SESSION['room_id'] as $value0  ) {
	?>
<p><span class="cc">Selected Rooms : </span><?php echo $_SESSION['roomqty'][$count];?><span> </span><?php echo $_SESSION['roomname'][$count];?></p>
<p><span class="cc">Price per night : </span>NZD <b><?php echo $_SESSION['ind_rate'][$count];?></b></p>
<?php
$count = $count+1;
};?>
<p><span class="cc">Total : NZD </span><b><?php echo $_SESSION['total_amount'];?></b></p><br>
<!--<p>15% Deposit Due : NZD <?php //echo $_SESSION['deposit'];?>-->
<?php
}
}
?>
<a href="home.php"><button id="homeB" type="button">GO HOME</button></a>
</div>
</div>
</div>
<?php include 'footer.php';?>