<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login | EzRecruit</title>
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
	<div class="loginBox">
		<div class="miniCon">
			<h2 class="title">
				Login To EzRecruit
			</h2>

			<div class="formContainer">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					<label for="uname">User Name: </label>
					<input class="inp" type="text" name="uname" id="uname" value=<?php if (isset($_COOKIE['uname'])) {
														echo $_COOKIE['uname'];
													} ?>>
					<span class="error">* <?php echo $unameErr; ?></span>
					<br><br>


					<label for="password">Password: </label>
					<input class="inp" type="password" name="password" id="password" value=<?php if (isset($_COOKIE['password'])) {
															echo $_COOKIE['password'];
														} ?>>
					<span class="error">* <?php echo $passErr; ?></span>
					<br><br>


					<input type="checkbox" name="remMe" id="remMe" <?php if (isset($_COOKIE['uname'])) {
												echo "checked='checked'";
											} ?>>
					<label class="remMe" for="remMe">Remember Me</label>
					<br><br>

					<div class="btnCon">
						<input type="Submit" value="Login" class="subBtn">
					</div>
					<br><br>
					<!-- Task no D - Forgot Password-->
					<div class="linkCon">
						<p>
							<a href="./passReset.php">Forgot Password?</a>
						</p>
					</div>
				</form>
			</div>
		</div>

	</div>


	<?php @include "../../layout/footer.php" ?>
</body>

</html>