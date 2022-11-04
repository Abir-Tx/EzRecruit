<!-- Login page | RecruiterX | By Mushfiqur Rahman Abir-->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | RecruiterX</title>

	<link rel="stylesheet" href="../styles/css/login.css">
	<link rel="stylesheet" href="../styles/css/commons.css">
</head>

<body>
	<?php
	session_start();
	@include "../layout/header.php";
	@include "../../controller/loginHandler.php"

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
	<?php @include "../layout/footer.php" ?>
</body>

</html>