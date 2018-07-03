<?php

$conn = new mysqli ('localhost','root','','hotel');

if($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
}

$sql= "CREATE TABLE IF NOT EXISTS hotel.member (mNo INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, fname VARCHAR(20) NOT NULL, lname VARCHAR(20) NOT NULL, uname VARCHAR(12) NOT NULL, password VARCHAR(20) NOT NULL, contact INT(15) NOT NULL, email VARCHAR(30) NOT NULL, address VARCHAR(50) NOT NULL, reg_date TIMESTAMP);";
$sql1="CREATE TABLE IF NOT EXISTS booking (booking_id INT(200) UNSIGNED AUTO_INCREMENT PRIMARY KEY, total_adult INT(50) NOT NULL, total_children INT(50) NOT NULL, checkin_date date NOT NULL, checkout_date date NOT NULL, special_requirement text NOT NULL, payment_status varchar(50) NOT NULL, total_amount double DEFAULT NULL, deposit double NOT NULL, booking_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;";
$sql2="CREATE TABLE IF NOT EXISTS room (room_id int(255) PRIMARY KEY, total_room int(255) NOT NULL,occupancy int(255) DEFAULT NULL, size varchar(30) DEFAULT NULL,view varchar(30) DEFAULT NULL,room_name varchar(50) NOT NULL,descriptions text, rate double NOT NULL,imgpath varchar(100) NOT NULL, extrabed_rate INT(10), bed INT(10)) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;";
$sql3="CREATE TABLE IF NOT EXISTS roombook (booking_id INT(200), room_id INT(255), totalroombook INT(20), uname VARCHAR(12), extrabed INT(10));";
$sql4="INSERT INTO room (room_id, total_room, occupancy, size, view, room_name, descriptions, rate, imgpath, extrabed_rate, bed) VALUES
(10001, 10, 2, '14 sqm', 'city', 'Deluxe Room', '1 Double bed, Shower room,Wired/Wireless Internet, Persoanl Digital Safe, Suitable for couple', 120, 'images/room2.png', 10,2),
(10002, 10, 4, '25 sqm', 'city', 'Family Room', '2 Double beds, Shower room,Wired/Wireless Internet, Persoanl Digital Safe, Suitable for Family', 140, 'images/room3.png', 10,2),
(10003, 10, 10, '50 sqm', 'Corner', 'Suites Room', '2 Bed rooms with 1 Queen bed, 2 Shower room, Living room, Cozy Kitchen, Wired/Wireless Internet, Personal Digital Safe, Luxurious room amenities, Suitable for honeymoon', 180, 'images/room4.png',10,2);";
	  
	  if ($conn->query($sql) && $conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3) && $conn->query($sql4) === TRUE) {
	  	echo "<script type='text/javascript'>alert('Table created successfully');</script>";
	  } else {
	  	echo "<script type='text/javascript'>alert('Error creating table: <?php $conn->error;?>');</script>";
	  }
	  $conn->close();
?>