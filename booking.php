<?php
session_start();
include 'header.php';
if((isset($_SESSION["uname"]))
		and ($_SESSION["logged"] == "yes")) {
?>
<script>
	$(document).ready(function() {
		$("#checkin").datepicker(
			{
				showAnimation:'slide',
				showOtherMonths: true,
				selectOtherMonths: true,
				changeMonth: true,
				changeYear: true,
				minDate: new Date(),
				onSelect: function (dateText, inst) {
					var date = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);
					$("#checkout").datepicker("option", "minDate", date);
				}
				//showOn: 'button',
				//buttonImage: 'icon/calendar.png',
				//buttonImageOnly: true;
			});
		$("#checkout").datepicker(
		{
				showAnimation:'slide',
				showOtherMonths: true,
				selectOtherMonths: true,
				changeMonth: true,
				changeYear: true
			});
	});
</script>
<link rel="stylesheet" type="text/css" href="css/booking.css?ver=1">
<div class="wrap-form">
<div class="booking-top">
	<p class="menu-title">BOOKING YOUR STAY</p>
</div>
<div class="yellow"></div>
<div class="wrapper">
	<div class="booking-form">
		<form action="checkroom.php" method="post" name="bookingForm" onSubmit="return validateForm(this)">
			<p><span>Check-In  :</span><input type="text" id="checkin" name="checkin"><!--<img src="icon/calendar.png" class="calendar_icon" id="checkinC" alt="Check In">--></p>
			<p><span>Check-Out:</span><input type="text" id="checkout" name="checkout"><!--<img src="icon/calendar.png" id="checkoutC" class="calendar_icon" alt="Check In">--></p>
			<p>Adults : <select name="totaladults" id="totaladults">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>Children : <select name="totalchildrens" id="totalchildrens">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select></p>
			<button name="submit" id="checkB" href="#">Check Availability</button>
		</form>
	</div>
</div>
</div>
</div>
<script>
	function validateForm(form) {
		var a = form.checkin.value;
		var b = form.checkout.value;
		var c = form.totaladults.value;
		var d = form.totalchildrens.value;
			if(a == null || b == null || a == "" || b == "") 
			{
			 alert("Please choose date");
			 return false;
			}
			if(c == 0) 
			{
			 	if(d == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}
			if(d == 0) 
			{
			 	if(c == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}
	}
</script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57205452-1', 'auto');
  ga('send', 'pageview');

</script>
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
<?php include 'footer.php';?>