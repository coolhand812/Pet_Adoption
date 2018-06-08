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
						$petIDErr = $petNameErr = $petGenderErr = $petTypeErr = $petAgeErr = $petNotesErr = "";
						$petID = $petName = $petGender = $petType = $petAge = $petNotes = "";
					
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							  
							//petID validate If the pet_id already exists

							if (empty($_POST["petName"])) {
								$petNameErr = "Name is required";
					  			} else {
								$petName = test_input($_POST["petName"]);
								// check if name only contains letters and whitespace
								if (!preg_match("/^[a-zA-Z ]*$/",$petName)) {
						  		$petNameErr = "Only letters and white space allowed"; 
								}elseif(isset($_POST["petName"])){
									$petName = petName;
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
									$petGender = petGender;
								}
							}
						
					  		if(isset($_POST["petType"])){
								$petType = petType;
							}

							if(isset($_POST["petAge"])){
								$petAge = petAge;
							}
					
					  		if (empty($_POST["petNotes"])){
								$petNotes = "";
					  			} elseif(isset($_POST["petNotes"])){
								$petNotes = petNotes;
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