<!DOCTYPE html>
<html>

	<head>
		<title>Match</title>
		
		<meta charset="utf-8" />
		
		<!-- instructor-provided CSS and JavaScript links; do not modify -->
		<link href="heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="match.css" type="text/css" rel="stylesheet" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>
		
	</head>
	
	<body>
	
	<?php
		///////FORM VALIDATION//////////
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			if (empty($_POST["name"])) {
    			exit("Name is required.");
  			} 
  			
  			if (intVal($_POST["age"]) < 0 || intVal($_POST["age"]) > 99){
  				exit("Age must be a valid integer between 0 and 99 inclusive.");
  			}
  			
  			$tempPersonalityType = $_POST["personalityType"];
  			$p1 = substr($tempPersonalityType,0,1);
  			$p2 = substr($tempPersonalityType,1,1);
  			$p3 = substr($tempPersonalityType,2,1);
  			$p4 = substr($tempPersonalityType,3,1); 
  			if (!(($p1 == "I" || $p1 == "E") && 
  				($p2 == "N" || $p2 == "S") &&
  				($p3 == "F" || $p3 == "T") &&
  				($p4 == "J" || $p4 == "P"))) {
  					
  					exit("Must enter valid personality type.");
  			}
  			
  			if (intVal($_POST["minSeekingAge"]) < 0 || intVal($_POST["minSeekingAge"]) > 99){
  				exit("Min age must be a valid integer between 0 and 99 inclusive.");
  			}
  			
  			if (intVal($_POST["maxSeekingAge"]) < 0 || intVal($_POST["maxSeekingAge"]) > 99){
  				exit("Max age must be a valid integer between 0 and 99 inclusive.");
  			}
  			
  			echo $_POST["maxSeekingAge"], $_POST["minSeekingAge"];
  			
  			if( (intVal($_POST["maxSeekingAge"])-intVal($_POST["minSeekingAge"])) < 0 ){
  				exit("Max age must be greater than min age.");
  			}
  		}
		
		
	
		
		
		///////FORM VALIDATION////////////
	
		$formString = "\n".
					  $_POST["name"].
					  ",".
					  $_POST["gender"].
					  ",".
					  $_POST["age"].
					  ",".
					  $_POST["personalityType"].
					  ",".
					  $_POST["os"].
					  ",".
					  $_POST["minAgeSeeking"].
					  ",".
					  $_POST["maxAgeSeeking"]
		;
				
		file_put_contents("singles.txt",$formString,FILE_APPEND);

		$target_dir = "Images/Images/";
		$target_file = $target_dir.basename($_FILES["fileToUpload"]["tmp_name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		//make sure image is real
		if(isset($_POST["submit"])) {
    		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    	if($check !== false) {
        	echo "File is an image - " . $check["mime"] . ".";
       		$uploadOk = 1;
    	} else {
        	echo "File is not an image.";
        	$uploadOk = 0;
    	}
}
	?>

	<b>Thank you!</b><br><br>
	Welcome to Match, <?php echo $_POST["name"]; ?>!<br><br>
	Now&nbsp<a href="matches.php">log in to see your matches!</a>
	
	</body>
</html>