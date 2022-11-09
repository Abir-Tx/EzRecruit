<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Candidate Login | EzRecruit</title>
	<!-- Styles -->
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<link rel="stylesheet" href="../../styles/css/index.css">
</head>

<body>
	<?php
	@include "../../layout/header.php";
	@include "../../../controller/candidate/candidateLoginHandler.php";
	if (!isset($_SESSION["user"])) {
		echo "Please login first";
		die();
	}
	?>
	<!-- HTML -->
	<h1>Candidate Login</h1>

	<form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" placeholder="Enter your email" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Enter your password" required>
		</div>
		<div class="form-group">
			<input type="submit" value="Login">
		</div>
	</form>


	<?php @include "../../layout/footer.php" ?>
</body>

</html>