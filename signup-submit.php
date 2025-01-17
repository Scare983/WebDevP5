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
            if (!empty($_POST["name"])) {
                $userName = $_POST["name"];
                $singlesFile = fopen("singles.txt", "r") or die("Unable to open file!");
                while (!feof($singlesFile)) {
                    $lineName = explode(",", fgets($singlesFile));
                    if ($lineName[0] == $userName) {
                        exit("That user already exists, I am sorry you must have a twin! ");
                    }
                }
                fclose($singlesFile);
            }
            if (empty($_POST["age"])) {
                exit("Age must be a valid integer between 0 and 99 inclusive.");
            }
            if (intVal($_POST["age"]) < 0 || intVal($_POST["age"]) > 99) {
                exit("Age must be a valid integer between 0 and 99 inclusive.");
            }
            if (!empty($_POST["personalityType"]) || empty($_POST["personalityType"])) {
                $tempPersonalityType = $_POST["personalityType"];
                $p1 = substr($tempPersonalityType, 0, 1);
                $p2 = substr($tempPersonalityType, 1, 1);
                $p3 = substr($tempPersonalityType, 2, 1);
                $p4 = substr($tempPersonalityType, 3, 1);
                if (!(($p1 == "I" || $p1 == "E") &&
                    ($p2 == "N" || $p2 == "S") &&
                    ($p3 == "F" || $p3 == "T") &&
                    ($p4 == "J" || $p4 == "P"))) {

                    exit("Must enter valid personality type.");
                }
            }
            if (empty($_POST["minAgeSeeking"])) {
                exit("Min age must be a valid integer between 0 and 99 inclusive.");
            }
            if (!empty($_POST["minAgeSeeking"])) {
                if (intval($_POST["minAgeSeeking"]) < 0 || intval($_POST["minAgeSeeking"]) > 99) {
                    exit("Min age must be a valid integer between 0 and 99 inclusive.");
                }
            }

            if (empty($_POST["maxAgeSeeking"])) {
                exit("Max age must be a valid integer between 0 and 99 inclusive.");
            }
            if (!empty($_POST["maxAgeSeeking"])) {
                if (intval($_POST["maxAgeSeeking"]) < 0 || intval($_POST["maxAgeSeeking"]) > 99) {
                    exit("Max age must be a valid integer between 0 and 99 inclusive.");
                }
                if ((intval($_POST["maxAgeSeeking"]) - intval($_POST["minAgeSeeking"])) < 0) {
                    exit("Max age must be greater than min age.");
                }
            }

            #echo $_POST["maxSeekingAge"], $_POST["minSeekingAge"];


            ///////FORM VALIDATION////////////

            $formString =
                $_POST["name"] .
                "," .
                $_POST["gender"] .
                "," .
                $_POST["age"] .
                "," .
                $_POST["personalityType"] .
                "," .
                $_POST["os"] .
                "," .
                $_POST["minAgeSeeking"] .
                "," .
                $_POST["maxAgeSeeking"] .
                "\r\n";

            file_put_contents("singles.txt", $formString, FILE_APPEND);
            if (isset ($_FILES['fileToUpload'])) {
                $target_dir = "Images/Images/";
                $file_name = strtolower(str_replace(" ", "_", $_POST["name"]));
                $file_name .= ".jpg";
                $file_whatIsName = $_FILES['fileToUpload']['name'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                move_uploaded_file($file_tmp, $target_dir . $file_name);
            }
        }
	?>

	<b>Thank you!</b><br><br>
	Welcome to Match, <?php echo $_POST["name"]; ?>!<br><br>
	Now&nbsp<a href="matches.php">log in to see your matches!</a>
	
	</body>
</html>