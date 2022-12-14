<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | EzRecruit</title>
	<!-- Styles -->
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<link rel="stylesheet" href="../../styles/css/index.css">
	<link rel="stylesheet" href="../../styles/css/login.css">

	<!-- JS -->
	<script src="../../../scripts/checkers.js" defer></script>
	<script src="../../../scripts/general/validateGenLogin.js" defer></script>

</head>

<body>
	<?php
	@include "../../layout/header.php";
	@include "../../../controller/general/loginHandler.php";
	?>

	<div class="loginCon">
		<h2>Login</h2>
		<div class="formCon">
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" onsubmit="validateForm()">
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

				<div class="submitCon">
					<input type="submit" value="Submit">
				</div>
			</form>
		</div>

	</div>
	<?php @include "../../layout/footer.php" ?>
</body>

</html>