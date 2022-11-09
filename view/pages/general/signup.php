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
</head>

<body>
	<?php
	@include "../../layout/header.php";
	@include "../../../controller/general/signupHandler.php";
	?>

	<div class="signUpCon">
		<h2>Sign Up</h2>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
			<div class="inputCon">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="Enter your name" required>
			</div>

			<div class="inputCon">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="Enter your email" required>
			</div>


			<div class="inputCon">
				<label for="pass">Password</label>
				<input type="password" name="pass" id="pass" placeholder="Enter your password" required>
			</div>

			<div class="inputCon">
				<label for="cpass">Confirm Password</label>
				<input type="password" name="cpass" id="cpass" placeholder="Confirm your password" required>
			</div>

			<div class="submitCon">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>

	<?php @include "../../layout/footer.php" ?>
</body>

</html>