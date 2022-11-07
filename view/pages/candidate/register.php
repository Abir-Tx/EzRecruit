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
	@include "../../../controller/admin/adminLoginHandler.php";
	if (!isset($_SESSION["user"])) {
		echo "Please login first";
		die();
	}
	?>
	<!-- HTML -->
	<h1>Recruitment Form</h1>

	<div class="recruitmentFormCon">
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
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