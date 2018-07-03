<?php
session_start();
if(isset($_POST["checkin"]) && !empty($_POST["checkin"]) && isset($_POST["checkout"]) && !empty($_POST["checkout"])){
	$_SESSION['checkin_date'] = date('d-m-y', strtotime($_POST['checkin'])); 
	$_SESSION['checkout_date'] = date('d-m-y', strtotime($_POST['checkout']));
	$_SESSION['checkin_db'] = date('y-m-d', strtotime($_POST['checkin'])); 
	$_SESSION['checkout_db'] = date('y-m-d', strtotime($_POST['checkout']));
	$_SESSION['datetime1'] = new DateTime($_SESSION['checkin_db']);
	$_SESSION['datetime2'] = new DateTime($_SESSION['checkout_db']);
	$_SESSION['checkin_unformat'] = $_POST["checkin"]; 
	$_SESSION['checkout_unformat'] = $_POST["checkout"];
	$_SESSION['interval'] = $_SESSION['datetime1']->diff($_SESSION['datetime2']);
	$_SESSION['total_night'] = $_SESSION['interval']->format('%d');
}
if(isset( $_POST["totaladults"] ) ){
$_SESSION['adults'] = $_POST["totaladults"];
}

if(isset( $_POST["totalchildrens"] ) ){
$_SESSION['childrens'] = $_POST["totalchildrens"];
}
include 'header.php';
?>
<link rel="stylesheet" type="text/css" href="css/checkroom.css?ver=1">
<div class="checkroom-top">
	<p id="checkroom-title">CHECK YOUR ROOMS</p>
</div>
<div class="yellow">
</div>
<div class="result_wrap">
	<div class="flex">
		<div id="flex_reservation">
			<p id="reservation-title">Your Reservation</p>
			<form action="unsetbookingdate.php" method="post">
				<p><span class="rmenu">Check In : </span><?php echo $_SESSION['checkin_date'];?></p>
				<p><span class="rmenu">Check Out : </span><?php echo $_SESSION['checkout_date'];?></p>
				<p><span class="rmenu">Adults : </span><?php echo $_SESSION['adults'];?></p>
				<p><span class="rmenu">Childrens : <?php echo $_SESSION['childrens'];?></span></p>
				<p><span class="rmenu">No. of Night Stay(s) : </span><?php echo  $_SESSION['total_night'];?></p>
				<p style="text-align:center;"><button name="submit" id="editB" href="#">Edit Reservation</button></p>
			</form>
			<div id="roomselected" style="display:none; text-align:center;" >
				<label for="submit-form" id="bookB" href="#">Proceed To Book</label>
			</div>
		</div>
		<div class="flex_roomchoose">
<?php
	include './auth.php';
	// check available room
	$datestart =  date('y-m-d', strtotime($_SESSION['checkin_unformat']) );
	$dateend =  date('y-m-d', strtotime($_SESSION['checkout_unformat']));
	$result = mysql_query("SELECT r.room_id, (r.total_room-br.total) as availableroom from room as r LEFT JOIN (SELECT roombook.room_id, sum(roombook.totalroombook) as total from roombook where roombook.booking_id IN (SELECT b.booking_id as booking_id from booking as b where (b.checkin_date between '".$datestart."' AND '".$dateend."') 
		OR (b.checkout_date between '".$dateend."' AND '".$datestart."'))group by roombook.room_id)as br ON r.room_id = br.room_id");
	echo mysql_error();
		
	if(mysql_num_rows($result) > 0){ ?>
			<p><h1>Choose Your Room</h1></p>
			<div class="roomdetails">
			<form action="reservationform.php" method="post">
	<?php
	while ($row = mysql_fetch_array($result)) {
		if($row['availableroom'] != null && $row['availableroom'] > 0  ) {
		$sub_result = mysql_query("select room.* from room where room.room_id = ".$row['room_id']." ");
		if(mysql_num_rows($sub_result) > 0) {
			while($sub_row = mysql_fetch_array($sub_result)){
				?>
					<img src="<?php echo $sub_row['imgpath'];?>" class="roomimg">
				<p><span class="roomname"><?php echo $sub_row['room_name'];?></span></p>
				<section class="roominfo">
					<p class="desc"><?php echo $sub_row['descriptions'];?></p>
								<span class="ro">Occupancy : </span><?php echo $sub_row['occupancy'];?><br>
								<span class="ro">Size : </span> <?php echo $sub_row['size'];?><br>
								<span class="ro">View : </span> <?php echo $sub_row['view'];?><br>
								<span class="ro">Rate : NZD </span><?php echo $sub_row['rate'];?>/ night<br>
								<span class="ro"><?php echo $row['availableroom'];?></span> room available
								<label>
								<select style="width:70px;padding: 12px 20px;margin:5px 15px;box-sizing:border-box;background-color:#f1f1f1;" name="qtyroom<?php echo $sub_row['room_id'];?>" id="room<?php echo $sub_row['room_id'];?>" onChange="selection(<?php echo $sub_row['room_id'];?>)">
									<option value="0">0</option>
									<?php
									$i = 1;
									while($i <= $row['availableroom']) { ?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php
										$i = $i+1;
										} ?> </select></label>
								<p><span class="ro">Extra bed : </span><select style="width:70px;padding: 12px 20px;margin:5px 15px;box-sizing:border-box;background-color:#f1f1f1;name="extrabed<?php echo $sub_row['room_id'];?>" id="bed<?php echo $sub_row['room_id'];?>" onChange="selection(<?php echo $sub_row['room_id'];?>"><option value="0">0</option>
									<?php $i = 1;
									while($i <= $sub_row['bed']) {
										?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php
										$i = $i+1;
									}?>
									</select>
									<span>/ NZD <?php echo $sub_row['extrabed_rate'];?> per night</span>
							    <input type=hidden name="selectedroom<?php $sub_row['room_id'];?>" id="selectedroom<?php $sub_row['room_id'];?>" value="<?php $sub_row['room_id'];?>">
								<input type=hidden name="room_name<?php $sub_row['room_id'];?>" id="room_name<?php $sub_row['room_id'];?>" value="<?php $sub_row['room_name'];?>">
							</section>
								<?php
								}
								
							}
						}
						else if($row['availableroom'] == null ){
							$sub_result2 = mysql_query("select room.* from room where room.room_id = ".$row['room_id']." ");
							if(mysql_num_rows($sub_result2) > 0)
							{
								while($sub_row2 = mysql_fetch_array($sub_result2)){
								?>
									<img src="<?php echo $sub_row2['imgpath'];?>" class="roomimg">
								<p><span class="roomname"><?php echo $sub_row2['room_name'];?></span></p>
								<section class="roominfo">
									<p class="desc"><?php echo $sub_row2['descriptions'];?></p>
									<span class="ro">Occupancy : </span><?php echo $sub_row2['occupancy'];?><br>
										<span class="ro">Size : </span><?php echo $sub_row2['size'];?><br>
								<span class="ro">View : </span><?php echo $sub_row2['view'];?><br>
								<span class="ro">Rate : NZD </span><br><?php echo $sub_row2['rate'];?> <span> / night</span><br>
								<p><span class="ro"><?php echo $sub_row2['total_room'];?></span> room available <label>
									<select style="width:70px;padding: 12px 20px;margin:5px 15px;box-sizing:border-box;background-color:#f1f1f1;" name="qtyroom<?php echo $sub_row2['room_id'];?>"  id="room<?php echo $sub_row2['room_id'];?>" onChange="selection(<?php echo $sub_row2['room_id'];?>)">
								<option value="0">0</option>
								<?php $i = 1;
										while($i <= $sub_row2['total_room']) {
								?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
									$i = $i+1; }
								?></select></label>
								<p><span class="ro">Extra bed : </span><select style="width:70px;padding: 12px 20px;margin:5px 15px;box-sizing:border-box;background-color:#f1f1f1;" name="extrabed<?php echo $sub_row2['room_id'];?>" id="bed<?php echo $sub_row2['room_id'];?>" onChange="selection(<?php echo $sub_row2['room_id'];?>"><option value="0">0</option>
									<?php $i = 1;
									while($i <= $sub_row2['bed']) {
										?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php
										$i = $i+1;
									}?>
									</select><span>/ NZD <?php echo $sub_row2['extrabed_rate'];?> per night and per bed</span></p>
								<input type=hidden name="selectedroom<?php echo $sub_row2['room_id'];?>" value="<?php echo $sub_row2['room_id'];?>">
								<input type=hidden name="room_name<?php echo $sub_row2['room_id'];?>" value="<?php echo $sub_row2['room_name'];?>">
							</section>
								<?php
								}
							}		
						}
					}
				}		
				else {
				echo "<p><b>No room available</b></p><hr>";
				}?>
			</div>
				<button type="submit" id="submit-form" style="display:none;">Book</button></form>
			</div>
		</div>
	</div>
<script>
function selection(id) {
	var e = document.getElementById('roomselected').style.display='block';
}
</script>
<?php include 'footer.php';?>