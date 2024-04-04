<?php

require 'ConnectionSettings.php';
//Vars submited by user
$loginuser = $_POST["loginUser"];
$loginpass = $_POST["loginPass"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username FROM users WHERE username = '". $loginuser ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//Tell user that name is already taken
	echo "Username is already taken.";
 
} else {
	//Insert the user and password into database
	$sql = "INSERT INTO users(username, password, level, currency)
			VALUES ('". $loginuser ."','". $loginpass ."', 1, 0)";

	if($conn->query($sql) === TRUE){
		echo "New user created successfully";
	} else {
		echo "Error: ". $sql . "<br>" . $conn->error;
	}
}
$conn->close();

?>