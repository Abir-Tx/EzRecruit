<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Admin | EzRecruit</title>
	<link rel="stylesheet" href="../../styles/css/addAdmin.css">
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<script src="../../../scripts/checkers.js"></script>
	<script src="../../../scripts/admin/validateAddAdmin.js"></script>
</head>

<body>
	<?php
	include_once '../../layout/header.php';
	include_once "../../../controller/admin/createAdmin.php";
	?>
	<h2 class="heading">
		Add Admin
	</h2>
	<div class="form-con">
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" onsubmit="return validate()">
			<label for="fname" class="genLab">First Name</label>
			<input class="genInp" type="text" name="fname" id="fname" placeholder="Enter your first name" onblur="checkFname('fname', 'fnameErr')" onkeyup="checkFname('fname', 'fnameErr')">
			<span class="fnameErr" id="fnameErr"></span>
			<br>
			<label for="lname" class="genLab">Last Name</label>
			<input class="genInp" type="text" name="lname" id="lname" placeholder="Enter your last name" onblur="checkLname('lname', 'lnameErr')" onkeyup="checkLname('lname', 'lnameErr')">
			<span class="lnameErr" id="lnameErr"></span>
			<br>
			<label for="uname" class="genLab"> User Name</label>
			<input class="genInp" type="text" name="uname" id="uname" placeholder="Enter your user name" onblur="checkUsername('uname', 'unameErr')">
			<span class="unameErr" id="unameErr">
				<?php echo $unameErr; ?>
			</span>
			<br>
			<label for="email" class="genLab">Email</label>
			<input class="genInp" type="email" name="email" id="email" placeholder="Enter your email" onblur="checkEmail('email')" onkeyup="checkEmail('email')">
			<span class="emailErr" id="emailErr"></span>
			<br>
			<label for="password" class="genLab">Password</label>
			<input class="genInp" type="password" name="password" id="password" placeholder="Enter your password" onblur="checkPass('password')" onkeyup="checkPass('password')">
			<span class="passErr" id="passErr"></span>
			<br>
			<label for="confirmPassword" class="genLab">Confirm Password</label>
			<input class="genInp" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password" onblur="checkCpass('confirmPassword')" onkeyup="checkCpass('confirmPassword')">
			<span class="cpassErr" id="cpassErr"></span>
			<br>

			<label for="gender" class="inpLabel">Gender: </label>
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="other">Other
			<span class="genderErr" id="genderErr"></span>
			<br>
			<label for="dob">Date of Birth</label>
			<input type="date" name="dob" id="dob" onblur="checkDob('dob', 'dobErr')" onkeyup="checkDob('dob', 'dobErr')">
			<span class="dobErr" id="dobErr"></span>
			<br>
			<label for="profilePic">Profile Picture</label>
			<input type="file" name="profilePic" id="profilePic">
			<span class="profilePicErr" id="profilePicErr"></span>
			<br>


			<div class="submitBtn-con">
				<input class="submitBtn" type="submit" value="Add Admin">
				<br>
			</div>
		</form>
	</div>
	<?php include_once '../../layout/footer.php'; ?>

</body>

</html>