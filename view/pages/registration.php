<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration | EzRecruit</title>
	<link rel="stylesheet" href="../styles/css/registration.css">
	<link rel="stylesheet" href="../styles/css/commons.css">
</head>

<body>
	<?php
	@include "../layout/header.php";
	@include "../../controller/registrationHandler.php";
	@include "../components/subMenu.php";
	?>



	<!-- HTML Codes -->
	<div class="reg">
		<h2>
			Register For EzRecruit
		</h2>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
			<div class="inputsCon">
				<label for="name">Name: </label>
				<input type="text" name="name" id="name">
				<span class="error">* <?php echo $nameErr; ?></span>
				<hr>

				<label for="email">Email: </label>
				<input type="email" name="email" id="email">
				<span class="error">* <?php echo $nameErr; ?></span>
				<hr>

				<label for="uname">User Name: </label>
				<input type="text" name="uname" id="uname">
				<span class="error">* <?php echo $unameErr; ?></span>
				<hr>


				<label for="newPass">New Password: </label>
				<input type="password" name="newPass" id="newPass">
				<span class="error">* <?php echo $newPassErr; ?></span>
				<hr>

				<label for="conPass">Confirm Password: </label>
				<input type="password" name="conPass" id="conPass">
				<span class="error">* <?php echo $conPassErr; ?></span>
				<hr>

				<label for="gender" class="inpLabel">Gender: </label>
				<input type="radio" name="gender" value="female">Female
				<input type="radio" name="gender" value="male">Male
				<input type="radio" name="gender" value="other">Other
				<span class="error">* <?php echo $genderErr; ?></span>
				<hr>
			</div>

			<label for="date" class="inpLabel">Date of Birth: </label>
			<input type="date" name="date" id="date">
			<span class="error">* <?php echo $dobErr; ?></span>
			<hr>

			<label for="fileToupload">Profile Picture: </label>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<span class="error">* <?php echo $proPicErr; ?></span>
			<hr>


			<div class="btnCon">
				<input type="submit" value="Submit">
				<br><br>
				<input type="reset" value="Reset">
			</div>
		</form>
	</div>
	<?php @include "../layout/footer.php" ?>
</body>

</html>