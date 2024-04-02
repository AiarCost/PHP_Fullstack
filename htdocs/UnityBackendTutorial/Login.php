<?php

require 'ConnectionSettings.php';

//Vars submited by user
$loginuser = $_POST["loginUser"];
$loginpass = $_POST["loginPass"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password, id FROM users WHERE username = '". $loginuser ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
		if($row["password"] == $loginpass){
			echo $row["id"];
			//Get user's data here
		}
		else{
			"Password is incorrect.";
		}
  }
} 
else {
  echo "0 results";
}
$conn->close();

?>