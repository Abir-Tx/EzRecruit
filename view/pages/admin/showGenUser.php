<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage General User | EzRecruit</title>
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<link rel="stylesheet" href="../../styles/css/manageUsers.css">
</head>

<body>

	<?php @include "../../layout/header.php" ?>
	<?php @include "../../../model/db_connect.php" ?>

	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	?>

	<h1 class="heading">
		Manage General User
	</h1>

	<!-- A table with name, id, email  -->

	<table class="table">
		<tr>
			<th>
				Name
			</th>
			<th>
				Email
			</th>
			<th>
				Actions
			</th>
		</tr>

		<?php
		// get the general user details from the database
		$conn = db_connect();

		$query = "SELECT * FROM users";

		$stmt = $conn->prepare($query);

		$stmt->execute();

		// show the general user details in the table
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td><a href='../../../controller/admin/editGenUser.php?id=" . $row['id'] . "'>Edit</a> | <a href='../../../controller/admin/deleteGenUser.php?id=" . $row['id'] . "'>Delete</a></td>";
			echo "</tr>";
		}

		$conn = null;
		?>

	</table>

	<a href="./addGenUser.php">Add General User</a>

	<!-- Add the footer -->
	<?php @include "../../layout/footer.php" ?>

</body>

</html>