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
						$petIDErr = $petNameErr = $genderErr = $petTypeErr = $petAgeErr = $petNotesErr = "";
						$petID = $petName = $gender = $petType = $petAge = $petNotes = "";
					
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							  
							if (empty($_POST["petName"])) {
								$petNameErr = "Name is required";
					  		} else {
								$petName = test_input($_POST["petName"]);
								// check if name only contains letters and whitespace
								if (!preg_match("/^[a-zA-Z ]*$/",$petName)) {
						  		$petNameErr = "Only letters and white space allowed"; 
								}
							}
					  
							if (empty($_POST["petName"])) {
								$petNameErr = "Name is required";
					  		} else {
								$petName = test_input($_POST["petName"]);
								// check if name only contains letters and whitespace
								if (!preg_match("/^[a-zA-Z ]*$/",$petName)) {
						  		$petNameErr = "Only letters and white space allowed"; 
								}
							}
						
					  		if (empty($_POST["website"])) {
								$website = "";
					  		} else {
								$website = test_input($_POST["website"]);
								// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
								if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
						  		$websiteErr = "Invalid URL"; 
								}
					  		}
					
					  		if (empty($_POST["comment"])) {
								$comment = "";
					  		} else {
								$comment = test_input($_POST["comment"]);
					  		}
					
					  		if (empty($_POST["gender"])) {
								$genderErr = "Gender is required";
					  		} else {
								$gender = test_input($_POST["gender"]);
					  		}
						}
					?>	
					
				</div>
				
			</div>
			
			<div id="footer">
				Copyright &copy; 2018 Joe Diaz
			</div>
			
		</div>
		
	</body>
	
</html>