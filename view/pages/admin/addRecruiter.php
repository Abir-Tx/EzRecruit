<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Recruiter | EzRecruit</title>
	<link rel="stylesheet" href="../../styles/css/commons.css">
</head>

<body>
	<!-- add header -->
	<?php @include "../../layout/header.php" ?>
	<h2>
		Add Recruiter
	</h2>

	<!-- Create a form with name, username, email, password & profile picture inputs -->
	<form action="../../../controller/admin/createRecruiter.php" method="POST">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" placeholder="Enter your name">
		<br>
		<label for="uname"> User Name</label>
		<input type="text" name="uname" id="uname" placeholder="Enter your user name">
		<br>
		<label for="email">Email</label>
		<input type="email" name="email" id="email" placeholder="Enter your email">
		<br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" placeholder="Enter your password">
		<br>
		<label for="confirmPassword">Confirm Password</label>
		<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password">
		<br>
		<label for="profilePic">Profile Picture</label>
		<input type="file" name="profilePic" id="profilePic">
		<br>
		<input type="submit" value="Add Recruiter">
		<br>
	</form>
	<!-- Add footer -->
	<?php @include "../../layout/footer.php" ?>
</body>

</html>