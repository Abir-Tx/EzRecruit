<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forgot Password | EzRecruit</title>
	<link rel="stylesheet" href="../styles/css/commons.css">
</head>

<body> <?php
	@include "../layout/header.php";
	@include "../../controller/util.php";


	$details  =  fetch("../../model/adminUsers.json", "../../controller/logout.php");
	@include "../components/subMenu.php";
	@include "../../controller/handleChangePass.php";
	?>

	<h2>Change Password</h2>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<label for="currPass">Current Password: </label>
		<input type="password" name="currPass" id="currPass">
		<span class="error">* <?php echo $currPassErr; ?></span>
		<br><br>

		<label for="newPass">New Password: </label>
		<input type="password" name="newPass" id="newPass">
		<span class="error">* <?php echo $newPassErr; ?></span>
		<br><br>

		<label for="conPass">Retype New Password: </label>
		<input type="password" name="conPass" id="conPass">
		<span class="error">* <?php echo $conPassErr; ?></span>
		<br><br>

		<input type="submit" value="Submit">
	</form>
</body>

</html>