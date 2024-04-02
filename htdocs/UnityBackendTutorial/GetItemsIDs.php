<?php

require 'ConnectionSettings.php';

//User submited variables
$userID = $_POST["userID"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully". "<br><br>";

$sql = "SELECT id, itemid FROM usersitems WHERE userid = '". $userID ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $rows = array();

  while($row = $result->fetch_assoc()) {
	  $rows[] = $row;
  }
  echo json_encode($rows);
} else {
  echo "0 results";
}
$conn->close();

?>