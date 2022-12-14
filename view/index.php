<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home | EzRecruit</title>
	<?php
	include("../controller/util.php");
	meta("Home, EzRecruit, Job, Recruitment, Job Search", "Home page of EzRecruit, a job recruitment website");
	?>
	<!-- Styles -->
	<link rel="stylesheet" href="./styles/css/commons.css">
	<link rel="stylesheet" href="./styles/css/index.css">
	<!-- Icon -->
	<link rel="shortcut icon" href="../model/images/icons/recruit.png" type="image/x-icon">
</head>

<body>
	<?php @include "./layout/header.php" ?>
	<div class="welcome">
		<h2>Welcome To EzRecruit</h2>
	</div>

	<div class="quickThings">
		<h3>A Little About Us</h3>
		<p>
			<span>E</span>zRecruit is a digital & smart recruitement website. We are here to make your company or club's recruitment system
			and hassle easier than ever. Just use our website to make your next recruitment and you will be never leaving this site.
		</p>

		<div class="things">
			<div class="blocks">
				<a href="./pages/general/signup.php">Sign Up</a>
			</div>

			<div class="blocks">
				<a href="./pages/general/login.php">Login</a>
			</div>

			<div class="blocks">
				<a href="#">Manage</a>
			</div>
		</div>

	</div>
	<?php @include "./layout/footer.php" ?>
</body>

</html>