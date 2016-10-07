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
			$sql = "SELECT MessageID,Header,Sender FROM messages";
			$result = mysqli_query($conn,$sql);
			//making sure there is at least one row
			echo'
			<table class = messageTable>
				<tr class = header>
					<td>Subject</td>
					<td>From</td>
				</tr>
				';
			if (mysqli_num_rows($result) > 0){
			    while($row = mysqli_fetch_assoc($result)) {
			        echo "<tr class = 'row'>
		        			<form action='message.php' method='post'> 
				        		<td class='column'> <input type='submit' value='' class='submit'>". $row["Header"]. "</td>
				        		<td class='column'> " . $row["Sender"] . 
				        		"</td></input> <input type='hidden' name='messageID' value ='".$row["MessageID"]."'></input>
			        		</form>
			        	</tr>" ;
		    	}
			}
			else{
				echo'</table>';
			}			
		?>
	</body>
</html>	