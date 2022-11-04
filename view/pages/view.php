<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Profile | RecruiterX</title>
	<link rel="stylesheet" href="../styles/css/commons.css">
</head>

<body>
	<?php
	@include "../layout/header.php";
	@include "../../controller/util.php";


	$details  =  fetch("../../model/adminUsers.json", "../../controller/logout.php");
	@include "../components/subMenu.php";

	if (isset($details[5]) && !empty($details[5])) {
		$ifile = $details[5];
	} else $ifile = "avatar.svg";
	?>
	<!-- htmL -->
	<h2>Profile</h2>

	<div class="details">
		<div class="proPic">
			<img src='../images/<?php echo $ifile ?>' alt='Profile picture of <?php echo $details[0] ?>'>
		</div>
		<div class="textDet">
			<label for="name">Name : <?php echo ucFirst($details[0]) ?></label>
			<br><br>
			<label for="email">Email : <?php echo $details[1] ?></label>
			<br><br>
			<label for="gender">Gender : <?php echo ucfirst($details[2]) ?></label>
			<br><br>
			<label for="dob">Date of Birth : <?php echo $details[3] ?></label>
			<br><br>
		</div>
	</div>
	<div class="editBtnCon">
		<button>
			<a href="./edit.php">Edit Profile</a>
		</button>
	</div>

	<?php @include "../layout/footer.php" ?>
</body>

</html>