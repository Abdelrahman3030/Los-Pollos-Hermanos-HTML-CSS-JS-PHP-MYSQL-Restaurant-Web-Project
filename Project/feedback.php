<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$feedback = $_POST['feedback'];

	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, phone, feedback) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $email, $phone, $feedback);
		$execval = $stmt->execute();
		
		echo " feedback was sent successfully!";
		$stmt->close();
		$conn->close();
	}
?>