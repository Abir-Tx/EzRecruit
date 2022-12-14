<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up | EzRecruit</title>

	<!-- Styles -->
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<link rel="stylesheet" href="../../styles/css/index.css">
	<link rel="stylesheet" href="../../styles/css/signUp.css">


	<!-- JS -->
	<script src="../../../scripts/general/validateGenSignup.js"></script>
	<script src="../../../scripts/checkers.js"></script>
</head>

<body>
	<?php
	@include "../../layout/header.php";
	@include "../../../controller/general/signupHandler.php";
	?>

	<div class="signUpCon">
		<h2>Sign Up</h2>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" onsubmit="return validateForm()">
			<div class="inputCon">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="Enter your name" onblur="checkName('name')" onkeyup="checkName('name')">
				<span class="nameErr" id="nameErr"></span>
			</div>

			<div class="inputCon">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="Enter your email" onblur="checkEmail('email')" onkeyup="checkEmail('email')">
				<span class="emailErr" id="emailErr"></span>
			</div>


			<div class="inputCon">
				<label for="pass">Password</label>
				<input type="password" name="pass" id="pass" placeholder="Enter your password" onblur="checkPass('pass')" onkeyup="checkPass('pass')">
				<span class="passErr" id="passErr"></span>
			</div>

			<div class="inputCon">
				<label for="cpass">Confirm Password</label>
				<input type="password" name="cpass" id="cpass" placeholder="Confirm your password" onblur="checkCpass('cpass')" onkeyup="checkCpass('cpass')">
				<span class="cpassErr" id="cpassErr"></span>
			</div>

			<div class="submitCon">
				<input type="reset" value="Reset">
				<br>
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>

	<?php @include "../../layout/footer.php" ?>
</body>

</html>