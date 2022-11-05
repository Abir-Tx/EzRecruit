<?php
$nameErr = $emailErr = $dobErr =  $genderErr = $newPassErr = $conPassErr = $unameErr = $proPicErr = "";
$name = $email = $dob = $gender = $uname = $proPic = $newPass = "";
$passed = false;
$checkCount = 0;
$dataFileLoc = "../../model/adminUsers.json";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	} elseif (str_word_count($_POST["name"]) < 2) {
		$nameErr = "Must contain at least two words";
	} elseif (!preg_match('/^[a-z]/i', $_POST["name"])) {
		$nameErr = "Name must start with letters";
	} elseif (!preg_match('/^[a-zA-Z ".-]+$/', $_POST["name"])) {
		$nameErr = "Can contain a-z, A-Z, period, dash only";
	} else {
		$name = $_POST["name"];
		$passed = true;
		$checkCount = 1;
	}

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
	} else {
		$email = $_POST["email"];
		$passed = true;
		$checkCount = 2;
	}

	// Password
	if (empty($_POST["newPass"]) || empty($_POST["conPass"])) {
		$newPassErr = $conPassErr = "This field can not be empty";
	} elseif ($_POST["newPass"] == $_POST["conPass"]) {
		$newPass = $_POST["newPass"];
		$passed = true;
		$checkCount = 3;
	} else
		$newPassErr = "The new password do not match with the retyped password";

	// Gender
	if (empty($_POST["gender"])) {
		$genderErr = "You must select at least one";
	} else {
		$gender = $_POST["gender"];
		$passed = true;
		$checkCount = 4;
	}

	// DOB
	if (empty($_POST["date"])) $dobErr = "Date of Birth is required";
	else {
		$year = date("Y", strtotime($dob));
		if ((int)$year < 1900 || (int)$year > 2022) {
			$dobErr = "The selected date must be in valid range";
		} else {
			$dob = $_POST["date"];
			$passed = true;
			$checkCount = 5;
		}
	}

	// User name
	if (empty($_POST["uname"])) {
		$unameErr = "User name can not be empty";
	} else {
		$uname = $_POST["uname"];
		$passed = true;
		$checkCount = 6;
	}

	// Profile Picture Upload & check
	$target_dir = "../../model/images/";
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
			$checkCount = 7;
		} else {
			echo "Sorry, there was an error uploading your file.";
			$passed = false;
		}
	}


	if ($passed === true && $checkcount === 7) {
		$currentData = file_get_contents($dataFileLoc);
		$newData = json_decode($currentData, true);

		$data = array(
			'name' => $name,
			'email' => $email,
			'uname' => $uname,
			'password' => $newPass,
			'gender' => $gender,
			'dob' => $dob,
			'imageFile' => htmlspecialchars(basename($_FILES["fileToUpload"]["name"]))
		);
		$newData[] = $data;

		$jsonData = json_encode($newData);

		if (!empty($jsonData)) {
			file_put_contents($dataFileLoc, $jsonData);
			echo "Submission Successfull";
		} else echo "Errors occured";
	} else echo "Can not submit data";
}
