<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Profile Picture | RecruiterX</title>
	<link rel="stylesheet" href="../styles/css/commons.css">
</head>

<body>
	<?php
	@include "../layout/header.php";
	@include "../../controller/util.php";


	$details  =  fetch("../../model/adminUsers.json", "../../controller/logout.php");
	@include "../components/subMenu.php";

	if (isset($details[5]) && !empty($details[5])) {
		$ifile = $details[5];
	} else $ifile = "avatar.svg";



	// Profile Picture Upload & check
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$target_dir = "../images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if ($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			$proPicErr =  "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size
		/* if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
} */

		// Allow certain file formats
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			/* && $imageFileType != "gif" */
		) {
			$proPicErr =  "Sorry, only JPG, JPEG, PNG files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$proPicErr =  "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
				$passed = true;
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	?>
	<!-- HTML -->
	<h2>Change Profile Picture</h2>
	<div class="changeProPic">
		<div class="imageCon">
			<img src='../images/<?php echo $ifile ?>' alt='Profile picture of <?php echo $details[0] ?>' height="150px">
		</div>
		<br>

		<form action=<?php echo $_SERVER["PHP_SELF"] ?> method="post">
			<label for="fileToUpload">Select New Profile Image: </label>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br>
			<input type="submit" value="Update">
		</form>
	</div>
	<?php @include "./footer.php" ?>
</body>

</html>