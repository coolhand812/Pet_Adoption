<html>
	<head>
		<title>Joe's Website</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>

	<body>
		<div id="container">
			<div id="header">
				<h1>Joe's Website</h1>
			</div>
			
			<div id="content">
				<div id="nav">
					<h3>Navigation</h3>
					<ul>
						<li><a href="main_menu.html">Main</a></li>
						<li><a href="about.php">About</a></li>
						<li>Contact</li>
					</ul>
				</div>
				
				<div id="header2">
					<h2>Pet Adoption</h2>
				</div>
				
				<div id="main">
				
				<?php
					//generate db query and get a table
					$servername = "localhost1234";
					$username = "root";
					$password = "Squidly812";
					$dbname = "pettable";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
    					die("Connection failed: " . $conn->connect_error);
					} 

					$sql = "SELECT pet_id, name, gender, age, type_id, notes, intake_date FROM pettable";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
    					// output data of each row
    					while($row = $result->fetch_assoc()) {
        				echo "id: " . $row["pet_id"]. " - Name: " . $row["name"]. " " . $row["gender"]. " " . $row["age"]. " " . $row["type_id"]. " " . $row["notes"]. " " . $row["intake_date"]. "<br>";
    					}
					} else {
    					echo "0 results";
					}
					$conn->close();
				?>	
					
				</div>
				
			</div>
			
			<div id="footer">
				Copyright &copy; 2018 Joe Diaz
			</div>
			
		</div>
		
	</body>
	
</html>