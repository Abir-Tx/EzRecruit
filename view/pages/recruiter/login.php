<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recruiter Login | EzRecruit</title>
	<!-- Styles -->
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<link rel="stylesheet" href="../../styles/css/index.css">
</head>

<body>
	<?php
	@include "../../layout/header.php";
	@include "../../../controller/recruiter/recruiterLoginHandler.php";
	if ($_SESSION["user"]["type"] == "recruiter") {
		header("Location: ./cpanel.php");
	}
	?>

	<div class="loginCon">
		<h2>Recruiter Login</h2>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
			<div class="inputCon">
				<label for="uname">Username</label>
				<input type="text" name="uname" id="uname" placeholder="Enter your user name" required>
			</div>

			<div class="inputCon">
				<label for="pass">Password</label>
				<input type="password" name="pass" id="pass" placeholder="Enter your password" required>
			</div>

			<div class="inputCon">
				<input type="submit" value="Submit">
			</div>
		</form>


		<?php @include "../../layout/footer.php" ?>
</body>

</html>