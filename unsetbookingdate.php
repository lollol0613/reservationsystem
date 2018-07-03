<?php
session_start();

unset($_SESSION['checkin']);
unset($_SESSION['checkout']);
unset($_SESSION['adults']);
unset($_SESSION['childrens']);
//unset($_SESSION['deposit']);
header("location: booking.php");
?>