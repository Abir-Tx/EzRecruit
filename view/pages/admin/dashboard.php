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

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Handle the success and error messages
		if (isset($_GET['success'])) {
			$success = $_GET['success'];
			if ($success == "createAdmin") {
				echo "<script>alert('Admin is created successfully');</script>";
			}
		} else {
			echo "<script>alert('Admin is not added to the database');</script>";
		}
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

		<a href="./showRecruiters.php">
			<div class="counterBoxes">
				<h3>
					Recruiters
				</h3>
				<span>
					<?php echo $count ?>
				</span>
			</div>
		</a>


		<!-- Show the number of candidates count from the database -->
		<?php
		$conn = db_connect();

		$query = "SELECT COUNT(*) AS count FROM candidates";

		$result = $conn->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);

		$count = $row['count'];


		?>

		<a href="./showCandidates.php">
			<div class="counterBoxes">
				<h3>
					Candidates
				</h3>
				<span>
					<?php echo $count ?>
				</span>
			</div>
		</a>

		<!-- Show the number of general users count from the database -->
		<?php

		$query = "SELECT COUNT(*) AS count FROM users";

		$result = $conn->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$count = $row['count'];
		?>

		<a href="./showGenUser.php">
			<div class="counterBoxes">
				<h3>
					General Users
				</h3>
				<span>
					<?php echo $count ?>
				</span>
			</div>
		</a>


		<!-- Show the number of admins count from the database -->
		<?php
		$query = "SELECT COUNT(*) AS count FROM admins";

		$result = $conn->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$count = $row['count'];
		$conn = null;
		?>

		<a href="./showAdmins.php">
			<div class="counterBoxes">
				<h3>
					Admins
				</h3>
				<span>
					<?php echo $count ?>
				</span>
			</div>
		</a>
	</div>


	<section>
		<div class="thingsToDo-con">
			<div class="thingsToDo">
				<h2>Things To Do</h2>
				<ul>
					<li>
						<a href="addAdmin.php">Add Admin</a>
					</li>
					<li>
						<a href="addRecruiter.php">Add Recruiter</a>
					</li>
				</ul>
			</div>
		</div>
	</section>






	<?php @include "../../layout/footer.php" ?>
</body>

</html>