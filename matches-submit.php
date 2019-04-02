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
		//setting userInfo variable to a string equivalent to the line of text in 
		//singles.txt that is the same as the name the user enters in matches.php
		$file = fopen("singles.txt","r") or die("Unable to open file!");
		$userInfo = "";
		
		while($userInfo = fgets($file)){
			$name = substr($userInfo,
						   0,
						   strpos($userInfo,","));
						   
			if(strcmp($name,$_GET["name"]) == 0) break;
		}
		
		$userInfo_arr = explode(",",$userInfo);
		$userName = $userInfo_arr[0];
		$userGender = $userInfo_arr[1];
		$userMinAgeSeeking = intVal($userInfo_arr[5]);
		$userMaxAgeSeeking = intVal($userInfo_arr[6]);
		$userPersonality = $userInfo_arr[3];
		$userOS = $userInfo_arr[4];
				
		//find and print matches
		fclose($file);
		$file = fopen("singles.txt","r") or die("Unable to open file!");
		$possibleMatch = "";
		
		echo "<b class='match'>Matches for ",$userName,"</b><br>";
		
		while($possibleMatch = fgets($file)){
			$str_arr = explode(",",$possibleMatch);
			
			$name = $str_arr[0];
			$gender = $str_arr[1];
			$age = $str_arr[2];
			$personality = $str_arr[3];
			$os = $str_arr[4];
			
			
			if($name == $userName) continue;
			if($gender == $userGender) continue;
			if($age < $userMinAgeSeeking || $age > $userMaxAgeSeeking) continue;
			if(strcmp(substr($personality,0,1),substr($userPersonality,0,1)) != 0
				&& strcmp(substr($personality,1,1),substr($userPersonality,1,1)) != 0
				&& strcmp(substr($personality,2,1),substr($userPersonality,2,1)) != 0
				&& strcmp(substr($personality,3,1),substr($userPersonality,3,1)) != 0
			) continue;
			if($os != $userOS) continue;
			

			$imgName = str_replace(" ","_",$name);
			$imgName = strtolower($imgName);
		
			echo "<div class='match'>	 		
				  	<p class = 'match'><img src='Images/Images/$imgName.jpg'>",$name," </p>",
				  	"<ul class='match'>
				  		<li><strong>gender:</strong></li>
				  		<li>",$gender,"</li>
				  		<li><strong>age:</strong></li>
				  		<li>",$age,"</li>
				  		<li><strong>type:</strong></li>
				  		<li>",$personality,"</li>
				  		<li><strong>OS:</strong></li>
				  		<li>",$os,"</li>
				  	</ul>
				  </div>";
		
		}
		
		fclose($file);
		
		
	?>
	
	</body>

</html>