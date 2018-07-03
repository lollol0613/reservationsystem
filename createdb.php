<?php
	 	$servername="localhost";
	 	$username="root";
	 	$dbpassword="";

	 	$conn = new mysqli($servername, $username,$dbpassword);
	 	if($conn->connect_error) {
	 		die("Connection failed: ". $conn->connect_error);
	 	}
	 	$sql = "CREATE DATABASE hotel";
	 	if($conn->query($sql) === TRUE) {
	 echo "<script type='text/javascript'>alert('Database created successfully');
	 </script>";
	 	} else {
	 		echo "<script type='text/javascript'>alert('Error creating database: <?php echo $conn->error; ?>');</script>";
	 	}
	 	$conn->close();
?>