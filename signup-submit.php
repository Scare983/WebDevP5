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
		
		//to upload a pic with proper src name
		$target_dir = 'uploads/';
		$uploadName = substr($formString,0,strpos($formString,","));
		$uploadName = str_replace(" ","_",$uploadName);
		$uploadName = strtolower($uploadName);
		$uploadName = "$uploadName.jpg";
		$target_file = $target_dir . basename($_FILES['userFile']['name']);
		
		if(move_uploaded_file($_FILES['userFile']['tmp_name'],$target_file)){
		    echo "The file ",$uploadName," has been uploaded.";
    	} 
    	else {
        	echo "Sorry, there was an error uploading your file $uploadName sorry";
    	}
		
	?>

	<b>Thank you!</b><br><br>
	Welcome to Match, <?php echo $_POST["name"]; ?>!<br><br>
	Now&nbsp<a href="matches.php">log in to see your matches!</a>
	
	</body>
</html>