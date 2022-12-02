<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard | EzRecruit </title>
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<link rel="stylesheet" href="../../styles/css/dashboard.css">
</head>

<body>
	<?php @include "../../layout/header.php" ?>
	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	$count = 0;


	// Displaying the details
	@include "../components/subMenu.php";


	echo "<H1 class='heading'>Welcome " . ucwords($_SESSION['admin']) . "</H1>";
	?>

	<div class="counter-con">
		<!-- Show the number of recruiters count from the database -->
		<?php
		include_once "../../../model/db_connect.php";

		$conn = db_connect();

		$query = "SELECT COUNT(*) AS count FROM recruiters";

		$result = $conn->query($query);

		$row = $result->fetch(PDO::FETCH_ASSOC);

		$count = $row['count'];

		$conn = null;
		?>

		<div class="counterBoxes">
			<h3>
				Admins
			</h3>
			<span>
				<?php echo $count ?>
			</span>
		</div>


		<!-- Show the number of candidates count from the database -->
		<?php
		$conn = db_connect();

		$query = "SELECT COUNT(*) AS count FROM candidates";

		$result = $conn->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);

		$count = $row['count'];


		?>

		<div class="counterBoxes">
			<h3>
				Candidates
			</h3>
			<span>
				<?php echo $count ?>
			</span>
		</div>

		<!-- Show the number of general users count from the database -->
		<?php

		$query = "SELECT COUNT(*) AS count FROM users";

		$result = $conn->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$count = $row['count'];
		?>

		<div class="counterBoxes">
			<h3>
				General Users
			</h3>
			<span>
				<?php echo $count ?>
			</span>
		</div>


		<!-- Show the number of admins count from the database -->
		<?php
		$query = "SELECT COUNT(*) AS count FROM admins";

		$result = $conn->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$count = $row['count'];
		$conn = null;
		?>

		<div class="counterBoxes">
			<h3>
				Admins
			</h3>
			<span>
				<?php echo $count ?>
			</span>
		</div>
	</div>






	<?php @include "../../layout/footer.php" ?>
</body>

</html>