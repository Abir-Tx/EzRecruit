<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Candidate Recruitment | EzRecruit</title>
	<!-- Styles -->
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<link rel="stylesheet" href="../../styles/css/index.css">
</head>

<body>
	<?php
	@include "../../layout/header.php";
	@require_once "../../../model/db_connect.php";

	if (!isset($_SESSION["user"])) {
		echo "Please login first";
		die();
	}
	?>
	<!-- HTML -->
	<h1>Recruitment Form</h1>
	<?php
	$fname = $lname = $email = $phone = $address  = $dob  = $education  = $skills = $resume = $password = $cpassword = $shortBio = $propic = "";
	$isValid = false;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$education = $_POST['education'];
		$skills = $_POST['skills'];
		$resume = $_FILES['resume']['name'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$shortBio = $_POST['shortBio'];
		$propic = $_FILES['propic']['name'];

		// File upload
		$target_dir = "./profile_pics/";
		$target_file = $target_dir . basename($_FILES["resume"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["propic"]["tmp_name"], $target_file)) {
				echo "The file " . htmlspecialchars(basename($_FILES["propic"]["name"])) . " has been uploaded.";
				$isValid = true;
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}


		// PDF file upload
		$target_dir = "./resume/";
		$target_file = $target_dir . basename($_FILES["resume"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Check if the file is a PDF file or not
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["resume"]["tmp_name"]);
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
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Allow only pdf file format
		if (
			$imageFileType != "pdf"
		) {
			echo "Sorry, only PDF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
				echo "The file " . htmlspecialchars(basename($_FILES["resume"]["name"])) . " has been uploaded.";
				$isValid = true;
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	$conn = db_connect();
	$insertQuery = "INSERT INTO candidates (fname, lname, email, phone, address, dob, education, skills, resume, password, bio, propic) VALUES (:fname, :lname, :email, :phone, :address, :dob, :education, :skills, :resume, :password, :shortBio, :propic)";
	try {
		$stmt = $conn->prepare($insertQuery);
		if ($isValid) {
			$stmt->execute([
				":fname" => $fname,
				":lname" => $lname,
				":email" => $email,
				":phone" => $phone,
				":address" => $address,
				":dob" => $dob,
				":education" => $education,
				":skills" => $skills,
				":resume" => $resume,
				":password" => $password,
				":shortBio" => $shortBio,
				":propic" => $propic
			]);

			echo "Candidate added successfully";
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	$conn = null;
	?>

	<div class="recruitmentFormCon">
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
			<label for="fname">First Name: </label>
			<input type="text" name="fname" id="fname" placeholder="First Name" required>
			<br>

			<label for="lname">Last Name: </label>
			<input type="text" name="lname" id="lname" placeholder="Last Name" required>
			<br>
			<label for="email">Email: </label>
			<input type="email" name="email" id="email" placeholder="Email" required>
			<br>
			<label for="phone">Phone: </label>
			<input type="tel" name="phone" id="phone" placeholder="Phone" required>
			<br>
			<label for="address">Address: </label>
			<input type="text" name="address" id="address" placeholder="Address" required>
			<br>
			<label for="password">Password: </label>
			<input type="password" name="password" id="password" placeholder="Password" required>
			<br>
			<label for="cpassword">Confirm Password: </label>
			<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
			<br>
			<label for="resume">Resume: </label>
			<input type="file" name="resume" id="resume" required>
			<br>
			<label for="propic">Profile Picture: </label>
			<input type="file" name="propic" id="propic" required>
			<br>
			<label for="dob">Date of Birth: </label>
			<input type="date" name="dob" id="dob" required>
			<br>
			<label for="shortBio">Short Bio: </label>
			<textarea name="shortBio" id="shortBio" cols="30" rows="10" placeholder="Short Bio" required></textarea>
			<br>
			<label for="skills">Skills: </label>
			<input type="text" name="skills" id="skills" placeholder="Skills" required>
			<br>
			<label for="education">Education: </label>
			<input type="checkbox" name="education" id="education" value="SSC">SSC
			<input type="checkbox" name="education" id="education" value="HSC">HSC
			<input type="checkbox" name="education" id="education" value="BSc">BSc
			<br>

			<input type="submit" value="Submit">
			<input type="reset" value="Reset">
		</form>

	</div>
	<?php @include "../../layout/footer.php" ?>
</body>

</html>