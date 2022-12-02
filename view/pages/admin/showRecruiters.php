<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage Recruiters | EzRecruit</title>
</head>

<body>
	<?php @include "../../layout/header.php" ?>

	<!-- Include the commons css -->
	<link rel="stylesheet" href="../../styles/css/commons.css">

	<?php @include "../../../model/db_connect.php" ?>

	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	?>

	<h1 class="heading">Manage Recruiters</h1>

	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Profile Pic</th>
			<th>Action</th>
		</tr>

		<?php
		$conn = db_connect();

		$query = "SELECT * FROM recruiters";

		$result = $conn->query($query);

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['uname'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td><img src='../../" . $row['propic'] . "' alt='Profile Pic' width='50px' height='50px'></td>";
			echo "<td><a href='../../../controller/admin/deleteRecruiter.php?id=" . $row['id'] . "'>Delete</a></td>";
			echo "<td><a href='./editRecruiter.php?id=" . $row['id'] . "'>Edit</a></td>";
			echo "</tr>";
		}

		$conn = null;
		?>
	</table>

	<?php @include "../../layout/footer.php" ?>
</body>

</html>