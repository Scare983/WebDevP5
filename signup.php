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
	
	<form action="signup-submit.php" method="post">
		<fieldset>
			<legend>New User Signup:</legend>
			Name: <input type="text" name="name"><br>
			Gender: <input type="radio" name="gender" value="male">Male&nbsp&nbsp
					<input type="radio" name="gender" value="female" checked="true">Female<br>
			Age: <input type="text" name="age"><br>
			Personality Type: <input type="text" name="personalityType">&nbsp&nbsp(<a>Don't know your type?</a>)</br>
			Favorite OS: <select name="os">
							<option value="windows">Windows</option>
							<option value="mac">Mac OS X</option>
							<option value="linux">Linux</opion>	
						</select></br>
			Seeking Age: <input type="text" name="minAgeSeeking"> to <input type="text" name="maxAgeSeeking"><br>
			<input type="submit" value="Sign Up">
							
		</fieldset>
	
	</form>
	
	</body>

</html>