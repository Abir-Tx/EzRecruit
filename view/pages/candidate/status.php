<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Candidate Status | EzRecruit</title>
	<link rel="stylesheet" href="../../styles/css/commons.css">
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
	<h1>Candidate Status</h1>
	<h4>
		You have been selected
	</h4>


	<?php @include "../../layout/footer.php" ?>
</body>

</html>