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
	
	
<!--form validation..not working yet -->
<?php
 //define variables and set to empty values
$nameErr = $ageErr = $genderErr = $osErr = $typeErr = "";
$name = $age = $gender = $os = $min = $max = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
  }
    
  if (empty($_POST["os"])) {
    $osErr = "l";
  } else {
    $os = test_input($_POST["os"]);
  }
  
    if (empty($_POST["personalityType"])) {
    $typeErr = "Personality type required";
  } else {
    $personalityType = test_input($_POST["personalityType"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "l";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
	if (empty($_POST["minSeekingAge"])) {
    $minErr = "Minimum age is required";
  } else {
    $minAgeSeeking = test_input($_POST["minAgeSeeking"]);
  }
  
    if (empty($_POST["maxSeekingAge"])) {
    $maxErr = "Max age is required";
  } else {
    $maxAgeSeeking = test_input($_POST["maxAgeSeeking"]);
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
	
		<div id="bannerarea">
			<img src="BannerLogo.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>
	
	<form action="signup-submit.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>New User Signup:</legend>
			Name: <input type="text" name="name">
			 <?php echo $nameErr;?><br>
			Gender: <input type="radio" name="gender" value="M">Male&nbsp&nbsp
					<input type="radio" name="gender" value="F" checked="true">Female
					<?php echo $genderErr;?><br>
			Age: <input type="text" name="age">
			<?php echo $ageErr;?><br>
			Personality Type: <input type="text" name="personalityType">&nbsp&nbsp(<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>)
			<?php echo $typeErr;?></br>
			Favorite OS: <select name="os">
							<option value="Windows">Windows</option>
							<option value="Mac OS X">Mac OS X</option>
							<option value="Linux">Linux</option>	
						 </select></br>
			Seeking Age: <input type="text" name="minAgeSeeking"> to <input type="text" name="maxAgeSeeking">
			<?php echo $minErr;?><?php echo $maxErr;?><br>
			Photo: <input type="file" name = "userFile" accept="image/.jpg"/>
			
			<input type="submit" value="Sign Up"/>
							
		</fieldset>
	
	</form>
	
	</body>

</html>