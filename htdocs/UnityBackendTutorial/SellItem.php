<?php

require 'ConnectionSettings.php';

//vars
$itemID = $_POST["itemID"];
$userID = $_POST["userID"];
$ID = $_POST["ID"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT price FROM items WHERE id = '". $itemID ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	$itemPrice = $result->fetch_assoc()["price"];

	$sql2 = "DELETE FROM usersitems WHERE ID = '". $ID ."'";

	$result2 = $conn->query($sql2);
	if($result2){
		//if deleted successfully
		$sql3 = "UPDATE `users` SET `currency` = currency + '". $itemPrice."' WHERE `id` = '". $userID."'";
		$conn->query($sql3);

		

	}
} 
else {
  echo "0 results";
}
$conn->close();

?>