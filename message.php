<html>
	<head>
		<title>Message Interface</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<!--this is getting the jquery code-->
		<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<!-- referencing my script-->
		<script type="text/javascript", src="script.js"></script> 
	</head>
	<body>
		<h1 class = "title">Messages Interface</h1>
		<div class = "topStrip"></div>
		<?php
			//SQL connection variables
			$server = "localhost";
			$user = "admin";
			$password = "admin";
			$dbname = "messages";
			$conn = new mysqli($server,$user,$password,$dbname,"3306");
			$sql = "SELECT MessageID,Header,Sender,Message FROM messages WHERE MessageID =".$_POST["messageID"];
			$result = mysqli_query($conn,$sql);
			//making sure there is at least one row
		
			while($row = mysqli_fetch_assoc($result)) {
			echo
				"<div class='container'>
				<span class='top'> <div class='subject'>Subject: <span class='right'>". $row["Header"]. 
				"<span></div> <div class='sender'>From: <span class='right'> " . $row["Sender"] ."</span>
				</div></span>
				<span style='left:5px;position:relative;'>Message:</span>
				<div class='message'>".$row["Message"]."</div></div>" ;	
			echo'
				<div class="formContainer">
				<form action="index.php" method="post" class="buttons">
					<input type="submit" value="Back" class="backBtn"></input>
				</form>
				<form action="delete.php" method="post" class="buttons">
					<input type="submit" value="Delete" class="delete" name="delete"></input>
					<input type ="hidden" value ="'.$row["MessageID"].'" name="PostMessageID">
				</form>
				</div>';
			}	
			?>
		
	</body>
</html>	