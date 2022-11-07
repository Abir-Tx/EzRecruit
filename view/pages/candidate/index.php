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
	@include "../../../controller/admin/adminLoginHandler.php";
	if (!isset($_SESSION["user"])) {
		echo "Please login first";
		die();
	}
	?>
	<!-- HTML -->
	<div class="candiCon">
		<h2>Hey There 👋, Candidate</h2>
		<p>Here you can apply for jobs and check your application status</p>


		<div class="candiBtn">
			<a href="./register.php">Apply</a>
			<a href="status.php">Status</a>
		</div>
		<?php @include "../../layout/footer.php" ?>
</body>

</html>