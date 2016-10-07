<?php
	$server = "localhost";
	$user = "admin";
	$pass= "admin";			
	$dbname = "messages";
	$conn = new mysqli($server,"admin","admin", $dbname, "3306");
	$sql = "DELETE FROM messages WHERE MessageID=".$_POST["PostMessageID"];
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "query worked";
	}
	 else {
	 	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	header("location: index.php");
?>