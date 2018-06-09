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
						<li>Home</li>
						<li>About</li>
						<li>Contact</li>
					</ul>
				</div>
				
				<div id="header2">
					<h2>Pet Adoption Form</h2>
				</div>
				
				<div id="main">
                
					<?php
						// define variables and set to empty values
						$petIDErr = $petNameErr = $petGenderErr = $petTypeErr = $petAgeErr = "";
						$inDate = $petID = $petName = $petGender = $petType = $petAge = $petNotes = "";
					
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							
							if(isset($_POST["inDate"])){
								$inDate = $_POST["inDate"];
							}

							//petID validate If the pet_id already exists
							$mysqli = new mysqli('localhost1234', 'root', 'Squidly812', 'pet adoption');
							$result = $mysqli->query("SELECT pet_id FROM pettable WHERE pet_id = $petID");
							if($result->num_rows == 0) {
								 // row not found, do stuff...
								 $petID = $_POST["petID"];
							} else {
								// do other stuff...
								$petIDErr = "Please choose a different pet ID";
							}
							$mysqli->close();

							if (empty($_POST["petName"])) {
								$petNameErr = "Name is required";
					  			} else {
								$petName = test_input($_POST["petName"]);
								// check if name only contains letters and whitespace
								if (!preg_match("/^[a-zA-Z ]*$/",$petName)) {
						  		$petNameErr = "Only letters and white space allowed"; 
								}elseif(isset($_POST["petName"])){
									$petName = $_POST["petName"];
								}
							}
					  
							if (empty($_POST["petGender"])) {
								$petGenderErr = "Gender is required";
					  			} else {
								$petGender = test_input($_POST["petGender"]);
								// check if name only contains letters and whitespace
								if (!preg_match("/^[a-zA-Z ]*$/",$petGender)) {
						  		$petGenderErr = "Only letters and white space allowed"; 
								}elseif(isset($_POST["petGender"])){
									$petGender = $_POST["petGender"];
								}
							}
						
					  		if(isset($_POST["petType"])){
								$petType = $_POST["petType"];
							}

							if (empty($_POST["petAge"])) {
								$petAgeErr = "pet age is required";
					  			} elseif(isset($_POST["petAge"])){
								$petAge = $_POST["petAge"];
							}
					
					  		if (empty($_POST["petNotes"])){
								$petNotes = "please insert a pet description";
					  			} elseif(isset($_POST["petNotes"])){
								$petNotes = $_POST["petNotes"];
					  		}
						}

						echo "</br></br>";
						CreateMySQLUser($petID, $petName, $petGender, $petAge, $petType, $petNotes, $inDate);
						
						function CreateMySQLUser($petID, $petName, $petGender, $petAge, $petType, $petNotes, $inDate)
						{
							echo "<b>Creating User: <i>$petName $petType</i></b><br>";
							// Create connection
							$conn = new mysqli('localhost1234', 'root', 'Squidly812', 'pet adoption');
							// Check connection
							if ($conn->connect_error)
							{
								die("Connection failed: " . $conn->connect_error);
							}
							 
							echo "<b>Connection to MySQL DB established!</b> <br>";
							$sql = "INSERT INTO pettable (petID, petName, petGender, petAge, petType, petNotes, inDate)
							VALUES ('$petID', '$petName', '$petGender', '$petAge', '$petType', '$petNotes', '$inDate')";
						
							echo "SQL Statement: $sql <br>";
							if ($conn->query($sql) === TRUE)
							{
								echo "<b>New record created successfully</b><br>";
							}
							else
							{
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
						
							$conn->close();
						}
					?>	
						</br></br>
						<a href="index.php">Go back to the main page</a>	
					
				</div>
				
			</div>
			
			<div id="footer">
				Copyright &copy; 2018 Joe Diaz
			</div>
			
		</div>
		
	</body>
	
</html>