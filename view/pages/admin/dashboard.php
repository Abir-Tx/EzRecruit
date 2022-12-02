<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard | EzRecruit </title>
	<link rel="stylesheet" href="../../styles/css/commons.css">
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


	echo "<H1>Welcome " . ucwords($_SESSION['admin']) . "</H1>";
	?>

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

	<p>
		Currently there are <?php echo $count ?> registered recruiters on the website
	</p>



	<?php @include "../../layout/footer.php" ?>
</body>

</html>