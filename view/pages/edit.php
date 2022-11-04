<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile | RecruiteX</title>
	<link rel="stylesheet" href="../styles/css/commons.css">
</head>

<body>
	<?php
	@include "../layout/header.php";
	@include "../../controller/util.php";


	$details  =  fetch("../../model/adminUsers.json", "../../controller/logout.php");
	@include "../components/subMenu.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		echo "Submitted Successfully";
	}
	?>




	<!-- HTmL -->

	<h2>Edit Profile</h2>
	<hr>
	<div class="editCon">
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
			<label for="name">Name : </label>
			<input type="text" name="name" id="name" value=<?php echo $details[0] ?>>
			<br><br>

			<label for="email">Email : </label>
			<input type="text" name="email" id="email" value=<?php echo $details[1] ?>>
			<br><br>

			<label for="gender">Gender : </label>
			<input type="radio" name="male" id="male" <?php $details[2] == "male" ? print("checked") : null ?>>
			<label for="male">Male</label>
			<input type="radio" name="female" id="female" <?php $details[2] == "female" ? print("checked") : null ?>>
			<label for="female">Female</label>
			<input type="radio" name="other" id="other" <?php $details[2] == "other" ? print("checked") : null ?>>
			<label for="other">Other</label>
			<br><br>


			<label for="dob">Date of Birth : </label>
			<input type="date" name="dob" id="dob" value=<?php echo $details[3] ?>>
			<br>
			<hr>
			<input type="submit" value="Submit">
		</form>

	</div>
</body>

</html>