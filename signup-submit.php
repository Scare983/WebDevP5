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
		$formString = "\r".
					  $_POST["name"].
					  ", ".
					  $_POST["gender"].
					  ", ".
					  $_POST["age"].
					  ", ".
					  $_POST["personalityType"].
					  ", ".
					  $_POST["os"].
					  ", ".
					  $_POST["minAgeSeeking"].
					  ",".
					  $_POST["maxAgeSeeking"]
		;
		file_put_contents("singles.txt",$formString,FILE_APPEND);
		
		//to upload a pic with proper src name
		$target_dir = "Images/";
		$uploadName = substr($formString,0,strpos($formString,",")-1);
		$uploadName = str_replace(" ","_",$uploadName);
		$uploadName = strtolower($uploadName);
		$target_file = $target_dir.basename($_FILES["filesToUpload"][$uploadName]);
		
	?>

	<b>Thank you!</b><br><br>
	Welcome to Match, <?php echo $_POST["name"]; ?>!<br><br>
	Now&nbsp<a href="matches.php">log in to see your matches!</a>
	
	</body>
</html>